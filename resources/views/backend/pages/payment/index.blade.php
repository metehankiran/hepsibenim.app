@extends('backend.master')
@section('title', 'Sipariş Listesi')
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
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Siparişler</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sipariş No</th>
                                <th>Müşteri</th>
                                <th>Fiyat</th>
                                <th>Durum</th>
                                <th>Sipariş Tarihi</th>
                                <th>Aksiyonlar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sipariş No</th>
                                <th>Müşteri</th>
                                <th>Fiyat</th>
                                <th>Durum</th>
                                <th>Sipariş Tarihi</th>
                                <th>Aksiyonlar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($payments->reverse() as $payment)
                                <tr>
                                    <td>PAYMENT-ID-{{ $payment->id }}</td>
                                    <td>{{ $payment->user->name }}</td>
                                    <td>@money($payment->total())</td>
                                    <td>
                                        @if ($payment->status == 'pending')
                                            <span class="text-info">Bekleniyor</span>
                                        @elseif($payment->status == 'cancelled')
                                            <span class="text-danger">İptal Edildi</span>
                                        @elseif($payment->status == 'paid')
                                            <span class="text-success">Ödendi</span>
                                        @endif
                                    </td>
                                    <td>{{ $payment->created_at }}</td>
                                    <td width="400">
                                        <form method="post" action="{{ route('backend.payment.update', $payment) }}">
                                            @csrf
                                            @method('put')
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <a href="{{ route('backend.payment.show', $payment->id) }}"
                                                        class="btn btn-outline-secondary" type="button">Detay</a>
                                                </div>
                                                <select @disabled($payment->status != 'pending') class="custom-select" name="status" id="inputGroupSelect04"
                                                    aria-label="Example select with button addon">
                                                    <option value="paid">Siparisi Onayla</option>
                                                    <option value="cancelled">Siparişi İptal Et</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button @disabled($payment->status != 'pending') class="btn btn-outline-secondary" type="submit">Uygula</button>
                                                </div>
                                            </div>
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
