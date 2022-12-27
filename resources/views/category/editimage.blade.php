 @extends('layouts.app')

@section('content')
    <div class="container  bg-light ">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('categoryupdateimage',$category) }}" enctype="multipart/form-data" >
                    {{ method_field('PUT') }}
                    @csrf

                    <div class="form-group">
                        <label for="file">Zdjęcie do kategorii</label>
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-success" name="dodaj*">Wybierz</button>
                </form>
            </div>


        </div>

        <div>
            <img src="{{ asset('storage/'.$category->image_path) }}" alt="Girl in a jacket" >
        </div>
        <div class="col">
            <form>
                <a href="{{ url('/category')}}" class="btn btn-primary">Zatwierdź</a>
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
