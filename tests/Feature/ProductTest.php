<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
   // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_saveProduct()
    {
        $product=new Product();
        $product->name="Komputer";
        $product->index="001";
        $product->barcode="111";
        $product->quantity=10;
        $product->unit="szt.";
        $product->price=100;
        $product->currency="PLN";
        $product->vat_rate=23;
        $product->description="Opis przedmiotu";
        $product->category_id=1;
        $product->priority="a01";
        $product->active=true;
        $product->homePageActive=true;

        $product->save();
        $this->assertTrue(true);
    }
}
