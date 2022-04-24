@extends('backend.master')
@section('title','Yeni Marka Ekle')
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
    <form method="post" action="{{ route('backend.brand.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Başlık...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Slider</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Yeni Marka Ekle</button>
      </form>
</div>
@endsection