<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/v2/rooms', function (Request $request) {

  return [
    'type' => 'room',
    'id' => 'HTOGSiXcORTECjfNBBLii',
    'lastConnectionAt' => '2022-08-22T15:10:25.225Z',
    'createdAt' => '2022-08-22T15:10:25.225Z',
    'metadata' => [
      'color' => 'blue',
    ],
    'defaultAccesses' => [
      0 => 'room:write',
    ],
    'groupsAccesses' => [
      'product' => [
        0 => 'room:write',
      ],
    ],
    'usersAccesses' => [
      'alice' => [
        0 => 'room:write',
      ],
    ],
  ];
});

    Route::get('/v2/rooms/HTOGSiXcORTECjfNBBLii', function () {
        return [
          'type' => 'room',
          'id' => 'HTOGSiXcORTECjfNBBLii',
          'lastConnectionAt' => '2022-08-04T21:07:09.380Z',
          'createdAt' => '2022-07-13T14:32:50.697Z',
          'metadata' => [
            'color' => 'blue',
            'size' => '10',
            'target' => [
              0 => 'abc',
              1 => 'def',
            ],
          ],
          'defaultAccesses' => [
            0 => 'room:read',
          ],
          'groupsAccesses' => [
            'marketing' => [
              0 => 'room:write',
            ],
          ],
          'usersAccesses' => [
            'mislav.abha@example.com' => [
              0 => 'room:write',
            ],
          ],
        ];
    });
  Route::post('/v2/rooms/HTOGSiXcORTECjfNBBLii/authorize', function (Request $request) {
      save_log("Authorize", 'hello');
      return [
          'token' => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
      ];
  });
  Route::get('/v2/rooms/HTOGSiXcORTECjfNBBLii/active_users', function () {
      return [
          'data' => [
          ],
      ];
  });
require __DIR__.'/auth.php';
