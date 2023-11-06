<?php

use App\Http\Controllers\Api\V1\CompanyController;
use App\Models\Owner;
use Illuminate\Http\Request;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;
use LaravelJsonApi\Laravel\Routing\ResourceRegistrar;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

JsonApiRoute::server('v1')->prefix('v1')->resources(function (ResourceRegistrar $server) {
    $server->resource('owners', JsonApiController::class);
    $server->resource('companies', CompanyController::class);
    Route::get('token', function (Request $request) {
        $token = Owner::find(11)->createToken('authToken')->plainTextToken;
        return response()->json(['token' => $token]);
    });
});
