@extends('layout.app')
@section('content')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- @dd($kategori_barang) --}}
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Invoice</h1>


        </div>

        <!-- Content Row -->
        @if (session('Success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('Success') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('Successs'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('Successs') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('Successss'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('Successss') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Faktur</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <p>No Faktur</p>
                        <p>Nama Pelanggan/Toko</p>
                        <p>Alamat</p>
                        <p>Tanggal</p>
                        <p>Jenis Transaksi</p>
                        @if ($faktur->jth_tempo == null)
                        @else
                            <p>Jatuh Tempo</p>
                        @endif
                    </div>
                    <div class="col-md-1 text-end">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        @if ($faktur->jth_tempo == null)
                        @else
                            <p>:</p>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p>{{ $faktur->no_faktur }}</p>
                        <p>{{ $faktur->data_pelanggan->nama_pelanggan }}</p>
                        <p>{{ $faktur->data_pelanggan->alamat }}</p>
                        <p>{{ date('d/M/Y', strtotime($faktur->tanggal)) }}</p>
                        @if ($faktur->jenis_tr == 'Grosir 1')
                            <p>Grosir 1 (Umum)</p>
                        @elseif ($faktur->jenis_tr == 'Grosir 2')
                            <p>Grosir 2 (Bon)</p>
                        @elseif ($faktur->jenis_tr == 'Grosir 3')
                            <p>Grosir 3 (Tunai)</p>
                        @else
                            <p>-</p>
                        @endif

                        @if ($faktur->jth_tempo == null)

                        @else
                            <p>{{ date('d/M/Y', strtotime($faktur->jth_tempo)) }}</p>
                        @endif


                        <div class="col-md-12 text-right py-3">
                            
                            <a href="{{ url('cetak-invoice-pelanggan/' . $faktur->id) }}" class="btn btn-sm btn-primary"
                                target="_blank"><i class="fas fa-download fa-sm text-white-50">
                                    &nbsp;</i> PRINT OUT</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr class="sidebar-divider">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Invoice</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">Isi</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Harga Barang</th>
                                <th class="text-center">Harga Jual</th>
                                <th class="text-center">Disc</th>
                                <th class="text-center">Potongan</th>
                                <th class="text-center">Ongkos Toko</th>
                                <th class="text-center">Subtotal</th>
                              
                            </tr>
                        </thead>
                        @php
        
                        @endphp
                        <tbody>
                            @foreach ($inv as $no => $p)
                                @php
                                    $o = $p->ongkos_toko * $p->jumlah;
                                    $y = $p->harga_grosir * $p->jumlah + $o;
        
                                    $t = ($y * $p->disc) / 100;
                                    $ya = $y - $t;
                                    $pp += $ya;
                                @endphp
        
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>
                                    <td class="text-center">{{ $p->data_barang->qty }}</td>
                                    <td class="text-center">
                                        @if ($p->data_barang->isi == null)
                                            -
                                        @else
                                            {{ $p->data_barang->isi }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $p->jumlah }}</td>
                                    <td class="text-center">{{ $p->nama_barang }}</td>
        
        
        
                                    <td class="text-right">Rp.
                                        {{ number_format($p->harga_barang, 0, ',', '.') }}</td>
                                    </td>
                                    <td class="text-right">Rp.
                                        {{ number_format($p->harga_grosir, 0, ',', '.') }}</td>
                                    </td>
        
        
                                    <td class="text-left">
                                        @if ($p->disc == null)
                                        @else
                                            {{ $p->disc }}%
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        @if ($t == 0)
                                        @else
                                            Rp. {{ number_format($t, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    @if ($p->ongkos_toko == null)
                                        <td>-</td>
                                    @else
                                    <td class="text-right">Rp. {{ number_format($o, 0, ',', '.') }}</td>
                                    @endif
                                   
        
                                    <td class="text-right">Rp. {{ number_format($ya, 0, ',', '.') }}</td>
        
        
                                   
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="10" class="text-center">Total</th>
        
                                <th class="text-right">Rp. {{ number_format($pp, 0, ',', '.') }}</th>
        
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->



    
    <!-- /.container-fluid -->


@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <script>
        $(document).ready(function() {
            $('#barang').select2({
                dropdownParent: $("#exampleModal")
            });
            $('#barang').on('change', function() {
                var nama_barang = $(this).find(':selected').data('nama_barang');
                var qty = $(this).find(':selected').data('qty');
                var isi = $(this).find(':selected').data('isi');
                var harga_barang = $(this).find(':selected').data('harga_barang');
                var grosir_1 = $(this).find(':selected').data('grosir_1');
                var grosir_2 = $(this).find(':selected').data('grosir_2');
                var grosir_3 = $(this).find(':selected').data('grosir_3');
                var g_1 = $(this).find(':selected').data('grosir_1');
                var g_2 = $(this).find(':selected').data('grosir_2');
                var g_3 = $(this).find(':selected').data('grosir_3');

                if (nama_barang) {
                    $('#nama_barang').val(nama_barang); // Mengisi harga berdasarkan produk yang dipilih
                } else {
                    $('#nama_barang').val(''); // Kosongkan harga jika tidak ada barang yang dipilih
                }

                if (qty) {
                    $('#qty').val(qty); // Mengisi harga berdasarkan produk yang dipilih
                } else {
                    $('#qty').val(''); // Kosongkan harga jika tidak ada barang yang dipilih
                }

                if (isi) {
                    $('#isi').val(isi); // Mengisi harga berdasarkan produk yang dipilih
                } else {
                    $('#isi').val(''); // Kosongkan harga jika tidak ada barang yang dipilih
                }

                if (harga_barang) {
                    $('#harga_barang').val(
                    harga_barang); // Mengharga_barang harga berdasarkan produk yang dipilih
                } else {
                    $('#harga_barang').val(''); // Kosongkan harga jika tidak ada barang yang dipilih
                }

                if (g_1) {
                    $('#g_1').val(g_1); // Mengisi harga berdasarkan produk yang dipilih
                } else {
                    $('#g_1').val(''); // Kosongkan harga jika tidak ada barang yang dipilih
                }

                if (g_2) {
                    $('#g_2').val(g_2); // Mengisi harga berdasarkan produk yang dipilih
                } else {
                    $('#g_2').val(''); // Kosongkan harga jika tidak ada barang yang dipilih
                }

                if (g_3) {
                    $('#g_3').val(g_3); // Mengisi harga berdasarkan produk yang dipilih
                } else {
                    $('#g_3').val(''); // Kosongkan harga jika tidak ada barang yang dipilih
                }

                if (grosir_1) {
                    $('#grosir_1').attr('value', grosir_1);
                } else {
                    $('#grosir_1').attr('value', '');
                }

                if (grosir_2) {
                    $('#grosir_2').attr('value', grosir_2);
                } else {
                    $('#grosir_2').attr('value', '');
                }

                if (grosir_3) {
                    $('#grosir_3').attr('value', grosir_3);
                } else {
                    $('#grosir_3').attr('value', '');
                }

                function formatRupiah(angka, prefix) {
                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
                }
            });
        });
    </script>

    <script type="text/javascript">
        var harga_barang = document.querySelector('.harga_barang');
        harga_barang.addEventListener('keyup', function(e) {
            harga_barang.value = formatRupiah(this.value, 'Rp. ');
        });
        var harga_jual = document.getElementById('harga_c');
        harga_jual.addEventListener('keyup', function(e) {
            harga_jual.value = formatRupiah(this.value, 'Rp. ');
        });

        var harga_beli_edit = document.getElementById('harga_beli_edit');
        harga_beli_edit.addEventListener('keyup', function(e) {
            harga_beli_edit.value = formatRupiah(this.value, 'Rp. ');
        });
        var harga_jual_edit = document.getElementById('harga_jual_edit');
        harga_jual_edit.addEventListener('keyup', function(e) {
            harga_jual_edit.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
    </script>
@endsection
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <style>
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            /* Border default Bootstrap */
            border-radius: 0.25rem;
            /* Radius border Bootstrap */
            height: calc(2.25rem + 2px);
            /* Tinggi input Bootstrap */
            padding: 0.375rem 0.75rem;
            /* Padding input Bootstrap */
            background-color: #fff;
            /* Warna latar belakang */
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.50rem;
            /* line-height: calc(2.25rem - 2px); */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
            /* Sesuaikan tinggi panah */
            right: 0.75rem;
            /* Sesuaikan posisi panah */
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #6c757d;
            /* Warna placeholder */
        }
    </style>
@endsection
