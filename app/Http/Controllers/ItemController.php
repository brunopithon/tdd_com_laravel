<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
  public function __construct(private Item $item)
  {

  }

  public function index()
  {
    $items = $this->item->all();
    return response()->json($items);
  }

  public function show($itemId)
  {
    $item = $this->item->find($itemId);

    if (!$item) {
      return response()->json(['message' => 'Item not found.'], 404);
    }

    return response()->json($item);
  }

  public function store(Request $request)
  {
    $itemData = $request->all();
    $itemData['shopping_list_id'] = $request->shoppingListId;

    $item = $this->item->create($itemData);

    return response()->json($item, 201);
  }

  public function update(Request $request, $item_id)
  {
    $item = $this->item->find($item_id);

    if (!$item) {
      return response()->json(['message' => 'Item not found.'], 404);
    }

    $item->update($request->all());

    return response()->json($item, 200);
  }

  public function destroy($item_id)
  {
    $item = $this->item->find($item_id);

    if (!$item) {
      return response()->json(['message' => 'Item not found.'], 404);
    }

    $item->delete();

    return response()->json('Item deleted.');
  }
}
