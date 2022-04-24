@extends('backend.master')
@section('title', 'Destek Mesajları')
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
            <h6 class="m-0 font-weight-bold text-primary">Destek Mesajları</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mesaj No</th>
                            <th>Başlık</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                            <th>Aksiyonlar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mesaj No</th>
                            <th>Başlık</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                            <th>Aksiyonlar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($messages->reverse() as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->created_at }}</td>
                                <td>{{ $message->is_read ? 'Okundu' : 'Okunmadı' }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('backend.contact.show',$message) }}" class="btn btn-info btn-sm">Detay</a>
                                    <form method="post" action="{{ route('backend.contact.destroy',$message) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ml-2">Sil</button>
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