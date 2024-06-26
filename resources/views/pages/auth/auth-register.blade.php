@extends('layouts.auth')

@section('title', 'Register')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('img/logo.svg') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h3>Bikin Akun</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                @csrf

                <div class="form-group col-12">
                    <label for="name">Nama</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autofocus value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label for="password2" class="d-block">Konfirmasi Password</label>
                        <input id="password2" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush
