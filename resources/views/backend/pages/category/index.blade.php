@extends('backend.master')
@section('title', 'Kategori Listesi')
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
            <h6 class="m-0 font-weight-bold text-primary">Kayıtlı olan kategoriler</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('backend.category.create') }}" class="btn btn-primary mb-3">Yeni Kategori Ekle</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kategori No</th>
                            <th>Başlık</th>
                            <th>Ekli Ürün</th>
                            <th>Görsel</th>
                            <th>Aksiyonlar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kategori No</th>
                            <th>Başlık</th>
                            <th>Ekli Ürün</th>
                            <th>Görsel</th>
                            <th>Aksiyonlar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->products->count() }} Ürün ekli</td>
                                <td><a href="{{ Storage::url($category->image) }}" target="_blank">Görseli Görüntülü</a></td>
                                <td class="d-flex">
                                    <a href="{{ route('backend.category.show', $category->id) }}" class="btn btn-info btn-sm">Detay</a>
                                    <a href="{{ route('backend.category.edit', $category->id) }}" class="btn btn-primary btn-sm ml-2 mr-2">Düzenle</a>
                                    <form method="post" action="{{ route('backend.category.destroy',$category) }}">
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