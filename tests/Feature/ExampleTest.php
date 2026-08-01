<?php

test('returns a successful response', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
});

test('room detail pages show their category information', function (string $room) {
    $details = config('rooms.'.$room);

    $this->get(route('rooms.show', $room))
        ->assertOk()
        ->assertSee($details['name'])
        ->assertSee('Room Amenities')
        ->assertSee($details['room_numbers'][0]);
})->with(['garden', 'family', 'premium', 'signature']);
