<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_saveCategory()
    {
        $categories = Category::all();
        $categoriesCount=count($categories);
        $category=new Category();
        $category->name="Komputery";
        $category->index="**001**";
        $category->categoryDescription="Category description";
        $category->parentCAtegory=0;
        $category->layotType="LIST";
        $category->active=true;
        $category->homePageActive=true;
        $category->save();
        $categories=Category::all();
        $this->assertTrue(count($categories)==$categoriesCount+1);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_readCategory()
    {
        $categories=Category::all();
        $category=$categories[count($categories)-1];
        $this->assertTrue($category->index=='**001**');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_updateCategory()
    {
        $categories=Category::all();
        $category=$categories[count($categories)-1];
        $category->index='999';
        $category->update();
        $category=$categories[count($categories)-1];
        $this->assertTrue($category->index=='999');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_deleteCategory()
    {
        $categories=Category::all();
        $categoryCount=count($categories);
        $category=$categories[count($categories)-1];
        $category->delete();
        $categories=Category::all();
        $this->assertTrue($categoryCount-count($categories)==1);
    }
}
