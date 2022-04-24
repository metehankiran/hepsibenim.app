@extends('backend.master')
@section('title', 'Üyeler')
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
            <h6 class="m-0 font-weight-bold text-primary">Üye Listesi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Üye No</th>
                            <th>İsim</th>
                            <th>Rol</th>
                            <th>Kayıt Tarihi</th>
                            <th>Durum</th>
                            <th>Aksiyonlar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Üye No</th>
                            <th>İsim</th>
                            <th>Rol</th>
                            <th>Kayıt Tarihi</th>
                            <th>Durum</th>
                            <th>Aksiyonlar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users->reverse() as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if($user->is_admin)
                                    Yönetici
                                    @else
                                    Üye
                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    @if ($user->is_active == true)
                                        <span class="badge badge-success">Aktif Üye</span>
                                    @else
                                        <span class="badge badge-danger">Pasif Üye</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('backend.user.edit',$user) }}" class="btn btn-info btn-sm">Detay</a>
                                    <form method="post" action="{{ route('backend.user.destroy',$user) }}">
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