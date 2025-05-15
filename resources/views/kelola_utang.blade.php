@extends('layout.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-9">
            <h1 class="h3 mb-2 text-gray-800">Kelola Utang</h1>
    <p class="mb-4">Anda dapat mengelola Utang pada halaman ini.</p>
        </div>
        <div class="col-sm-3 mt-2 text-right">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal5{{$utang->id}}"><i
                class="fas fa-edit fa-sm text-white-50"></i> Edit Utang</a>
            @if ($utang->status == 1)
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i
                class="fas fa-money-bill-wave fa-sm text-white-50"></i> Bayar Utang</a>
            @else
                
            @endif
            
        </div>
    </div>

    @if (session('Success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{session('Success')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if (session('Successs'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{session('Successs')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if (session('Successss'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{session('Successss')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <!-- DataTales Example -->
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Utang Aktif/Belum Lunas</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <table>
                        <tr>
                            <th>Toko/Pihak Penghutang</th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>{{$utang->toko}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>{{date("d/M/Y", strtotime($utang->tanggal));}}</td>
                        </tr>
                        <tr>
                            <th>Jatuh Tempo</th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>{{date("d/M/Y", strtotime($utang->jth_tempo));}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>@if ($utang->status == 1)
                                <i class="fas fa-square text-danger"></i>&nbsp;Belum Lunas
                            @else
                                <i class="fas fa-square text-success"></i>&nbsp;Lunas
                            @endif</td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table>
                        <tr>
                            <th>
                                Total Utang
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>
                                Rp. {{ number_format($utang->nominal_utang ,0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Total Dibayar
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                            @foreach ($ub as $item)
                            @php
                               
                                $k += $item->nominal_pembayaran;
                            @endphp
                            @endforeach
                            <td>
                                Rp. {{ number_format($k ,0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Sisa Utang
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                         
                            @php
                                $a = $utang->nominal_utang - $k;
                            @endphp
                        
                            <td>
                                Rp. {{ number_format($a ,0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                @if ($utang->status == 1)
                                @if ($a > 0)
                                <button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#exampleModal3{{$utang->id}}" disabled><i
                                    class="fas fa-check  fa-sm text-white-50"></i>&nbsp Lunas</button>
                                    
                                    @elseif($a <= 0)
                                <button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#exampleModal3{{$utang->id}}"><i
                                    class="fas fa-check  fa-sm text-white-50"></i>&nbsp Lunas</button> 
                                    @endif
                                @else
                                    
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Pembayaran Piutang</h6>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-secondary text-center">No</th>
                            <th class="text-secondary text-center">Tanggal Pembayaran</th>
                            <th class="text-secondary text-center">Nominal Pembayaran</th>
                            <th class="text-secondary text-center">Aksi</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        @foreach ($ub as $no=>$item)
                            <tr>
                                <td class="text-secondary text-center">{{$no+1}}</td>
                                <td class="text-secondary text-center">{{date("d/M/Y", strtotime($item->tanggal));}}</td>
                                <td class="text-secondary text-right">Rp. {{ number_format($item->nominal_pembayaran ,0, ',', '.') }}</td>
                                <td>
                                    <center>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal1{{$item->id}}">Hapus</button>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

<!-- Modal -->
<form action="{{url('/pembayaran-utang')}}" method="POST">
    @csrf
    @method('POST')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Pembayaran Piutang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="utang_id" value="{{$utang->id}}">
            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Tanggal Pembayaran</label>
                <input type="date" class="form-control" id="exampleInputText1" name="tanggal"
                    placeholder="Masukan no faktur" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Nominal Pembayaran</label>
                <input type="text" class="form-control" id="nominal_pembayaran" name="nominal_pembayaran"
                    placeholder="Masukan nominal pembayaran" required>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

@foreach ($ub as $item)
<form action="{{url('hapus-pembayaran-utang/'. $item->id)}}" method="POST">
    @csrf
    @method('DELETE')
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <p>Apakah anda yakin ingin menghapus nominal pembayaran Rp. {{ number_format($item->nominal_pembayaran ,0, ',', '.') }}?</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endforeach


<form action="{{url('lunas-utang/'. $utang->id)}}" method="POST">
    @csrf
    @method('PUT')
<div class="modal fade" id="exampleModal3{{$utang->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pelunasan Uutang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <p>Apakah anda yakin ingin melunaskan utang dengan Toko/Pihak Penghutang {{$utang->toko}} dan Nominal Utang Rp. {{ number_format($utang->nominal_utang ,0, ',', '.') }}?</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="{{url('edit-utang/'. $utang->id)}}" method="POST">
    @csrf
    @method('PUT')
<div class="modal fade" id="exampleModal5{{$utang->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Utang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Toko/Pihak Penghutang</label>
                <input type="text" class="form-control" id="" name="toko" value="{{$utang->toko}}"
                    placeholder="Masukan nominal pembayaran" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Tanggal Utang</label>
                <input type="date" class="form-control" id="exampleInputText1" name="tanggal" value="{{$utang->tanggal}}"
                    placeholder="Masukan no faktur" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Nominal Utang</label>
                <input type="text" class="form-control" id="utang_edit" name="nominal_utang" value="{{$utang->nominal_utang}}"
                    placeholder="Masukan nominal pembayaran" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Keterangan</label>
                <input type="text" class="form-control" id="" name="keterangan" value="{{$utang->keterangan}}"
                    placeholder="..." required>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Jatuh Tempo</label>
                <input type="date" class="form-control" id="exampleInputText1" name="jth_tempo" value="{{$utang->jth_tempo}}"
                    placeholder="Masukan no faktur" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

@section('js')

     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#sl2').select2({dropdownParent: $("#exampleModal"),
        width: '100%'
    });
    });
</script>

<script type="text/javascript">
    var nominal_pembayaran = document.getElementById('nominal_pembayaran');
    nominal_pembayaran.addEventListener('keyup', function(e)
    {
        nominal_pembayaran.value = formatRupiah(this.value, 'Rp. ');
    });
    var utang_edit = document.getElementById('utang_edit');
    utang_edit.addEventListener('keyup', function(e)
    {
        utang_edit.value = formatRupiah(this.value, 'Rp. ');
    });
  
    var harga_beli_edit = document.getElementById('harga_beli_edit');
    harga_beli_edit.addEventListener('keyup', function(e)
    {
        harga_beli_edit.value = formatRupiah(this.value, 'Rp. ');
    });
    var harga_jual_edit = document.getElementById('harga_jual_edit');
    harga_jual_edit.addEventListener('keyup', function(e)
    {
        harga_jual_edit.value = formatRupiah(this.value, 'Rp. ');
    });
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
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
        border: 1px solid #ced4da; /* Border default Bootstrap */
        border-radius: 0.25rem; /* Radius border Bootstrap */
        height: calc(2.25rem + 2px); /* Tinggi input Bootstrap */
        padding: 0.375rem 0.75rem; /* Padding input Bootstrap */
        background-color: #fff; /* Warna latar belakang */
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 1.50rem; 
        /* line-height: calc(2.25rem - 2px); */
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100%; /* Sesuaikan tinggi panah */
        right: 0.75rem; /* Sesuaikan posisi panah */
    }

    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #6c757d; /* Warna placeholder */
    }
</style>
@endsection