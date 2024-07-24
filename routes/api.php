<?php

use App\Http\Resources\VictimResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/victims', function (Request $request) {
    return VictimResource::collection(App\Models\Victim::all());
});
