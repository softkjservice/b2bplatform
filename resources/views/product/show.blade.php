  @extends('layouts.app')
 <link href="{{ asset('css/invoice.css') }}" rel="stylesheet">
@section('content')
    <div class="page-content container">
        <p class="h4">Kategoria: {{$category->name}}</p>
        <div class="row">
            <div class="col" >
                <br>
                <table>
                    <tr>
                        <td>
                            <form >
                                <a href="{{ url('/category/'.$category->id.'/edit')}}" class="btn btn-primary">Edit</a>
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
                            <form >
                                <a href="{{ URL::previous() }}" class="btn btn-primary">Esc</a>
                            </form>
                        </td>

                    </tr>
                </table>

                <br>
                <div class="h5">
                    <p>Nazwa: {{$category->name}}</p>
                    <p>Index: {{$category->index}}</p>
                    <p>Opis: {{$category->categoryDescription}}</p>
                    <p>Kategoria nadrzędna: {{$category->parentCategory}}</p>
                    <p>Typ wyświetlania: {{$category->layotType}}</p>
                    <p>Czy aktywna: {{\App\Classis\Utilities::checboxYesOrNo($category->active)}}</p>
                    <p>Czy pierwsza strona: {{\App\Classis\Utilities::checboxYesOrNo($category->homePageActive)}}</p>
                </div>

            </div>
            <div class="col">
               <form >
                    @csrf
                    <a href="{{ url('/categoryimage/'.$category->id)}}" class="btn btn-primary">Edit image</a>
               </form>
                <img src="{{ asset('storage/'.$category->image_path) }}" alt="Girl in a jacket" >
            </div>

        </div>
   </div>

@endsection

