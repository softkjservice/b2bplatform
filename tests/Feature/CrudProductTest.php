<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_saveProduct()
    {
        $categories = Category::all();
        $products=Product::all();
        $productCount=count($products);
        $product=new Product();
        $product->name="Komputer";
        $product->index="**001**";
        $product->barcode="111";
        $product->quantity=10;
        $product->unit="szt.";
        $product->price=100;
        $product->currency="PLN";
        $product->vat_rate=23;
        $product->description="Opis przedmiotu";
        $product->category_id=$categories[0]->id;
        $product->priority="a01";
        $product->active=true;
        $product->homePageActive=true;
        $product->save();
        $products=Product::all();
        $this->assertTrue(count($products)==$productCount+1);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_readProduct()
    {
        $products=Product::all();
        $product=$products[count($products)-1];
        $this->assertTrue($product->index=='**001**');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_updateProduct()
    {
        $products=Product::all();
        $product=$products[count($products)-1];
        $product->index='999';
        $product->update();
        $product=$products[count($products)-1];
        $this->assertTrue($product->index=='999');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_deleteProduct()
    {
        $products=Product::all();
        $productCount=count($products);
        $product=$products[count($products)-1];
        $product->delete();
        $products=Product::all();
        $this->assertTrue($productCount-count($products)==1);
    }
}
