@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group ">
                    <label for="title">categoryName:</label>
                    <input type="text" class="form-control" id="name" placeholder="categoryName" name="name" >
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              <div class="form-group">
                    <label for="title">categoryIndex:</label>
                    <input type="text" class="form-control" id="index" placeholder="Index" name="index" >
                </div>
                @error('index')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="title">categoryDescription:</label>
                    <input type="text" class="form-control" id="categoryDescription" placeholder="Opis" name="categoryDescription" >
                </div>
                @error('categoryDescription')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group ">
                    <label for="title">parentCategory:</label>
                    <input type="number" min="0" step="1" class="form-control" id="categoryName" placeholder="parentCategory" name="parentCategory" >
                </div>
                @error('parentCategory')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group ">
                    <label for="title">layotType:</label>
                    <input type="number" min="0" step="1" class="form-control" id="layotType" placeholder="layotType" name="layotType" >
                </div>
                @error('layotType')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              <div class="form-group">
                    <label for="file">Zdjęcie do kategorii</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div>
                    <input type="checkbox" id="active" name="active" checked>
                    <label for="active">Active</label>
                </div>
                <div>
                    <input type="checkbox" id="homePageActive" name="homePageActive" checked>
                    <label for="homePageActive">homePageActive</label>
                </div>
               <br>
                <button type="submit" class="btn btn-success" name="dodaj*">Enter</button>
            </form>
        </div>
    </div>


@endsection
