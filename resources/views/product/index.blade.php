@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row ">
            <div class="col-md-8">
                 <h3>  Produkty</h3> <h5> {{$currentCategory}}</h5>
                @if(count($products)==0)
                    <p>Brak produktów w tej kategorii</p>
                @endisset
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ __('text.product.name') }}</th>
                    <th scope="col">{{ __('text.product.index') }}</th>
                    <th scope="col">{{ __('text.product.description') }}</th>

                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->index }}</td>
                        <td>{{ $product->description }}</td>

                        <td>
                            <form method="POST"
                                  action="{{ route('product.edit', ['product' => $product->id]) }}">
                                @csrf
                                @method('GET')
                                <input type="submit" value="Edit >>" class="btn btn-primary" />
                            </form>
                        </td>
                        <td>
                            <form method="POST"
                                  action="{{ route('product.newOnPattern', ['product' => $product->id]) }}">
                                @csrf
                                @method('GET')
                                <input type="submit" value="New >>" class="btn btn-primary" />
                            </form>
                        </td>

                        <td>
                            <form method="POST"
                                  action="{{ route('product.destroy', ['product' => $product->id]) }}">
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

        {{ $products->links("pagination::bootstrap-4") }}
        <div class="col-6">
            <a  href="{{ route('product.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus">Dodaj produkt</i></button>
            </a>
            <a class="navbar-brand" href="{{ url('/') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus">Esc</i></button>
            </a>
        </div>

    </div>


@endsection
