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
                <h6 class="m-0 font-weight-bold text-primary">Tabel Invoice</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <p>No Faktur</p>
                        <p>Nama Pelanggan/Toko</p>
                        <p>Alamat</p>
                    </div>
                    <div class="col-md-1 text-end">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $faktur->no_faktur }}</p>
                        <p>{{ $faktur->data_pelanggan->nama_pelanggan }}</p>
                        <p>{{ $faktur->data_pelanggan->alamat }}</p>
                    </div>
                    <div class="col-md-12 text-right py-3">
                        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            data-toggle="modal" data-target="#exampleModal"><i
                                class="fas fa-plus fa-sm text-white-50"></i>&nbsp;
                            Tambah Barang
                        </button> &nbsp;
                        <a href="{{ url('cetak-invoice/' . $faktur->id) }}" class="btn btn-sm btn-primary"
                            target="_blank"><i class="fas fa-download fa-sm text-white-50">
                                &nbsp;</i> PRINT OUT</a>
                    </div>
                </div>
                <hr class="sidebar-divider">
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
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @php

                        @endphp
                        <tbody>
                            @foreach ($invoice as $no => $p)
                           
                            @php
                            $y = $p->harga_grosir * $p->jumlah + $p->ongkos_toko;
                                
                                $t = (($p->harga_grosir * $p->jumlah) * $p->disc) / 100;
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
                                        {{$p->disc}}%    
                                        @endif
                                        </td>
                                    <td class="text-right">
                                        @if ($t == 0)
                                            
                                        @else
                                        Rp. {{ number_format($t, 0, ',', '.') }}    
                                        @endif
                                        </td>
                                    <td class="text-right">Rp. {{ number_format($p->ongkos_toko, 0, ',', '.') }}</td>
                                    
                                    <td class="text-right">Rp. {{ number_format($ya , 0, ',', '.') }}</td>


                                    <td class="text-center">
                                        <button type="button"
                                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                            data-toggle="modal" data-target="#exampleModal1{{ $p->id }}">
                                            Edit
                                        </button>
                                        <button type="button"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                                            data-toggle="modal" data-target="#exampleModal2{{ $p->id }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="10" class="text-center">Total</th>
                              
                                <th class="text-right">Rp. {{ number_format($pp , 0, ',', '.') }}</th>

                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Content Row -->



    </div>
    <!-- /.container-fluid -->


    <!-- Modal -->
    <form action="{{ url('/tambah-invoice') }}" method="POST">
        @csrf
        @method('POST')
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Faktur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-12">
                            <input type="hidden" name="faktur_id" value="{{ $faktur->id }}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="nama_barang">Pelanggan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $faktur->data_pelanggan->nama_pelanggan }}" placeholder="..."
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="nama_barang">No Faktur</label>
                                        <input type="text" class="form-control" value="{{ $faktur->no_faktur }}"
                                            placeholder="..." readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="barang">Barang</label>
                                <select class="form-control" id="barang" name="data_barang_id" style="width: 100%"
                                    required>
                                    <option value="">-- Pilih Barang --</option>
                                    @foreach ($barang as $b)
                                        <option value="{{ $b->id }}"
                                             data-harga_barang="{{ $b->harga_barang }}"
                                            data-nama_barang="{{ $b->nama_barang }}" data-qty="{{ $b->qty }}"
                                            data-isi="{{ $b->isi }}" data-grosir_1="{{ $b->grosir_1 }}"
                                            data-grosir_2="{{ $b->grosir_2 }}" data-grosir_3="{{ $b->grosir_3 }}"
                                            data-g_1="{{ $b->grosir_1 }}"
                                            data-g_2="{{ $b->grosir_2 }}" data-g_3="{{ $b->grosir_3 }}">
                                            {{ $b->nama_barang }} -
                                            Rp.{{ number_format($b->harga_barang, 0, ',', '.') }}/{{ $b->qty }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="form-label" for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    placeholder="..." readonly>
                            </div>

                           <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="qty">QTY</label>
                                    <input type="text" class="form-control" id="qty" name="qty"
                                        placeholder="..." readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="isi">Isi</label>
                                    <input type="text" class="form-control" id="isi" name="isi"
                                        placeholder="..." readonly>
                                </div>
                            </div>
                           </div>

                            <h4>Harga Barang</h4>
                            <hr>


                            <div class="form-group">
                                <label class="form-label" for="harga_beli">Harga Umum</label>
                                <input type="text" class="form-control" id="harga_barang" name="harga_barang"
                                    placeholder="..." readonly>
                            </div>

                            <h5>--Pilih Harga Grosir--</h5>
                            <div class="form-check">
                                <label><input type="radio" class="form-check-input" id="grosir_1" name="harga_grosir" value="" required> Grosir 1</label>
                                <input type="text" name="" id="g_1" readonly>
                            </div>

                            <div class="form-check">

                                <label><input type="radio" class="form-check-input" id="grosir_2" name="harga_grosir" value="" required> Grosir 2</label>
                                <input type="text" name="" id="g_2" readonly>
                            </div>

                            <div class="form-check mb-3">

                                <label><input type="radio" class="form-check-input" id="grosir_3" name="harga_grosir" value="" required> Grosir 3</label>
                                <input type="text" name="" id="g_3" readonly>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Jumlah</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="jumlah"
                                    placeholder="..." required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Ongkos Toko</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="ongkos_toko"
                                    placeholder="Masukan nominal ongkos toko">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Diskon (%)</label>
                                <input type="text" class="form-control" id="exampleInputText1" name="disc"
                                    placeholder="...">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <button type="Submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    @foreach ($invoice as $item)
        <form action="{{ url('edit-invoice/' . $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal fade" id="exampleModal1{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Pelanggan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="col-md-12">
                                {{-- <input type="hidden" name="faktur_id" value="{{ $faktur->id }}"> --}}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label" for="nama_barang">Pelanggan</label>
                                            <input type="text" class="form-control"
                                                value="{{ $faktur->data_pelanggan->nama_pelanggan }}" placeholder="..."
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label" for="nama_barang">No Faktur</label>
                                            <input type="text" class="form-control" value="{{ $faktur->no_faktur }}"
                                                placeholder="..." readonly>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="barang">Barang</label>
                                    <select class="form-control" id="barang" name="data_barang_id" style="width: 100%"
                                        required>
                                        <option value="">-- Pilih Barang --</option>
                                        @foreach ($barang as $b)
                                            <option value="{{ $b->id }}" data-harga_barang="{{ $b->harga_barang }}"
                                                data-nama_barang="{{ $b->nama_barang }}" data-qty="{{ $b->qty }}"
                                                data-isi="{{ $b->isi }}" data-grosir_1="{{ $b->grosir_1 }}"
                                                data-grosir_2="{{ $b->grosir_2 }}" data-grosir_3="{{ $b->grosir_3 }}"
                                                data-g_1="{{ $b->grosir_1 }}"
                                                data-g_2="{{ $b->grosir_2 }}" data-g_3="{{ $b->grosir_3 }}">
                                                {{ $b->nama_barang }} -
                                                Rp.{{ number_format($b->harga_barang, 0, ',', '.') }}/{{ $b->qty }}
                                            </option>
                                        @endforeach
                                    </select>
    
                                </div> --}}
                                <div class="form-group">
                                    <label class="form-label" for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" value="{{$item->nama_barang}}"
                                        placeholder="..." readonly>
                                </div>
    
                               <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="qty">QTY</label>
                                        <input type="text" class="form-control" value="{{$item->data_barang->qty}}"
                                            placeholder="..." readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="isi">Isi</label>
                                        <input type="text" class="form-control" value="{{$item->data_barang->isi}}"
                                            placeholder="..." readonly>
                                    </div>
                                </div>
                               </div>
    
                                <h4>Harga Barang</h4>
                                <hr>
    
    
                                <div class="form-group">
                                    <label class="form-label" for="harga_beli">Harga Umum</label>
                                    <input type="text" class="form-control" value="{{$item->harga_barang}}"
                                        placeholder="..." readonly>
                                </div>
    
                                <h5>--Pilih Harga Grosir--</h5>
                                <div class="form-check">
                                    @if ($item->harga_grosir == $item->data_barang->grosir_1)
                                    <label><input type="radio" class="form-check-input" name="harga_grosir" value="{{$item->data_barang->grosir_1}}" checked> Rp. {{ number_format($item->data_barang->grosir_1, 0, ',', '.') }}</label>
                                    @else
                                    <label><input type="radio" class="form-check-input" name="harga_grosir" value="{{$item->data_barang->grosir_1}}"> Rp. {{ number_format($item->data_barang->grosir_1, 0, ',', '.') }}</label>
                                    @endif
                                </div>
    
                                <div class="form-check">
                                    @if ($item->harga_grosir == $item->data_barang->grosir_2)
                                    <label><input type="radio" class="form-check-input" name="harga_grosir" value="{{$item->data_barang->grosir_2}}" checked> Rp. {{ number_format($item->data_barang->grosir_2, 0, ',', '.') }}</label>
                                    @else
                                    <label><input type="radio" class="form-check-input" name="harga_grosir" value="{{$item->data_barang->grosir_2}}"> Rp. {{ number_format($item->data_barang->grosir_2, 0, ',', '.') }}</label>
                                    @endif
                                </div>      
                                
                                <div class="form-check">
                                    @if ($item->harga_grosir == $item->data_barang->grosir_3)
                                    <label><input type="radio" class="form-check-input" name="harga_grosir" value="{{$item->data_barang->grosir_3}}" checked> Rp. {{ number_format($item->data_barang->grosir_3, 0, ',', '.') }}</label>
                                    @else
                                    <label><input type="radio" class="form-check-input" name="harga_grosir" value="{{$item->data_barang->grosir_3}}"> Rp. {{ number_format($item->data_barang->grosir_3, 0, ',', '.') }}</label>
                                    @endif
                                </div>
    
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputText1">Jumlah</label>
                                    <input type="text" class="form-control" id="exampleInputText1" name="jumlah" value="{{$item->jumlah}}"
                                        placeholder="..." required>
                                </div>
    
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputText1">Ongkos Toko</label>
                                    <input type="text" class="form-control" id="exampleInputText1" name="ongkos_toko" value="{{$item->ongkos_toko}}"
                                        placeholder="Masukan nominal ongkos toko">
                                </div>
    
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputText1">Diskon (%)</label>
                                    <input type="text" class="form-control" id="exampleInputText1" name="disc"
                                        placeholder="...">
                                </div>
    
    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                <button type="Submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

    @foreach ($invoice as $item)
        <form action="{{ url('hapus-invoice/' . $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="exampleModal2{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Invoice</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <p>Apakah anda yakin ingin menghapus invoice barang
                                    <b>{{ $item->data_barang->nama_barang }}</b>?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                <button type="Submit" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
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
                    $('#harga_barang').val(harga_barang); // Mengharga_barang harga berdasarkan produk yang dipilih
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
