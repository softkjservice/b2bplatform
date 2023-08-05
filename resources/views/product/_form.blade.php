<div class="row">
    <div class="col-md-4">
        <div class="form-group ">
            <label for="title">{{ __('text.product.name') }}</label>
            <input type="text" class="form-control" id="name" placeholder="productName" name="name" value="{{$product->name}}">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="title">{{ __('text.product.index') }}</label>
            <input type="text" class="form-control" id="index" placeholder="Index" name="index" value="{{$product->index}}">
        </div>
        @error('index')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="title">{{ __('text.product.barcode') }}</label>
            <input type="text" class="form-control" id="barcode" placeholder="Barcode" name="barcode" value="{{$product->barcode}}">
        </div>
        @error('barcode')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="title">{{ __('text.product.price') }}</label>
            <input type="number" step="0.01" min="0" class="form-control" id="price" placeholder="Price" name="price" value="{{$product->price}}">
        </div>
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="title">{{ __('text.product.unit') }} </label><br>
            <!--                            <input type="text" class="form-control" id="unit" placeholder="Unit" name="unit" >-->


            <select id="unit" name="unit" >
                @foreach($units as $unit)
                    @if($unit == $product->unit)
                        <option value="{{$unit}}" selected >{{$unit}}</option>
                    @else
                        <option value="{{$unit}}" >{{$unit}}</option>
                    @endif
                @endforeach
            </select>

        </div>
        @error('unit')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="title">{{ __('text.product.currency') }} </label><br>
            <select id="currency" name="currency">
                @foreach($currency as $cur)
                    @if($cur == $product->currency)
                        <option value="{{$cur}}" selected >{{$cur}}</option>
                    @else
                        <option value="{{$cur}}" >{{$cur}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @error('currency')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="title">{{ __('text.product.vatrate') }} </label><br>
            <select id="vat_rate" name="vat_rate">
                @foreach($vat_rate as $vat)
                    @if($vat == $product->vat_rate)
                        <option value="{{$vat}}" selected >{{$vat}}</option>
                    @else
                        <option value="{{$vat}}" >{{$vat}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @error('vat_rate')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group ">
            <label for="title">{{ __('text.product.category') }}</label><br>
            <select id="category_id" name="category_id">
                @foreach($categories as $category)
                    @if($category->id == $product->category_id)
                        <option value="{{$category->id}}" selected >{{$category->name}}</option>
                    @else
                        <option value="{{$category->id}}" >{{$category->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <div>
            @if(\App\Classis\Utilities::checboxYesOrNo($product->active)=='Tak')
                <input type="checkbox" id="active" name="active" checked>
            @else
                <input type="checkbox" id="active" name="active" >
            @endif
            <label for="active">{{ __('text.product.active') }}</label>
        </div>
        <div>
            @if(\App\Classis\Utilities::checboxYesOrNo($product->homePageActive)=='Tak')
                <input type="checkbox" id="homePageActive" name="homePageActive" checked>
            @else
                <input type="checkbox" id="homePageActive" name="homePageActive" >
            @endif
            <label for="homePageActive">{{ __('text.product.homePageActive') }}</label>
        </div>

    </div>
    <div class="col-md-4">
        <img src="{{ asset('storage/'.$product->image_path) }}" width=100% alt="Brak zdjęcia">
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

<div class="form-group">
    Krótki opis A<br>
    <textarea rows = "5" cols="100%" name = "descriptionA">{{ __('text.product.description') }}
                    </textarea>
</div>
@error('descriptionA')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    Krótki opis B<br>
    <textarea rows = "5" cols="100%" name = "descriptionB">{{ __('text.product.descriptionBis') }}
                    </textarea>
</div>
@error('descriptionB')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<br>
<button type="submit" class="btn btn-primary" name="dodaj*">Enter</button> &nbsp;&nbsp;
<a  href="{{ route('product.index') }}">
    <button type="button" class="btn btn-primary"><i class="fas fa-plus">Esc</i></button>
</a>
