@extends('layouts.app')

@section('title', 'Tambah Supplier')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Supplier</h1>
            </div>

            <div class="section-body mt-5">
                <div class="card">
                    <form action="{{ route('suppliers.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_supplier">Nama Supplier</label>
                                <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror"
                                    id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier') }}"
                                    placeholder="Nama Supplier">
                                @error('nama_supplier')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input type="text" class="form-control @error('kontak') is-invalid @enderror"
                                    id="kontak" name="kontak" value="{{ old('kontak') }}" placeholder="Kontak">
                                @error('kontak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="atm">ATM</label>
                                <input type="text" class="form-control @error('atm') is-invalid @enderror" id="atm"
                                    name="atm" value="{{ old('atm') }}" placeholder="ATM">
                                @error('atm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="norek">No Rekening</label>
                                <input type="text" class="form-control @error('norek') is-invalid @enderror"
                                    id="norek" name="norek" value="{{ old('norek') }}" placeholder="No Rekening">
                                @error('norek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <center><button type="submit" class="btn btn-primary">Simpan</button></center>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    @section('js')
    @endsection
@endpush
