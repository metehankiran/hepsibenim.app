@extends('backend.master')
@section('title', 'Slider Listesi')
@section('script')
<script src="{{ asset('backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend') }}/js/demo/datatables-demo.js"></script>
@endsection
@section('css')
<link href="{{ asset('backend') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @if(Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kayıtlı sliderler</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('backend.slider.create') }}" class="btn btn-primary mb-3">Yeni Slider Ekle</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Slider No</th>
                            <th>Metin 1</th>
                            <th>Metin 2</th>
                            <th>Metin 3</th>
                            <th>Arkaplan Rengi</th>
                            <th>Görsel</th>
                            <th>Aksiyonlar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Slider No</th>
                            <th>Metin 1</th>
                            <th>Metin 2</th>
                            <th>Metin 3</th>
                            <th>Arkaplan Rengi</th>
                            <th>Görsel</th>
                            <th>Aksiyonlar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->text1 }}</td>
                                <td>{{ $slider->text2 }}</td>
                                <td>{{ $slider->text3 }}</td>
                                <td style="color:{{ $slider->bgColor }}">{{ $slider->bgColor }}</td>
                                <td><a target="_blank" href="{{ asset('images').'/'.$slider->image }}"><img src="{{ asset('images').'/'.$slider->image }}" alt="{{ $slider->image }}" width="100" class="img-thumbnail"></a></td>
                                <td class="d-flex">
                                    <a href="{{ route('backend.slider.edit', $slider->id) }}" class="btn btn-primary btn-sm ml-2 mr-2">Düzenle</a>
                                    <form method="post" action="{{ route('backend.slider.destroy',$slider) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection