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
                    <p>{{ __('text.category.name') }}: &nbsp; {{$category->name}}</p>
                    <p>{{ __('text.category.index') }}: &nbsp;  {{$category->index}}</p>
                    <p>{{ __('text.category.description') }}: &nbsp;  {{$category->categoryDescription}}</p>
                    <p>{{ __('text.category.category') }}: &nbsp;  {{$category->parentCategory}}</p>
                    <p>{{ __('text.category.layotType') }}: &nbsp;  {{$category->layotType}}</p>
                    <p>{{ __('text.category.active') }}: &nbsp;  {{\App\Classis\Utilities::checboxYesOrNo($category->active)}}</p>
                    <p>{{ __('text.category.homePageActive') }}: &nbsp;  {{\App\Classis\Utilities::checboxYesOrNo($category->homePageActive)}}</p>
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

