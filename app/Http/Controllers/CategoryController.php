<?php

namespace App\Http\Controllers;

use App\Classis\Utilities;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

        return view('category.index',['categories' => Category::paginate(3)]);
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
       // dd($id);
        $category=Category::findOrFail($id);
        return view("category.show", [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('update'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroy'.$id);
    }
}
