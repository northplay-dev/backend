<?php
namespace Northplay\NorthplayApi\Controllers\Multiplayer;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController
{
    public function __construct() {
        $this->model = new \Northplay\NorthplayApi\Models\RoomMpModel;
    }

    public function authorize($room_id)
    {
        $data = $this->model->where('room_id', $room_id)->first();

        return [
            'token' => "12345"
          ];
    }


    public function active_users($room_id)
    {
        return [
            'data' => [
            ],
        ];
    }



    public function select_room($room_id)
    {
        $data = $this->model->where('room_id', $room_id)->first();

        return [
            'type' => 'room',
            'id' => $data->room_id,
            'lastConnectionAt' => '2022-08-04T21:07:09.380Z',
            'createdAt' => '2022-07-13T14:32:50.697Z',
            'metadata' => [
              'color' => 'blue',
              'name' => 'oppa',
              'size' => '10',
              'owner' => 'mislav.abha@example.com',
              'target' => [
                0 => 'abc',
                1 => 'def',
              ],
            ],
            'defaultAccesses' => [
              0 => 'room:read',
            ],
            'groupsAccesses' => [
              'engineering' => [
                0 => 'room:write',
              ],
            ],
            'usersAccesses' => [
              'mislav.abha@example.com' => [
                0 => 'room:write',
              ],
            ],
          ];
    }

    public function list() {
        if($this->model->count() < 2) {
            $this->model->insert([
                'room_id' => Str::random(64),
                'type' => 'room',
                'max_players' => 3,
                'current_players' => 0,
                'spin_cost' => 100,
                'defaultAccess' => 'room:read',
                'lastConnectionAt' => now(),
            ]);

            $this->model->insert([
                'room_id' => Str::random(64),
                'type' => 'room',
                'max_players' => 3,
                'current_players' => 0,
                'spin_cost' => 100,
                'defaultAccess' => 'room:read',
                'lastConnectionAt' => now(),
            ]);

        }

        return $this->response_format();
    }

    public function response_format() {
        $data = $this->model->all();
        foreach($data as $room) {
            $array[] = array(
                'type' => 'room',
                'id' => $room['room_id'],
                'lastConnectionAt' => '2022-08-08T23:23:15.281Z',
                'createdAt' => '2022-08-08T23:23:15.281Z',
                'metadata' => [
                  'name' => [
                    0 => 'My roo2m',
                  ],
                  'type' => [
                    0 => 'whiteboard',
                  ],
                ],
                'defaultAccesses' => [
                  0 => 'room:write',
                ],
                'groupsAccesses' => [
                  'player' => [
                    0 => 'room:write',
                  ],
                ],
                'usersAccesses' => [
                  'mislav.abha@example.com' => [
                    0 => 'room:write',
                  ],
                ],
            );
            
        }

        return [
            'nextPage' => '/v2/rooms',
            'data' => $array,
        ];

    }

}