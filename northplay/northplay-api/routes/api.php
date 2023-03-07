<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/api/admin/log/{action}', function (Request $request, $action) {
    if($action === 'get') {
        return response()->json((\Northplay\NorthplayApi\Models\LogModel::all()), 200);
    }
});

Route::get('/api/auth/providers', function () {
    return '{"credentials":{"id":"credentials","name":"Credentials","type":"credentials","signinUrl":"https://dev.northplay.app/api/auth/signin/credentials","callbackUrl":"https://dev.northplay.app/api/auth/callback/credentials"}}';
});