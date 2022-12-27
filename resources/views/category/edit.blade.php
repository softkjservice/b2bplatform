 @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <form method="POST" action="{{ route('category.update', $category) }}" enctype="multipart/form-data" >
        {{ method_field('PUT') }}
        @csrf
                <div class="form-group ">
                    <label for="title">categoryName:</label>
                    <input type="text" class="form-control" id="name" placeholder="categoryName" name="name" value="{{$category->name}}">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="title">categoryIndex:</label>
                    <input type="text" class="form-control" id="index" placeholder="Opis" name="index" value="{{$category->index}}">
                </div>
                @error('index')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="title">categoryDescription:</label>
                    <input type="text" class="form-control" id="categoryDescription" placeholder="Opis" name="categoryDescription" value="{{$category->categoryDescription}}">
                </div>
                @error('categoryDescription')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group ">
                    <label for="title">parentCategory:</label>
                    <input type="number" min="0" step="1" class="form-control" id="categoryName" placeholder="parentCategory" name="parentCategory" value="{{$category->parentCategory}}">
                </div>
                @error('parentCategory')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group ">
                    <label for="title">layotType:</label>
                    <input type="number" min="0" step="1" class="form-control" id="layotType" placeholder="layotType" name="layotType" value="{{$category->layotType}}">
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
                    @if(\App\Classis\Utilities::checboxYesOrNo($category->active)=='Tak')
                        <input type="checkbox" id="active" name="active" checked>
                    @else
                        <input type="checkbox" id="active" name="active" >
                    @endif
                    <label for="active">Active</label>
                </div>
                <div>
                    @if(\App\Classis\Utilities::checboxYesOrNo($category->homePageActive)=='Tak')
                        <input type="checkbox" id="active" name="active" checked>
                    @else
                        <input type="checkbox" id="active" name="active" >
                    @endif
                    <label for="homePageActive">homePageActive</label>
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="dodaj*">Enter</button>
    </form>
        </div>
    </div>


@endsection

 @section('javascript')
     const filmsUrl = "{{ url('storage/films') }}/"
 @endsection
 @section('js-files')
     <script src="{{ asset('js/order.js') }}"></script>
 @endsection
