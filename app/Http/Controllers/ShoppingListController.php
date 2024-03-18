<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;

class ShoppingListController extends Controller
{
    public function __construct(private ShoppingList $shoppingList)
    {

    }

    public function index()
    {
        return response()->json($this->shoppingList->all());
    }

 
}
