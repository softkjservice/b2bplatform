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

<!--    <script>
        document.getElementById("video1").style.visibility = "hidden";
        document.getElementById("video2").style.visibility = "hidden";
        function myFunction() {
            document.getElementById("demo").innerHTML = "Hello World";
        }
        /*function myFunction1() {
            document.getElementById("demo").innerHTML = '<video id="video1" width="400" controls autoplay >  <source src="{{ asset('storage/films/penetration_01.mp4') }}" type="video/mp4"> </video>';
        }
        function myFunction2() {
            document.getElementById("demo").innerHTML = '<video id="video2" width="400" controls autoplay >  <source src="{{ asset('storage/films/penetration_02.mp4') }}" type="video/mp4"> </video>';
        }
        function myFunction3() {
            document.getElementById("demo").innerHTML = '<video id="video3" width="400" controls autoplay >  <source src="{{ asset('storage/films/penetration_03.mp4') }}" type="video/mp4"> </video>';
        }
        function myFunction4() {
            document.getElementById("demo").innerHTML = '<video id="video4" width="400" controls autoplay >  <source src="{{ asset('storage/films/penetration_04.mp4') }}" type="video/mp4"> </video>';
        }
        function myFunction5() {
            document.getElementById("demo").innerHTML = '<video id="video1" width="400" controls autoplay >  <source src="{{ asset('storage/films/penetration_05.mp4') }}" type="video/mp4"> </video>';
        }
        function myFunction6() {
            document.getElementById("demo").innerHTML = '<video id="video2" width="400" controls autoplay >  <source src="{{ asset('storage/films/penetration_06.mp4') }}" type="video/mp4"> </video>';
        }
        function myFunction7() {
            document.getElementById("demo").innerHTML = '<video id="video3" width="400" controls autoplay >  <source src="{{ asset('storage/films/penetration_07.mp4') }}" type="video/mp4"> </video>';
        }
        function myFunction8() {
            document.getElementById("demo").innerHTML = '<video id="video4" width="400" controls autoplay >  <source src="{{ asset('storage/films/penetration_08.mp4') }}" type="video/mp4"> </video>';
        }*/


        var removeMedia = function () {
            _.each([$video, $audio], function ($media) {
                if (!$media.length) return;
                $media[0].pause();
                $media[0].src = '';
                $media.children('source').prop('src', '');
                $media.remove().length = 0;
            });
        };
    </script>-->
@endsection

 @section('javascript')
     const filmsUrl = "{{ url('storage/films') }}/"
 @endsection
 @section('js-files')
     <script src="{{ asset('js/order.js') }}"></script>
 @endsection
