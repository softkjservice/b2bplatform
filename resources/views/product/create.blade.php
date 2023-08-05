@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="title">{{ __('text.product.name') }}</label>
                            <input type="text" class="form-control" id="name" placeholder="productName" name="name" >
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="title">{{ __('text.product.index') }}</label>
                            <input type="text" class="form-control" id="index" placeholder="Index" name="index" >
                        </div>
                        @error('index')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="title">{{ __('text.product.barcode') }}</label>
                            <input type="text" class="form-control" id="barcode" placeholder="Barcode" name="barcode" >
                        </div>
                        @error('barcode')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="title">{{ __('text.product.price') }}</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="price" placeholder="Price" name="price" >
                        </div>
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
<!--                        <div class="form-group">
                            <label for="title">{{ __('text.product.description') }}</label>
                            <input type="text" class="form-control" id="description" placeholder="Description" name="description" >
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="title">{{ __('text.product.descriptionBis') }}</label>
                            <input type="text" class="form-control" id="descriptionBis" placeholder="DescriptionBis" name="descriptionBis" >
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror-->


                       {{-- <div class="form-group">
                            <label for="title">{{ __('text.product.priority') }}</label>
                            <input type="text" class="form-control" id="priority" placeholder="Priority" name="priority" >
                        </div>
                        @error('priority')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror--}}
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">{{ __('text.product.unit') }} </label><br>
                            <!--                            <input type="text" class="form-control" id="unit" placeholder="Unit" name="unit" >-->

                            <select id="unit" name="unit" >
                                @foreach($units as $unit)
                                    <option value="{{$unit}}" >{{$unit}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('unit')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="title">{{ __('text.product.currency') }} </label><br>
                            <select id="currency" name="currency">
                                @foreach($currency as $cur)
                                    <option value="{{$cur}}" >{{$cur}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('currency')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="title">{{ __('text.product.vatrate') }} </label><br>
                            <select id="vat_rate" name="vat_rate">
                                @foreach($vat_rate as $vat)
                                    <option value="{{$vat}}" >{{$vat}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('vat_rate')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group ">
                            <label for="title">{{ __('text.product.category') }}</label><br>
                            <select id="category_id" name="category_id">
                                @foreach($categories as $category)
                                    @if($category->id == Session::get('currentCategoryId'))
                                        <option value="{{$category->id}}" selected >{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}" >{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>



                        </div>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <div>
                            <input type="checkbox" id="active" name="active" checked>
                            <label for="active">{{ __('text.product.active') }}</label>
                        </div>
                        <div>
                            <input type="checkbox" id="homePageActive" name="homePageActive" >
                            <label for="homePageActive">{{ __('text.product.homePageActive') }}</label>
                        </div>




                    </div>
                </div>
<br>
                <div class="form-group">
                    <label for="file">{{ __('text.product.image') }}</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
               {{-- <div class="form-group">
                    <label for="title">{{ __('text.product.description') }}</label>
                    <input type="text" class="form-control textbox" id="description" placeholder="Description" name="description" >
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror--}}
                <div class="form-group">
                    Krótki opis A<br>
                    <textarea rows = "5" cols="100%" name = "descriptionA">{{ __('text.product.description') }}
                    </textarea>
                </div>
                @error('descriptionA')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    Krótki opis B<br>
                    <textarea rows = "5" cols="100%" name = "descriptionB">{{ __('text.product.descriptionBis') }}
                    </textarea>
                </div>
                @error('descriptionB')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

               <br>
                <button type="submit" class="btn btn-primary" name="dodaj*">Enter</button>&nbsp;&nbsp;
                <a  href="{{ route('product.index') }}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-plus">Esc</i></button>
                </a>
            </form>
        </div>
    </div>


@endsection
