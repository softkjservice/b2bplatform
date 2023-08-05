<?php

namespace App\Http\Controllers;

use App\Classis\Utilities;
use App\Http\Requests\UpsertProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDescription;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
     * @return View
     */
    public function index(Request $request) :View
    {
        if(!empty($request->currentCategoryId)){
            session(['currentCategoryId' => $request->currentCategoryId]);   //Wybór kategorii z welcome
        }
        if($request->currentCategoryForget){
            Session::forget('currentCategoryId');
        }
        $currentCategoryId=Session::get('currentCategoryId');
        //dd($currentCategoryId);
        if (empty($currentCategoryId)){
            return view('product.index',['products' => Product::paginate(10),'currentCategory'=>'Wszystkie kategorie']);
       }else{
            $currentCategoryName='Wybrano kategorię: '.Category::findOrFail($currentCategoryId)->name;
            /*return view('product.index',['products' => Product::where('category_id' , $currentCategoryId)->paginate(10),'currentCategory'=>$currentCategoryName]);*/
            return view('product.indexImage',['products' => Product::where('category_id' , $currentCategoryId)->paginate(10),'currentCategory'=>$currentCategoryName]);
        }
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
     * @return RedirectResponse
     */
    public function store(UpsertProductRequest $request): RedirectResponse
    {
        //dd($request->input('descriptionB'));
        $product=new Product($request->validated());
        if ($request->hasFile('image')) {
            $product->image_path = $request->file('image')->store('product');
        }
        $product->active=Utilities::checboxTrue($request, 'active');
        $product->homePageActive=Utilities::checboxTrue($request, 'homePageActive');
        $product->save();
        $this->productDescriptionSave($request,$product,false);
        //dd($product->descriptions()->where('name', 'shortDescriptionA')->first()->attributesToArray()['htmlText']);

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
      //  session(['currentCategoryId' => $id]);
      //  return view('product.index',['products' => Product::where('category_id' , $id)->paginate(10)]);
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
            'product' => $product, 'units' => $units, 'currency' => $currency, 'vat_rate'=> $vat_rate, 'categories' => $categories, 'pattern' => false, 'productRoute' => 'product.update'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return  :View
     */
    public function newOnPattern($id) :View
    {
        $product=Product::findOrFail($id);
        $units=['szt','kg','m','m2','l'];
        $currency=['PLN','EUR','USD','JPY'];
        $vat_rate=[23,8,0,-1];
        $categories=Category::all();
        return view("product.newOnPattern", ['product' => $product, 'units' => $units, 'currency' => $currency, 'vat_rate'=> $vat_rate, 'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return  RedirectResponse
     */
    public function update(UpsertProductRequest $request, Product $product): RedirectResponse
    {
        $imagePathOld=$product->image_path;
        $product->fill($request->validated());
        $product->active=Utilities::checboxTrue($request, 'active');
        $product->homePageActive=Utilities::checboxTrue($request, 'homePageActive');
       if ($request->hasFile('image')) {
            $product->image_path = $request->file('image')->store('product');
            Storage::delete($imagePathOld);
        }else{
            $product->image_path=$imagePathOld;
        }
        $product->save();
        $this->productDescriptionSave($request,$product, true);
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return  RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $product=Product::findOrFail($id);
        if (!empty($product->image_path)){
            Storage::delete($product->image_path);
        }
        $product->delete();
        //return redirect(route('product.index'));
        return back()->withInput();
    }
    private function productDescriptionSave(UpsertProductRequest $request, Product $product, bool $update){
        //dd($request->input('descriptionA'));
//dd($product);
        $shortDescriptionA=$request->input('descriptionA');
        $shortDescriptionB=$request->input('descriptionB');
        //dd($shortDescriptionA." ".$shortDescriptionB);
        if ($update){
            $descriptions=$product->descriptions;
            //dd($descriptions->toArray());
            //dd($descriptions);
            foreach ($descriptions as $description) {
              $productDescription=ProductDescription::findOrFail($description->id);
//dd($productDescription);
               if ($productDescription->name=='shortDescriptionA'){
                   $productDescription->htmlText=$shortDescriptionA;
                   $productDescription->save();
               }
                if ($productDescription->name=='shortDescriptionB'){
                    $productDescription->htmlText=$shortDescriptionB;
                    $productDescription->save();
                }
            }

        }else{
            $product->descriptions()->saveMany([
                new ProductDescription(['name' => 'shortDescriptionA','htmlText'=>$shortDescriptionA]),
                new ProductDescription(['name' => 'shortDescriptionB','htmlText'=>$shortDescriptionB]),
            ]);
        }

    }
}
