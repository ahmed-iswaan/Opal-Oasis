<?php

$root = dirname(__DIR__);
$public = $root . DIRECTORY_SEPARATOR . 'public';
$outputDir = $public . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'optimized';

if (! extension_loaded('gd')) {
    fwrite(STDERR, "The GD extension is required.\n");
    exit(1);
}

if (! is_dir($outputDir)) {
    mkdir($outputDir, 0775, true);
}

$images = [
    ['assets/images/guest_house/_DSC3113-HDR.jpg', 'hero-guest-house.jpg', 1920, 78],
    ['assets/images/guest_house/_DSC3238-HDR (1).jpg', 'guest-house-entrance.jpg', 1600, 78],
    ['assets/images/guest_house/_DSC3128-HDR.jpg', 'guest-house-exterior.jpg', 1600, 78],
    ['assets/images/guest_house/_DSC3263-HDR.jpg', 'guest-house-detail.jpg', 1600, 78],
    ['assets/images/rooms/Garden_Double/_DSC2663-HDR.jpg', 'room-garden-double.jpg', 1400, 78],
    ['assets/images/rooms/Family/_DSC2708-HDR.jpg', 'room-family.jpg', 1400, 78],
    ['assets/images/rooms/Premium_Double/_DSC2464-HDR.jpg', 'room-premium-double.jpg', 1400, 78],
    ['assets/images/rooms/Signature_Double/_DSC2673-HDR.jpg', 'room-signature-double.jpg', 1400, 78],
];

$logos = [
    ['assets/images/logos/logo_2.png', 'logo-nav.png', 420],
    ['assets/images/logos/goldlogo_1.png', 'logo-gold.png', 360],
];

foreach ($images as [$source, $target, $maxWidth, $quality]) {
    optimizeJpeg($public . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $source), $outputDir . DIRECTORY_SEPARATOR . $target, $maxWidth, $quality);
}

foreach ($logos as [$source, $target, $maxWidth]) {
    optimizePng($public . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $source), $outputDir . DIRECTORY_SEPARATOR . $target, $maxWidth);
}

function optimizeJpeg(string $source, string $target, int $maxWidth, int $quality): void
{
    [$width, $height] = getimagesize($source);
    $image = imagecreatefromjpeg($source);

    if (! $image) {
        throw new RuntimeException("Could not read {$source}");
    }

    $newWidth = min($width, $maxWidth);
    $newHeight = (int) round($height * ($newWidth / $width));
    $resized = imagescale($image, $newWidth, $newHeight, IMG_BICUBIC_FIXED);

    imageinterlace($resized, true);
    imagejpeg($resized, $target, $quality);

    report($source, $target);
}

function optimizePng(string $source, string $target, int $maxWidth): void
{
    [$width, $height] = getimagesize($source);
    $image = imagecreatefrompng($source);

    if (! $image) {
        throw new RuntimeException("Could not read {$source}");
    }

    $newWidth = min($width, $maxWidth);
    $newHeight = (int) round($height * ($newWidth / $width));
    $resized = imagecreatetruecolor($newWidth, $newHeight);

    imagealphablending($resized, false);
    imagesavealpha($resized, true);
    imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    imagepng($resized, $target, 9);

    report($source, $target);
}

function report(string $source, string $target): void
{
    $before = filesize($source);
    $after = filesize($target);
    $saved = 100 - (($after / $before) * 100);

    printf("%s: %.1f MB -> %.1f MB saved %.0f%%\n", basename($target), $before / 1048576, $after / 1048576, $saved);
}
