@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="title">{{ __('text.product.name') }}</label>
                            <input type="text" class="form-control" id="name" placeholder="productName" name="name" >
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="title">{{ __('text.product.index') }}</label>
                            <input type="text" class="form-control" id="index" placeholder="Index" name="index" >
                        </div>
                        @error('index')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="title">{{ __('text.product.barcode') }}</label>
                            <input type="text" class="form-control" id="barcode" placeholder="Barcode" name="barcode" >
                        </div>
                        @error('barcode')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="title">{{ __('text.product.price') }}</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="price" placeholder="Price" name="price" >
                        </div>
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="title">{{ __('text.product.description') }}</label>
                            <input type="text" class="form-control" id="description" placeholder="Description" name="description" >
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       {{-- <div class="form-group">
                            <label for="title">{{ __('text.product.priority') }}</label>
                            <input type="text" class="form-control" id="priority" placeholder="Priority" name="priority" >
                        </div>
                        @error('priority')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror--}}
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">{{ __('text.product.unit') }} </label><br>
                            <!--                            <input type="text" class="form-control" id="unit" placeholder="Unit" name="unit" >-->
                            <select id="unit" name="unit">
                                <option value="szt">szt.</option>
                                <option value="kg">kg.</option>
                                <option value="m">m.</option>
                                <option value="m2">m2</option>
                            </select>
                        </div>
                        @error('unit')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="title">{{ __('text.product.currency') }} </label><br>
                            <select id="currency" name="currency">
                                <option value="PLN">PLN</option>
                                <option value="EUR">EUR</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>
                        @error('currency')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="title">{{ __('text.product.vatrate') }} </label><br>
                            <select id="vat_rate" name="vat_rate">
                                <option value="23">23 %</option>
                                <option value="8">8 %</option>
                                <option value="0">0 %</option>
                                <option value="zw">zw.</option>
                            </select>
                        </div>
                        @error('vat_rate')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group ">
                            <label for="title">{{ __('text.product.category') }}</label><br>
                            <select id="category_id" name="category_id">
                                <option value="40">Plotery Graphtec Tablicowe</option>
                                <option value="42">Plotery Graptec seria FC900</option>
                                <option value="43">Plotery Graptec seria CE7000</option>
                                <option value="44">Automat do wycinania</option>
                                <option value="45">Akcesoria do ploterów</option>
                                <option value="46">Plotery iECHO</option>
                            </select>
                        </div>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <div>
                            <input type="checkbox" id="active" name="active" checked>
                            <label for="active">{{ __('text.product.active') }}</label>
                        </div>
                        <div>
                            <input type="checkbox" id="homePageActive" name="homePageActive" >
                            <label for="homePageActive">{{ __('text.product.homePageActive') }}</label>
                        </div>




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
                <button type="submit" class="btn btn-success" name="dodaj*">Enter</button>
            </form>
        </div>
    </div>


@endsection
