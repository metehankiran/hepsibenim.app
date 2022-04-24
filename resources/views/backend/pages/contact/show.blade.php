@extends('backend.master')
@section('title', 'Destek Mesajı')
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
        @if (Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get('success') }}</li>
                </ul>
            </div>
        @endif
        <div class="row">
            <section class="col-lg-12">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Durum</label>
                            <input type="text" class="form-control" disabled value="{{ $contact->is_read ? 'Okundu' : 'Okunmadı' }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tarih</label>
                                <input type="text" class="form-control" disabled value="{{ $contact->created_at }}">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Gönderen</label>
                            <input type="text" class="form-control" disabled value="{{ $contact->name }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Telefon</label>
                            <input type="text" class="form-control" disabled value="{{ $contact->phone }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Mail Adresi</label>
                            <input type="text" class="form-control" disabled value="{{ $contact->email }}">
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Başlık</label>
                        <input type="text" class="form-control" disabled value="{{ $contact->subject }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleFormControlTextarea1">Mesajınız</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{ $contact->message }}</textarea>
                    </div>
            </section>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
