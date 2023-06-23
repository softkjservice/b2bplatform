 @extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <form method="POST" action="{{ route('category.update', $category) }}" enctype="multipart/form-data" >
                {{ method_field('PUT') }}
                @csrf
                <br><h4>Edycja kategorii "{{$category->name}}"</h4><br>
                @include('category._form')
            </form>

    </div>


@endsection

 @section('javascript')
     const filmsUrl = "{{ url('storage/films') }}/"
 @endsection
 @section('js-files')
     <script src="{{ asset('js/order.js') }}"></script>
 @endsection
