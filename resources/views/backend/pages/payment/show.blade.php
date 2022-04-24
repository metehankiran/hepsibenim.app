@extends('backend.master')
@section('title', 'Sipariş Detayı')
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
                <h6 class="m-0 font-weight-bold text-primary">Sipariş Durumu :
                    @if ($payment->status == 'pending')
                        <span class="text-info">Bekleniyor</span>
                    @elseif($payment->status == 'cancelled')
                        <span class="text-danger">İptal Edildi</span>
                    @elseif($payment->status == 'paid')
                        <span class="text-success">Ödendi</span>
                    @endif
                </h6>
                <h6 class="m-0 font-weight-bold text-primary mt-2">Sipariş No: PAYMENT-ID-{{ $payment->id }}</h6>
                <h6 class="m-0 font-weight-bold text-primary mt-2">Müşteri Bilgisi : {{ $payment->user->name }}</h6>
                <h6 class="m-0 font-weight-bold text-primary mt-2">Sipariş Tarihi : {{ $payment->created_at }}</h6>
                <h6 class="m-0 font-weight-bold text-primary mt-2">Kart Bilgisi : {{ $payment->paymentMethod->card_number }}</h6>
                <h6 class="m-0 font-weight-bold text-primary mt-2">Adres Bilgisi : {{ $payment->address->address }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ürün No</th>
                                <th>Ürün Adı</th>
                                <th>Adeti</th>
                                <th>Fiyatı</th>
                                <th>Toplam (@money($payment->total()))</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ürün No</th>
                                <th>Ürün Adı</th>
                                <th>Adeti</th>
                                <th>Fiyatı</th>
                                <th>Toplam (@money($payment->total()))</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($payment->productCarts as $item)
                                <tr>
                                    <td>{{ $item->product_id }}</td>
                                    <td>{{ $item->product->title }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>@money($item->product->price)</td>
                                    <td>@money($item->product->price*$item->quantity)</td>
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
