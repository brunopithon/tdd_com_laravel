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

    public function show($id)
    {
        $shoppingList = $this->shoppingList->find($id);
        return response()->json($shoppingList);
    }

    public function store(Request $request)
    {
        $shoppingList = $this->shoppingList->create($request->all());
        return response()->json($shoppingList, 201);
    }

    
}
