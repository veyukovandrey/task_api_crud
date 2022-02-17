<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DragController;
use App\Http\Controllers\SubstanceController;
use App\Http\Controllers\ManufacturerController;

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






use App\Http\Controllers\AuthController;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


use Illuminate\Support\Facades\Artisan;
Route::post('init_db_fake_data', function() {
    Artisan::call('db:seed');
    return "init done";
});




Route::get('substance/show', [ManufacturerController::class, 'index']);
Route::get('manufacturer/show', [SubstanceController::class, 'index']);
Route::get('drag/show', [DragController::class, 'index']);
Route::get('drag/show/{drag}', [DragController::class, 'show']);
Route::post('drag/add', [DragController::class, 'store']);
Route::put('drag/update/{drag}', [DragController::class, 'update']);
Route::delete('drag/delete/{drag}', [DragController::class, 'delete']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
