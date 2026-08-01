<?php

declare(strict_types=1);

function dngOrientation(string $file): int
{
    $handle = fopen($file, 'rb');

    if ($handle === false) {
        return 1;
    }

    if (fread($handle, 2) !== "II") {
        fclose($handle);

        return 1;
    }

    fseek($handle, 4);
    $ifdOffset = unpack('V', fread($handle, 4))[1];
    fseek($handle, $ifdOffset);
    $entryCount = unpack('v', fread($handle, 2))[1];

    for ($entry = 0; $entry < $entryCount; $entry++) {
        $tagData = fread($handle, 12);

        if (strlen($tagData) !== 12) {
            break;
        }

        if (unpack('v', substr($tagData, 0, 2))[1] === 274) {
            fclose($handle);

            return unpack('v', substr($tagData, 8, 2))[1];
        }
    }

    fclose($handle);

    return 1;
}

$sourceDirectory = dirname(__DIR__).'/public/assets/Rooms and Outdoors/Excursion areas';
$outputDirectory = $sourceDirectory.'/web';

if (! is_dir($outputDirectory) && ! mkdir($outputDirectory, 0775, true) && ! is_dir($outputDirectory)) {
    throw new RuntimeException("Unable to create {$outputDirectory}");
}

foreach (glob($sourceDirectory.'/*.DNG') ?: [] as $source) {
    $destination = $outputDirectory.'/'.pathinfo($source, PATHINFO_FILENAME).'.jpg';

    $width = 0;
    $height = 0;
    $type = 0;
    $preview = @exif_thumbnail($source, $width, $height, $type);

    if ($preview === false || $type !== IMAGETYPE_JPEG) {
        $data = file_get_contents($source);
        $preview = false;
        $bestArea = 0;
        $offset = 0;

        while ($data !== false && ($start = strpos($data, "\xFF\xD8", $offset)) !== false) {
            $end = strpos($data, "\xFF\xD9", $start + 2);

            if ($end === false) {
                break;
            }

            $candidate = substr($data, $start, $end - $start + 2);
            $dimensions = @getimagesizefromstring($candidate);
            $candidateImage = @imagecreatefromstring($candidate);

            if ($dimensions !== false && $candidateImage !== false && $dimensions[0] * $dimensions[1] > $bestArea) {
                [$width, $height, $type] = $dimensions;
                $preview = $candidate;
                $bestArea = $width * $height;
            }

            unset($candidateImage);

            $offset = $end + 2;
        }

        unset($data);
    }

    if ($preview === false || $type !== IMAGETYPE_JPEG) {
        fwrite(STDERR, 'No browser-compatible JPEG preview found in '.basename($source).PHP_EOL);
        continue;
    }

    $sourceImage = @imagecreatefromstring($preview);

    if ($sourceImage !== false) {
        $orientation = dngOrientation($source);

        if (in_array($orientation, [3, 6, 8], true)) {
            $sourceImage = imagerotate($sourceImage, match ($orientation) {
                3 => 180,
                6 => -90,
                8 => 90,
            }, 0);
            $width = imagesx($sourceImage);
            $height = imagesy($sourceImage);
        }

        $targetWidth = min(2200, $width);
        $targetHeight = (int) round($height * ($targetWidth / $width));
        $webImage = imagecreatetruecolor($targetWidth, $targetHeight);
        imagecopyresampled($webImage, $sourceImage, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
        ob_start();
        imagejpeg($webImage, null, 84);
        $preview = ob_get_clean();
        unset($webImage, $sourceImage);
        $width = $targetWidth;
        $height = $targetHeight;
    }

    if (file_put_contents($destination, $preview) === false) {
        throw new RuntimeException("Unable to write {$destination}");
    }

    echo basename($destination)." ({$width}x{$height})".PHP_EOL;
}
