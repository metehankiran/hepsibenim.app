@extends('backend.master')
@section('title','Slider Düzenle')
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
    <form method="post" action="{{ route('backend.slider.update',$slider) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Metin 1</label>
                    <input type="text" class="form-control" name="text1" value="{{ old('text1', $slider->text1) }}" placeholder="Metin 1...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Metin 2</label>
                    <input type="text" class="form-control" name="text2" value="{{ old('text2', $slider->text2) }}" placeholder="Metin 2...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Metin 3</label>
                    <input type="text" class="form-control" name="text3" value="{{ old('text3', $slider->text3) }}" placeholder="Metin 3...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Arkaplan Rengi</label>
                    <input type="text" class="form-control" name="bgColor" value="{{ old('bgColor', $slider->bgColor) }}" placeholder="Arkaplan Rengi...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Slider</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Slider Düzenle</button>
        <div class="col-md-6 offset-6">
            <p>Geçerli Resim</p>
            <img src="{{ asset('images/'.$slider->image) }}" alt="slider" class="img-thumbnail" width="400px">
        </div>
      </form>
</div>
@endsection