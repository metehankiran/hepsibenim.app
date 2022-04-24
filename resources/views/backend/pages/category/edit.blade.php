@extends('backend.master')
@section('title','Kategori Güncelle')
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
    <form method="post" action="{{ route('backend.category.update',$category) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Kategori Adı</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $category->title) }}" placeholder="Kategori Adı...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Kategori Görseli</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Kategoriyi Güncelle</button>
        <div class="col-md-6 offset-6">
            <p>Geçerli Resim</p>
            <img src="{{ Storage::url($category->image) }}" class="img-thumbnail" width="400px">
        </div>
      </form>
</div>
@endsection