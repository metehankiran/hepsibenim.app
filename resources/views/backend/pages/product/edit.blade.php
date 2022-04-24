@extends('backend.master')
@section('title','Ürünü Düzenle')
@section('content')
<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('backend.product.update',$product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Ürün Adı</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $product->title) }}" placeholder="Ürün Adı...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Ürün Kategorisi</label>
                    <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option @selected($category->id == $product->category_id)  value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Ürün Stoğu</label>
                    <input type="number" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Ürün Stoğu...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Ürün Stoğu</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_active" value="1" @if($product->is_active) checked @endif>
                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_active" value="0" @if(!$product->is_active) checked @endif>
                        <label class="form-check-label" for="inlineRadio2">Deaktif</label>
                      </div>
                </div>
            </div>
        </div>
        <div class="form-group">
          <label>Ürün Detayı</label>
          <textarea class="form-control" name="description" placeholder="Ürün Detayı..." rows="3">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Ürün Fiyatı</label>
                    <input type="number" class="form-control" name="price" value="{{ old('price', $product->price) }}" placeholder="Ürün Fiyatı...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Ürün Görseli</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Ürün Bilgisini Güncelle</button>
        <div class="col-md-6 offset-md-6">
            <p>Geçerli Ürün Görseli</p>
            <img class="img-thumbnail" width="400px" src="{{ Storage::url($product->image) }}">
        </div>
    </form>
</div>
@endsection