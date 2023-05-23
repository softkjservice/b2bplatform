<?php

namespace App\Http\Controllers;

use App\Classis\Utilities;
use App\Http\Requests\UpsertCategoryRequest;
use App\Http\Requests\UpsertPictureRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() :View
    {
        return view('category.index',['categories' => Category::paginate(6)]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function welcome() :View
    {
        Session::forget('currentCategoryId');
        return view('welcome',['categories' => Category::paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() :View
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(UpsertCategoryRequest $request) :RedirectResponse
    {
        $category=new Category($request->validated());
        //dd($request->input());
        if ($request->hasFile('image')) {
            $category->image_path = $request->file('image')->store('category');  //dla każdego zamówienia tworzy nowy katalog o nazwie takiej jak numer zamówienia
        }
        $category->active=Utilities::checboxTrue($request, 'active');
        $category->homePageActive=Utilities::checboxTrue($request, 'homePageActive');
        $category->save();
        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id) :View
    {
        //dd($id);
        $category=Category::findOrFail($id);
        //dd(Utilities::checboxTrue($category->active));
        return view("category.show", [
            'category' => $category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id) :View
    {
        //dd('edit'.$id);
        $category=Category::findOrFail($id);
        return view("category.edit", [
            'category' => $category
        ]);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Request $request
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return  RedirectResponse
     */
    public function update(UpsertCategoryRequest $request, Category $category): RedirectResponse
    {
        $imagePathOld=$category->image_path;
        $category->fill($request->validated());
        $category->active=Utilities::checboxTrue($request, 'active');
        $category->homePageActive=Utilities::checboxTrue($request, 'homePageActive');
        if ($request->hasFile('image')) {
            $category->image_path = $request->file('image')->store('category');
            Storage::delete($imagePathOld);
        }else{
            $category->image_path=$imagePathOld;
        }
        $category->save();
        return redirect(route('category.index'));
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return View
     */
    public function destroy($id): View
    {
        $category=Category::findOrFail($id);
        Storage::delete($category->image_path);
        $category->delete();
        //return Redirect::back();
        return view('category.index',['categories' => Category::paginate(6)]);
    }
}
