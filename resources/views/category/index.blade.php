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
                    <th scope="col">{{ __('text.category.image') }}</th>
                    <th scope="col">{{ __('text.category.index') }}</th>
                    <th scope="col">{{ __('text.category.description') }}</th>

                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td><img src="{{ asset('storage/'.$category->image_path) }}"   class="thumbnail-pictures" ></td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->index }}</td>
                        <td>{{ $category->categoryDescription }}</td>
                        <td><form method="POST" class="fm-inline"
                              action="{{ route('category.edit', ['category' => $category->id]) }}">
                            @csrf
                            @method('GET')
                            <input type="submit" value="Edit >>" class="btn btn-primary"/>
                        </form></td>
                        <td>
                            <form method="POST"
                                  action="{{ route('category.destroy', ['category' => $category->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-primary" onclick="return confirm('{{ __('**Are you sure you want to delete?') }}')"/>
                            </form>
                        </td>
                    </tr>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $categories->links("pagination::bootstrap-4") }}
        <div class="col-6">
            <a  href="{{ route('category.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus">Dodaj kategorię</i></button>
            </a>
            <a class="navbar-brand" href="{{ url('/') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus">Esc</i></button>
            </a>
        </div>

    </div>


@endsection
