<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/api/admin/log/{action}', function (Request $request, $action) {
    
        if($action === 'get') {
            
            return response()->successApi((\Northplay\NorthplayApi\Models\LogModel::all()), 200);

        }

});