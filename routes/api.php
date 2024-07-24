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

Route::get('/gender', function (Request $request) {
    return json_encode(\App\Enums\Gender::cases());
});

Route::get('/status', function (Request $request) {
    return json_encode(\App\Enums\Status::cases());
});

Route::get('/security-organs', function (Request $request) {
    return \App\Http\Resources\SecurityOrganResource::collection(\App\Models\SecurityOrgan::all());
});

Route::get('/holding-locations', function (Request $request) {
    return \App\Http\Resources\HoldingLocationResource::collection(\App\Models\HoldingLocation::all());
});
