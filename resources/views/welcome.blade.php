@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-6">
                <a  href="{{ route('category.create') }}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-plus">Dodaj kategorię</i></button>
                </a>
                <a  href="{{ route('category.index') }}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-plus">Pokaż kategorie</i></button>
                </a>
            </div>


        </div>
        strona startowa
    </div>

@endsection

@section('javascript')
    const filmsUrl = "{{ url('storage/films') }}/"
@endsection
@section('js-files')
    <script src="{{ asset('js/order.js') }}"></script>
@endsection
