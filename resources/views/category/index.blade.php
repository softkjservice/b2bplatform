@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>  <p>Kategorie</p></h3>
            </div>
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ __('text.category.name') }}</th>
                    <th scope="col">{{ __('text.category.index') }}</th>
                    <th scope="col">{{ __('text.category.description') }}</th>

                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->index }}</td>
                        <td>{{ $category->categoryDescription }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $categories->links("pagination::bootstrap-4") }}

    </div>


@endsection
