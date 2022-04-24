@extends('backend.master')
@section('title', 'Ürünü Detayı')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 text-center">
            <img class="img-thumbnail p-3" width="300px" src="{{ Storage::url($product->image) }}">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Ürün Adı</label>
                    <input type="text" class="form-control" value="{{ $product->title }}" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Ürün Fiyatı</label>
                    <input type="text" class="form-control" name="price" value="@money($product->price)" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Ürün Kategorisi</label>
                    <input type="text" class="form-control" value="{{ $product->category->title }}" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Ürün Stoğu</label>
                    <input type="number" class="form-control" value="{{ $product->stock }}" disabled>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Ürün Detayı</label>
            <textarea class="form-control" rows="3" disabled>{{ $product->description }}</textarea>
        </div>
    </div>
@endsection
