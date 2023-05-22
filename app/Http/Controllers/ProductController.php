<?php

namespace App\Http\Controllers;

use App\Classis\Utilities;
use App\Http\Requests\UpsertProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$id = $request->id;
        //$description=$request->description;
        //dd($id." ".$description);
        //dd('Index');
        return view('product.index',['products' => Product::paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return :View
     */
    public function create() :View
    {
        $units=['szt','kg','m','m2','l'];
        $currency=['PLN','EUR','USD','JPY'];
        $vat_rate=[23,8,0,-1];
        $categories=Category::all();
        return view('product.create', [
            'units' => $units, 'currency' => $currency, 'vat_rate'=> $vat_rate, 'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpsertProductRequest $request)
    {
        //dd($request->input());
        $product=new Product($request->validated());
//dd($product->category_id);
        if ($request->hasFile('image')) {
            $product->image_path = $request->file('image')->store('product');
        }
        $product->active=Utilities::checboxTrue($request, 'active');
        $product->homePageActive=Utilities::checboxTrue($request, 'homePageActive');
        //$product->vat_rate=$request->input('vat_rate');
        $product->save();
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return  :View
     */
    public function edit($id) :View
    {
        $product=Product::findOrFail($id);
        $units=['szt','kg','m','m2','l'];
        $currency=['PLN','EUR','USD','JPY'];
        $vat_rate=[23,8,0,-1];
        $categories=Category::all();
        return view("product.edit", [
            'product' => $product, 'units' => $units, 'currency' => $currency, 'vat_rate'=> $vat_rate, 'categories' => $categories
        ]);
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
        dd('Update '.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        if (!empty($product->image_path)){
            Storage::delete($product->image_path);
        }
        $product->delete();
        //return Redirect::back();
        //return view('product.index',['products' => Product::paginate(5)]);
        return redirect(route('product.index'));
    }
}
