<?php

Route::get('/', function () {
    return redirect('https://front.northplay.app');
});

Route::get('/v2/rooms', [\Northplay\NorthplayApi\Controllers\Multiplayer\RoomController::class, 'list'])
    ->middleware('guest')
    ->name('rooms.list');
Route::get('/v2/rooms/{room_id}', [\Northplay\NorthplayApi\Controllers\Multiplayer\RoomController::class, 'select_room'])
    ->middleware('guest')
    ->name('rooms.select');
Route::post('/v2/rooms/{room_id}/authorize', [\Northplay\NorthplayApi\Controllers\Multiplayer\RoomController::class, 'authorize'])
    ->middleware('guest')
    ->name('rooms.authorize');
Route::get('/v2/rooms/{room_id}/active_users', [\Northplay\NorthplayApi\Controllers\Multiplayer\RoomController::class, 'authorize'])
    ->middleware('guest')
    ->name('rooms.active_users');