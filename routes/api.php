<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DragController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('substance', function() {
    return \App\Models\Substance::all();
});

Route::get('manufacturer', function() {
    return \App\Models\Manufacturer::all();
});


Route::get('drag/show', [DragController::class, 'index']);
Route::get('drag/show/{drag}', [DragController::class, 'show']);
Route::post('drag/add', [DragController::class, 'store']);
Route::put('drag/update/{drag}', [DragController::class, 'update']);
Route::delete('drag/delete/{drag}', [DragController::class, 'delete']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
