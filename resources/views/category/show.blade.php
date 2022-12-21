 @extends('layouts.app')
 <link href="{{ asset('css/invoice.css') }}" rel="stylesheet">
@section('content')
    <div class="page-content container">
        <H5>  <p>Wybrana Kategoria: {{$category->name}}</p></H5>
        <div class="row">
            <div class="col" >
                <br>
                <table>
                    <tr>
                        <td>
                            <form method="POST"
                                  action="{{ route('category.update', ['category' => $category->id]) }}">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Update" class="btn btn-primary"/>
                            </form>
                        </td>
                        <td>
                            <form method="POST"
                                  action="{{ route('category.destroy', ['category' => $category->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-primary"/>
                            </form>
                        </td>

                        <td>
                            <form method="POST"
                                  action="{{ route('category.index', ['category' => $category->id]) }}">
                                <a href="{{ URL::previous() }}" class="btn btn-primary">Esc</a>
                            </form>
                        </td>

                    </tr>
                </table>

                <br>
                <p>Nazwa: {{$category->name}}</p>
                <p>Index: {{$category->index}}</p>
                <p>Opis: {{$category->categoryDescription}}</p>
                <p>Kategoria nadrzędna: {{$category->parentCategory}}</p>
                <p>Typ wyświetlania: {{$category->layotType}}</p>
                <p>Czy aktywna: {{$category->active}}</p>
                <p>Czy pierwsza strona: {{$category->homePageActive}}</p>
            </div>
            <div class="col">
                <img src="{{ asset('storage/'.$category->image_path) }}" alt="Girl in a jacket" >
            </div>

        </div>
   </div>

@endsection

