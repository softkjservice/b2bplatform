<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <label for="title">categoryName:</label>
            <input type="text" class="form-control" id="name" placeholder="categoryName" name="name" value="{{$category->name}}">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="title">categoryIndex:</label>
            <input type="text" class="form-control" id="index" placeholder="Opis" name="index" value="{{$category->index}}">
        </div>
        @error('index')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="title">categoryDescription:</label>
            <input type="text" class="form-control" id="categoryDescription" placeholder="Opis" name="categoryDescription" value="{{$category->categoryDescription}}">
        </div>
        @error('categoryDescription')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group ">
            <label for="title">parentCategory:</label>
            <input type="number" min="0" max="5" step="1" class="form-control" id="categoryName" placeholder="parentCategory" name="parentCategory" value="{{$category->parentCategory}}">
        </div>
        @error('parentCategory')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group ">
            <label for="title">layotType:</label>
        <!--                            <input type="number" min="0" max="10" step="1" class="form-control" id="layotType" placeholder="layotType" name="layotType" value="{{$category->layotType}}">-->
            <select id="layotType" name="layotType" >
                @foreach($layotCategoryType as $layotType)
                    @if($layotType == $category->layotType)
                        <option value="{{$layotType}}" selected >{{$layotType}}</option>
                    @else
                        <option value="{{$layotType}}" >{{$layotType}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @error('layotType')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <br>
        <div>
            @if(\App\Classis\Utilities::checboxYesOrNo($category->active)=='Tak')
                <input type="checkbox" id="active" name="active" checked>
            @else
                <input type="checkbox" id="active" name="active" >
            @endif
            <label for="active">Active</label>
        </div>
        <div>
            @if(\App\Classis\Utilities::checboxYesOrNo($category->homePageActive)=='Tak')
                <input type="checkbox" id="homePageActive" name="homePageActive" checked>
            @else
                <input type="checkbox" id="homePageActive" name="homePageActive" >
            @endif
            <label for="homePageActive">homePageActive</label>
        </div>
    </div>
    <div class="col-md-6">
        <img src="{{ asset('storage/'.$category->image_path) }}" width=100% alt="Brak zdjęcia">
    </div>
</div>
<br>
<div class="form-group">
    <label for="file">{{ __('text.product.image') }}</label>
    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
</div>
@error('image')
<div class="alert alert-danger">{{ $message }}</div>
@enderror


<br>
<button type="submit" class="btn btn-primary" name="dodaj*">Enter</button> &nbsp;&nbsp;
<a  href="{{ route('category.index') }}">
    <button type="button" class="btn btn-primary"><i class="fas fa-plus">Esc</i></button>
</a>
