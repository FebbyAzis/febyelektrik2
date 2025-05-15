@extends('layout.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-9">
            <h1 class="h3 mb-2 text-gray-800">Utang</h1>
    <p class="mb-4">Anda dapat mengelola utang pada halaman ini.</p>
        </div>
        <div class="col-sm-3 mt-2 text-right">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Buat Utang Baru</a>
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
        <div class="card-header py-3 bg-warning">
            <h6 class="m-0 font-weight-bold text-dark">Utang Aktif/Belum Lunas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-secondary text-center">No</th>
                            <th class="text-secondary text-center">Toko/Pihak Penghutang</th>
                            <th class="text-secondary text-center">Tanggal Utang</th>
                            <th class="text-secondary text-center">Nominal Utang</th>
                            <th class="text-secondary text-center">Keterangan</th>
                            <th class="text-secondary text-center">Tanggal Jatuh Tempo</th>
                            <th class="text-secondary text-center">Status</th>
                            <th class="text-secondary text-center">Aksi</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        @foreach ($uta as $no=>$item)
                            <tr>
                                <td class="text-secondary">{{$no+1}}</td>
                                <td class="text-secondary">{{$item->toko}}</td>
                                <td class="text-secondary">{{date("d/M/Y", strtotime($item->tanggal));}}</td>
                                <td class="text-secondary text-right">Rp. {{ number_format($item->nominal_utang ,0, ',', '.') }}</td>
                                <td class="text-secondary">{{$item->keterangan}}</td>
                                @if ($item->jth_tempo == null)
                                <td class="text-secondary">-</td>
                                @else
                                <td class="text-secondary">{{date("d/M/Y", strtotime($item->jth_tempo));}}</td>
                                @endif
                              <td class="text-secondary">
                                @if ($item->status == 1)
                                <i class="fas fa-square text-danger"></i> Belum Lunas
                                @else
                                    Lunas
                                @endif
                              </td>
                                <td>
                                    <center>
                                        <a href="{{url('kelola-utang/'. $item->id)}}" class="btn btn-sm btn-primary">Lihat</a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Utang Nonaktif/Sudah Lunas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabelPertama" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-secondary text-center">No</th>
                                <th class="text-secondary text-center">Toko/Pihak Penghutang</th>
                                <th class="text-secondary text-center">Tanggal Utang</th>
                                <th class="text-secondary text-center">Nominal Utang</th>
                                <th class="text-secondary text-center">Keterangan</th>
                                <th class="text-secondary text-center">Tanggal Jatuh Tempo</th>
                                <th class="text-secondary text-center">Status</th>
                                <th class="text-secondary text-center">Aksi</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            @foreach ($utl as $no=>$item)
                                <tr>
                                    <td class="text-secondary">{{$no+1}}</td>
                                    <td class="text-secondary">{{$item->toko}}</td>
                                    <td class="text-secondary">{{date("d/M/Y", strtotime($item->tanggal));}}</td>
                                    <td class="text-secondary text-right">Rp. {{ number_format($item->nominal_utang ,0, ',', '.') }}</td>
                                    <td class="text-secondary">{{$item->keterangan}}</td>
                                    @if ($item->jth_tempo == null)
                                    <td class="text-secondary">-</td>
                                    @else
                                    <td class="text-secondary">{{date("d/M/Y", strtotime($item->jth_tempo));}}</td>
                                    @endif
                                  <td class="text-secondary">
                                    @if ($item->status == 1)
                                        Belum Lunas
                                    @else
                                       <i class="fas fa-square text-success"></i> Lunas
                                    @endif
                                  </td>
                                    <td>
                                        <center>
                                            <a href="{{url('kelola-utang/'. $item->id)}}" class="btn btn-sm btn-primary">Lihat</a>
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

</div>
@endsection

<!-- Modal -->
<form action="{{url('/buat-utang')}}" method="POST">
    @csrf
    @method('POST')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Toko/Pihak Penghutang</label>
                <input type="text" class="form-control" id="exampleInputText1" name="toko"
                    placeholder="..." required>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Tanggal Utang</label>
                <input type="date" class="form-control" id="" name="tanggal" placeholder="..."
                    required>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Nominal Utang</label>
                <input type="text" class="form-control" id="nominal_utang" name="nominal_utang" placeholder="..."
                    required>
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Keterangan</label>
                <input type="text" class="form-control" id="" name="keterangan" placeholder="...">
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleInputText1">Jatuh Tempo</label>
                <input type="date" class="form-control" id="" name="jth_tempo" placeholder="...">
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
    var nominal_utang = document.getElementById('nominal_utang');
    nominal_utang.addEventListener('keyup', function(e)
    {
        nominal_utang.value = formatRupiah(this.value, 'Rp. ');
    });
    var nominal_utang_edit = document.getElementById('nominal_utang_edit');
    nominal_utang_edit.addEventListener('keyup', function(e)
    {
        nominal_utang_edit.value = formatRupiah(this.value, 'Rp. ');
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
  
  <script>
    $(document).ready(function() {
    $('#tabelPertama').DataTable({
        responsive: true,
        paging: true
    });


});
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