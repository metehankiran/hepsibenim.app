@extends('backend.master')
@section('title',$user->is_admin ? 'Yönetici Düzenle' : 'Kullanıcı Düzenle')
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
    <div class="col-md-12 text-center mb-3">
        <p>{{ $user->is_admin ? 'Admin' : 'Üye' }} Görseli</p>
        <img class="img-thumbnail" width="400px" src="{{ Storage::url($user->image) }}">
    </div>
    <form method="post" action="{{ route('backend.user.update',$user) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>{{ $user->is_admin ? 'Admin' : 'Üye' }} Adı</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" placeholder="Üye Adı...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>{{ $user->is_admin ? 'Admin' : 'Üye' }} Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Üye Email...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>{{ $user->is_admin ? 'Admin' : 'Üye' }} Telefon</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Üye Telefon...">
                </div>
            </div>
        </div>
        @if ($user->is_admin)
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Şifre</label>
                    <input type="password" class="form-control" name="password"  placeholder="Şifre...">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Şifre Tekrar</label>
                    <input type="password" class="form-control" name="password_confirmation"  placeholder="Şifre tekrar...">
                </div>
            </div>
        </div>
        @endif
        @if (!$user->is_admin)
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Üye Statüsü</label>
                    <select class="form-control" name="is_admin">
                        <option @selected($user->is_admin == true)  value="1">Yönetici Üye</option>
                        <option @selected($user->is_admin == false)  value="0">Normal Üye</option>
                </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Üye Durumu</label>
                    <select class="form-control" name="is_active">
                        <option @selected($user->is_active == true)  value="1">Aktif Üye</option>
                        <option @selected($user->is_active == false)  value="0">Pasif Üye</option>
                </select>
                </div>
            </div>
        </div>
        @if($user->address)
        <h2>Adres Bilgileri</h2>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Açık Adres</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address', $user->address->address) }}" placeholder="Üye Açık Adresi..." required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Ülke</label>
                    <input type="text" class="form-control" name="country" value="{{ old('country', $user->address->country) }}" placeholder="Üye Ülke..." required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>İl</label>
                    <input type="text" class="form-control" name="state" value="{{ old('state', $user->address->state) }}" placeholder="Üye İl..." required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>İlçe</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city', $user->address->city) }}" placeholder="Üye İlçe..." required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Posta Kodu</label>
                    <input type="text" class="form-control" name="zip" value="{{ old('zip', $user->address->zip) }}" placeholder="Üye Posta Kodu..." required>
                </div>
            </div>
        </div>
        @endif
        @if($user->paymentMethod)
        <h2>Ödeme Yöntemi</h2>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Kart Tipi</label>
                    <select class="form-control" name="method">
                        <option @selected($user->paymentMethod->method == 'paypal')  value="paypal">Paypal</option>
                        <option @selected($user->paymentMethod->method == 'debit_card')  value="debit_card">Debit Kart</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Kart İsim Soyisim</label>
                    <input type="text" class="form-control" name="card_name" value="{{ old('card_name', $user->paymentMethod->name) }}" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Kart Numarası</label>
                    <input type="text" class="form-control" name="card_number" value="{{ old('card_number', $user->paymentMethod->card_number) }}" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Son Kullanma Tarihi</label>
                    <input type="text" class="form-control" name="expiration_date" value="{{ old('expiration_date', $user->paymentMethod->expiration_date) }}" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>CVV</label>
                    <input type="text" class="form-control" name="cvv" value="{{ old('cvv', $user->paymentMethod->cvv) }}" required>
                </div>
            </div>
        </div>
        @endif
        @endif
        @if($user->is_admin)
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="Admin Görseli">Admin Görseli</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
        </div>
        @endif
        <button class="btn btn-primary">{{ $user->is_admin ? 'Admin' : 'Üye' }} Bilgisini Güncelle</button>
    </form>
</div>
@endsection