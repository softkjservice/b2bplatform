@extends('layouts.app')

@section('content')
    <h4><p style="padding: 0px 0px 0px 40px ">Plotery tnące i tnąco bigujące </p></h4>
    <div class="row">
      @foreach($categories as $category)
            <div class="col-md-4" style="padding: 10px 40px 10px 40px">
                {{--<a href="{{ route('product.show', [$category->id]) }}">--}}
                <a href="{{ route('product.index', ['currentCategoryId'=>$category->id]) }}">
                <div class="card mb-4 shadow-sm">
                    <div align="center"  class="embed-responsive embed-responsive-16by9">
                      <h2>{{$category->name}}</h2>
                    <img src="{{ asset('storage/'.$category->image_path) }}" width="100%"  alt="Girl in a jacket" >
                        {{$category->categoryDescription}}
                    </div>
                </div>
                </a>
            </div>
        @endforeach

    </div>

    {{ $categories->links("pagination::bootstrap-4") }}
@endsection

@section('javascript')
    const filmsUrl = "{{ url('storage/films') }}/"
@endsection
@section('js-files')
    <script src="{{ asset('js/order.js') }}"></script>
@endsection
