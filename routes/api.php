<?php

use App\Models\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\ItemController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('shoppingList', ShoppingListController::class);
Route::get('showItemsByShoppingList/{shopping_list_id}', [ShoppingListController::class, 'showItems']);


Route::get('items', [ItemController::class, 'index']);
Route::post('item', [ItemController::class, 'store']);
Route::get('item/{item_id}', [ItemController::class, 'show']);
Route::put('item/{item_id}', [ItemController::class, 'update']);
Route::delete('item/{item_id}', [ItemController::class, 'destroy']);
