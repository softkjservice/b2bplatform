@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group ">
                    <label for="title">{{ __('text.category.name') }}</label>
                    <input type="text" class="form-control" id="name" placeholder="categoryName" name="name" >
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              <div class="form-group">
                    <label for="title">{{ __('text.category.index') }}</label>
                    <input type="text" class="form-control" id="index" placeholder="Index" name="index" >
                </div>
                @error('index')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="title">{{ __('text.category.description') }}</label>
                    <input type="text" class="form-control" id="categoryDescription" placeholder="Opis" name="categoryDescription" >
                </div>
                @error('categoryDescription')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group ">
                    <label for="title">{{ __('text.category.category') }}</label>
                    <input type="number" min="0" max="5" step="1" class="form-control" id="categoryName" placeholder="parentCategory" name="parentCategory" value="0" >
                </div>
                @error('parentCategory')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group ">
                    <label for="title">{{ __('text.category.layotType') }}</label>
                    <input type="number" min="0" max="10" step="1" class="form-control" id="layotType" placeholder="layotType" name="layotType" value="1">
                </div>
                @error('layotType')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              <div class="form-group">
                    <label for="file">{{ __('text.category.image') }}</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div>
                    <input type="checkbox" id="active" name="active" checked>
                    <label for="active">{{ __('text.category.active') }}</label>
                </div>
                <div>
                    <input type="checkbox" id="homePageActive" name="homePageActive" checked>
                    <label for="homePageActive">{{ __('text.category.homePageActive') }}</label>
                </div>
               <br>
                <button type="submit" class="btn btn-primary" name="dodaj*">Enter</button>&nbsp;&nbsp;
                <a  href="{{ route('category.index') }}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-plus">Esc</i></button>
                </a>
            </form>
        </div>
    </div>


@endsection
