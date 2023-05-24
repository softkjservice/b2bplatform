 @extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <br><h4>
                Nowy produkt na wzów "{{$product->name}}"
            </h4><br>

            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" >
                @csrf
                @include('product._form')
           </form>
    </div>


@endsection

 @section('javascript')
     const filmsUrl = "{{ url('storage/films') }}/"
 @endsection
 @section('js-files')
     <script src="{{ asset('js/order.js') }}"></script>
 @endsection
