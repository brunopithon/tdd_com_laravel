<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class ShoppingListControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_get_shopping_lists_endpoint(): void
    {
        $shoppingLists = ShoppingList::factory(3)->create();

        $response = $this->getJson('/api/shoppingList');

        // dd($response->baseResponse);m

        $response->assertStatus(200);
        $response->assertJsonCount(3);

        $response->assertJson(function (AssertableJson $json) use($shoppingLists){
            $json->whereAllType([
                '0.id' => 'integer',
                '0.name' => 'string',
                '0.description' => 'string'
            ]);

            $json->hasAll(['0.id', '0.name', '0.description']);

            $shoppingList = $shoppingLists->first();

            $json->whereAll([
                '0.id' => $shoppingList->id,
                '0.name' => $shoppingList->name,
                '0.description' => $shoppingList->description,

            ]);
        });
    }





}