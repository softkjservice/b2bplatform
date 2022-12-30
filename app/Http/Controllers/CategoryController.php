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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dump(public_path("/"));
        //dd(storage_path('app\public'));

        return view('category.index',['categories' => Category::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=new Category($request->input());
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function image($id) : View
    {
        //dd('editi mage'.$id);
        $category=Category::findOrFail($id);
        Session::forget('category_image_path');
        return view("category.editimage", [
            'category' => $category
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return View
     */
    public function imagereturn(Category $category) : View
    {
        //dd($category);
        $category->image_path=Session::get('category_image_path', '');
        $category->save();
        return view("category.editimage", [
            'category' => $category
        ]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Request $request
     * @return RedirectResponse
     */
    public function update(UpsertCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->fill($request->validated());
        $category->active=Utilities::checboxTrue($request, 'active');
        $category->homePageActive=Utilities::checboxTrue($request, 'homePageActive');
        $category->save();
        //return redirect(route('category.index'))->with('status', 'Udało się');
        return redirect()->route('category.index')->with('status', 'Udało się');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Request $request
     */
    public function updateimage(UpsertPictureRequest $request, Category $category): View
    {
        $category->fill($request->validated());
        session(['category_image_path' => $category->image_path]);
        if ($request->hasFile('image')) {
            Storage::delete($category->image_path);
            $category->image_path = $request->file('image')->store('category');  //dla każdego zamówienia tworzy nowy katalog o nazwie takiej jak numer zamówienia
            $category->save();
        }
        return view("category.editimage", [
            'category' => $category
        ]);
        //return redirect(route('category.index'))->with('status', 'Udało się');
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
        return view('category.index',['categories' => Category::paginate(5)]);
    }
}
