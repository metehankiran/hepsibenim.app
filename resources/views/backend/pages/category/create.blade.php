@extends('backend.master')
@section('title','Yeni Kategori Ekle')
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
    <form method="post" action="{{ route('backend.category.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Kategori Adı</label>
                    <input type="text" class="form-control" name="title" placeholder="Kategori Adı...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Kategori Görseli</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Yeni Kategori Ekle</button>
      </form>
</div>
@endsection