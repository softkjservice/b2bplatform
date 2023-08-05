@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row ">
            <div class="col-md-8">
                 <h3>  Produkty</h3> <h5> {{$currentCategory}}</h5>
                @if(count($products)==0)
                    <p>Brak produktów w tej kategorii</p>
                @endisset
        </div>


                @foreach($products as $product)
                <div class="row row-white">
                    <hr>
                    <div class="col-md-4" >
                          <div >
                                <div align="center"  class="embed-responsive embed-responsive-16by9">
                                    <h2>{{$product->name}}</h2>
                                    <img src="{{ asset('storage/'.$product->image_path) }}" width="100%"  alt="Girl in a jacket" >
                                </div>
                            </div>
                    </div>
                    <div class="col-md-4 " >
                        <div class="card mb-4 border-none pudding-20px">
                            <div align="left"  class="embed-responsive embed-responsive-16by9">
                                {!! $product->descriptions()->where('name', 'shortDescriptionA')->first()->attributesToArray()['htmlText'] !!}

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="pudding-20px">
                            <div align="center"  class="embed-responsive embed-responsive-16by9">
                                {{ __('text.product.price') }}
                                <h4>
                                    <p>{{$product->price." ".$product->currency}}</p>
                                    {!! $product->descriptions()->where('name', 'shortDescriptionB')->first()->attributesToArray()['htmlText'] !!}
                                </h4>

                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

        {{ $products->links("pagination::bootstrap-4") }}
        <div class="col-6">
            <a  href="{{ route('product.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus">Dodaj produkt</i></button>
            </a>
            <a class="navbar-brand" href="{{ url('/') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus">Esc</i></button>
            </a>
        </div>

    </div>


@endsection
