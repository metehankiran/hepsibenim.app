@extends('backend.master')
@section('title', 'Website Ayarları')
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
        <form method="post" action="{{ route('backend.setting.update', $setting) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Adres</label>
                <input type="text" class="form-control" name="address" value="{{ old('address', $setting->address) }}"
                    placeholder="Adres...">
            </div>
            <div class="form-group">
                <label>Google Maps Embed Adresi</label>
                <input type="text" class="form-control" name="map" value="{{ old('map', $setting->map) }}"
                    placeholder="Map...">
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <input type="text" class="form-control" name="instagram" value="{{ old('instagram', $setting->instagram) }}"
                    placeholder="Adres...">
            </div>
            <div class="form-group">
                <label>Telefon Numaraları <span class="text-danger">Virgül(,) ile ayırınız.</span></label>
                <input type="text" class="form-control" name="phone_numbers" value="{{ old('phone_numbers', $setting->phone_numbers) }}"
                    placeholder="Adres...">
            </div>
            <div class="form-group">
                <label>Email Adresleri <span class="text-danger">Virgül(,) ile ayırınız.</span></label>
                <input type="text" class="form-control" name="emails" value="{{ old('emails', $setting->emails) }}"
                    placeholder="Adres...">
            </div>
            <div class="form-group">
                <label>Çalışma Saatleri <span class="text-danger">Virgül(,) ile ayırınız.</span></label>
                <input type="text" class="form-control" name="working_hours" value="{{ old('working_hours', $setting->working_hours) }}"
                    placeholder="Adres...">
            </div>
            <div class="form-group">
                <label>Hakkımızda</label>
                <textarea class="form-control" name="about" placeholder="Hakkımızda..." rows="3"
                    required>{{ old('about', $setting->about) }}</textarea>
            </div>
            <button class="btn btn-primary">Website Ayarlarını Güncelle</button>
        </form>
    </div>
@endsection
