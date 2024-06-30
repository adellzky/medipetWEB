@extends('layouts.app-cust')

@section('title', 'Checkout')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-breadcrumb" style="height: 32px;">
                </div>
            </div>
            <div class="card rounded-4 mt-6">
                <div class="card-body p-4">
                        <table class="table-bordered table-md table">
                            <div class="col-12">
                                <h2 class="text-left mb-4">Pemesanan</h2>
                                <th class="col-md-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <span><i class="fa-solid fa-location-dot px-2"></i> Alamat Pengiriman</span>
                                            {{-- <div class="mt-2 px-5"><a> {{ $user->name }}</a></div>
                                            <div class="px-5"><a> {{ $user->email }}</a></div>
                                            <div class="px-5"><a> {{ $user->phone }}</a></div>
                                            <div class="px-5"><a> {{ $user->address }}</a></div> --}}
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center justify-content-center text-right">
                                            <a href="/profile/edit" class="text-blue-500">Edit</a>
                                        </div>
                                    </div>
                                </th>
                            </div>
                        </table>

                        <div class="row">
                            @foreach ($selectedCart as $item)
                            <div class="row p-4">
                                <div class="col-sm-3 hidden-xs">
                                    <img src="{{ asset('product/' . $item['image'] )}}" class="card-img-top">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <span class="px-3">{{ $item['nama'] }}</span>
                                    <div class="px-3">{{ $item['quantity'] }} x</div>
                                    <div class="invoice-detail-value mt-2 px-3">Rp. {{ $item['harga'] }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="mt-4 col-3">
                                <h6 class="text-left">Pembayaran</h6>
                                <div class="col-6">
                                    <select type="text" class="form-select mt-3" aria-label="Default select example" id="pembayaran" name="pembayaran" aria-label="Default select example">
                                        <option selected>-- none --</option>
                                        <option value="1">BRI</option>
                                        <option value="2">BCA</option>
                                        <option value="3">BNI</option>
                                        <option value="4">Mandiri</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label for="norek">No.Rekening</label>
                                    <input type="text" class="form-control" id="norek" name="norek">
                                </div>
                            </div>
                        </div>
                    <hr>
                    <div class="float-end">
                        <p class="mb-4 me-5 d-flex justify-content-end align-items-center">
                            <span class="text-muted fw-normal px-4" style="font-size: 115%">Total: </span>
                            <span class="fw-normal px-2" style="font-size: 110%">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</span>
                        </p>
                    </div>
                    <div class="text-md-right">
                        <div class="float-lg-right mb-lg-0 mb-3">
                            <a class="btn btn-danger btn-icon icon-left" href="/cart">Batal</a>
                            <a class="btn btn-primary btn-icon icon-left" href="/pesanan/success">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
@endpush
