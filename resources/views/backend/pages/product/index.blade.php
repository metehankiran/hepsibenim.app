@extends('backend.master')
@section('title', 'Ürün Listesi')
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
            <h6 class="m-0 font-weight-bold text-primary">Kayıtlı olan ürünler</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('backend.product.create') }}" class="btn btn-primary mb-3">Yeni Ürün Ekle</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ürün No</th>
                            <th>Ekleyen</th>
                            <th>Kategori</th>
                            <th>Başlık</th>
                            <th>Fiyat</th>
                            <th>Stok</th>
                            <th>Durum</th>
                            <th>Aksiyonlar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Ürün No</th>
                            <th>Ekleyen</th>
                            <th>Kategori</th>
                            <th>Başlık</th>
                            <th>Fiyat</th>
                            <th>Stok</th>
                            <th>Durum</th>
                            <th>Aksiyonlar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>{{ $product->category->title }}</td>
                                <td>{{ $product->title }}</td>
                                <td>@money($product->price)</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->is_active ? 'Aktif' : 'Deaktif' }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('backend.product.show', $product->id) }}" class="btn btn-info btn-sm">Detay</a>
                                    <a href="{{ route('backend.product.edit', $product->id) }}" class="btn btn-primary btn-sm ml-2 mr-2">Düzenle</a>
                                    <form method="post" action="{{ route('backend.product.destroy',$product) }}">
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