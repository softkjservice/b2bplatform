@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" >
                @csrf
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
                    <label for="title">{{ __('text.product.description') }}</label>
                    <input type="text" class="form-control" id="productDescription" placeholder="Description" name="categoryDescription" >
                </div>
                @error('productDescription')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group ">
                    <label for="title">{{ __('text.product.category') }}</label>
                    <input type="number" min="0" max="5" step="1" class="form-control" id="categoryName" placeholder="Category" name="Category" value="0" >
                </div>
                @error('categoryName')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              <div class="form-group">
                    <label for="file">{{ __('text.product.image') }}</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div>
                    <input type="checkbox" id="active" name="active" checked>
                    <label for="active">{{ __('text.product.active') }}</label>
                </div>
                <div>
                    <input type="checkbox" id="homePageActive" name="homePageActive" checked>
                    <label for="homePageActive">{{ __('text.product.homePageActive') }}</label>
                </div>
               <br>
                <button type="submit" class="btn btn-success" name="dodaj*">Enter</button>
            </form>
        </div>
    </div>


@endsection
