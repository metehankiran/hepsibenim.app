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
                            <input type="text" class="form-control" disabled value="{{ $ticket->status == 'open' ? 'Yanıt Bekliyor' : 'Cevaplandı' }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Gönderen</label>
                            <input type="text" class="form-control" disabled value="{{ $ticket->user->name }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tarih</label>
                            <input type="text" class="form-control" disabled value="{{ $ticket->created_at }}">
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Başlık</label>
                        <input type="text" class="form-control" disabled value="{{ $ticket->subject }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleFormControlTextarea1">Mesajınız</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{ $ticket->message }}</textarea>
                    </div>
            </section>
            @if($ticket->status == 'open')
            <section class="col-lg-12">
                <form action="{{ route('backend.ticket.update',$ticket) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Yanıt</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="reply" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Destek Talebini Yanıtla</button>
            </form>
            </section>
            @endif
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
