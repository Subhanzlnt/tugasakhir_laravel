@extends('templates.user.default')

@section('content')
    @if ($keranjangs->isEmpty())
        <hr>
        <div
            class="cart-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row mb--96 mb-md--57">
                    <div class="section mb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumb-title text-center">
                                        <h1>Keranjang Kosong</h1>
                                        <ul class="page-breadcrumb">
                                            <li><a href="{{ url('/') }}">Beranda</a></li>
                                        </ul>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Cart Section Start -->
        <hr>
        <div
            class="cart-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row mb--96 mb-md--57">
                    <div class="col-12">
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="table-content table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>Gambar</th>
                                                <th class="text-left">Nama</th>
                                                <th>Stok</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form id="from-pembayaran" class="cart-form"
                                                action="{{ route('keranjang.checkout') }}" method="post">
                                                @csrf
                                                @php($no = 0)
                                                @foreach ($keranjangs as $keranjang)
                                                    <tr>
                                                        <td class="product-remove text-left"><a href="#"
                                                                class="remove"></a>
                                                        </td>
                                                        <td class="product-thumbnail text-left">
                                                            <img src="{{ asset('images/' . $keranjang->alat->gambar) }}"
                                                                alt="Product Thumnail">
                                                        </td>
                                                        <td width="10%">
                                                            <a
                                                                href="product-details.html">{{ $keranjang->alat->nama }}</a>
                                                        </td>
                                                        <td id="stok_awal{{ $no }}" width="5%">
                                                            {{ $keranjang->alat->stok }}</td>
                                                        <td class="product-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money" id="harga{{ $no }}">
                                                                    Rp.
                                                                    {{ number_format($keranjang->alat->harga, 0, ',', '.') }}
                                                                    /Hari
                                                                </span>
                                                            </span>

                                </div>
                                </td>
                                <td class="product-quantity">
                                    <div class="quantity quantity--2" id="quantity{{ $no }}">
                                        <input type="text" class="quantity-input" id="input-quantity{{ $no }}"
                                            value="{{ $keranjang->qty }}" disabled style="background-color:transparent">
                                        <input type="hidden" name="stok[]" id="stok{{ $no }}"
                                            value="{{ $keranjang->qty }}">
                                    </div>
                                </td>
                                <td class="product-total-price">
                                    <span class="product-price-wrapper">
                                        <span class="money" id="total{{ $no }}">Rp.
                                            {{ number_format($keranjang->total, 0, ',', '.') }}</span>
                                    </span>
                                </td>
                                </tr>
                                <input type="hidden" name="total_harga[]" id="total-input{{ $no }}"
                                    value="{{ $keranjang->total }}">
                                <input type="hidden" name="id_keranjang[]" value="{{ $keranjang->id }}">

                                @php($no++)
    @endforeach
    <input type="hidden" id="jumlah" value="{{ count($keranjangs) }}">
    </tbody>
    </table>
    </div>

    </div>
    <div class="col-lg-4">
        <div class="cart-totals">
            <div class="cart-calculator">
                <h2>Total Keranjang</h2>
                <div class="row">
                    <div class='col-sm-10'>
                        <div class="form-group">
                            <label for="tgl_selesai">Tanggal Pinjam</label>
                            <div class="input-group">
                                <input type="text" name="tgl_pinjam" class="form-control" id="datepicker" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col-sm-10'>
                        <div class="form-group">
                            <label for="tgl_selesai">Tanggal Kembali</label>
                            <div class="input-group">
                                <input type="text" name="tgl_kembali" class="form-control" id="datepicker2" required />
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="durasi" id="durasi" value="1">
                <div class="cart-calculator__item">
                    <div class="cart-calculator__item--head">
                        <span>Durasi</span>
                    </div>
                    <div class="cart-calculator__item--value">
                        <span id="durasi2">
                        </span>
                    </div>
                </div>
                <div class="cart-calculator__item">
                    <div class="cart-calculator__item--head">
                        <span>Subtotal</span>
                    </div>
                    <div class="cart-calculator__item--value">
                        {{-- <span id="subtotal"></span> --}}
                        <span>Rp. {{ number_format($keranjang->total, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- @foreach ($keranjangs as $keranjang)

                            @if ($keranjang->user->member == 1)
                                <div class="cart-calculator__item">
                                    <div class="cart-calculator__item--head">
                                        <span>Diskon</span>
                                    </div>
                                    <div class="cart-calculator__item--value">
                                        <span> 10%
                                        </span>
                                    </div>
                                </div>
                            @else
                                Daftar menjadi member untuk mendapatkan diskon
                            @endif
                        @endforeach --}}
                <div class="cart-calculator__item order-total">
                    <div class="cart-calculator__item--head">
                        <span>Total</span>
                    </div>
                    <div class="cart-calculator__item--value">
                        <span id="totals">Rp. {{ number_format($keranjang->sum('total'), 0, ',', '.') }}</span>
                        <input type="hidden" name="total" id="total_semua"
                            value="Rp. {{ number_format($keranjang->sum('total'), 0, ',', '.') }}">
                        <input type="hidden" id="total_awal"
                            value="Rp. {{ number_format($keranjang->sum('total'), 0, ',', '.') }}">
                        <input type="hidden" name="subtotal" id="subtotal2">

                    </div>
                </div>
            </div>
            <!-- <a href="#" class="checkout-btn" disabled>Proceed to checkout</a> -->
            <button type="submit" class="checkout-btn">Pesan</button>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    @endif
    <!-- Cart Section End -->
@endsection
