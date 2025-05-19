@extends('layout.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-9">
            <h1 class="h3 mb-2 text-gray-800">Faktur {{$p->nama_pelanggan}}</h1>
    <p class="mb-4">Anda dapat membuat faktur pada halaman ini.</p>
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Faktur</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-secondary text-center">No</th>
                            <th class="text-secondary text-center">No Faktur</th>
                            <th class="text-secondary text-center">Nama Pelanggan</th>
                            <th class="text-secondary text-center">Tanggal</th>
                            <th class="text-secondary text-center">Jenis Transaksi</th>
                            <th class="text-secondary text-center">Tanggal Jatuh Tempo</th>
                            <th class="text-secondary text-center">Aksi</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        @foreach ($fp as $no=>$item)
                            <tr>
                                <td class="text-secondary">{{$no+1}}</td>
                                <td class="text-secondary">{{$item->no_faktur}}</td>
                                <td class="text-secondary">{{$item->data_pelanggan->nama_pelanggan}}</td>
                                <td class="text-secondary">{{date("d/M/Y", strtotime($item->tanggal));}}</td>
                                @if ($item->jenis_tr == 'Grosir 1')
                                <td class="text-secondary">Grosir 1 (Umum)</td>
                                @elseif ($item->jenis_tr == 'Grosir 2')
                                <td class="text-secondary">Grosir 2 (Bon)</td>
                                @elseif ($item->jenis_tr == 'Grosir 3')
                                <td class="text-secondary">Grosir 3 (Tunai)</td>
                                @else
                                <td>-</td>
                                @endif

                                @if ($item->jth_tempo == null)
                                <td class="text-secondary">-</td>
                                @else
                                <td class="text-secondary">{{date("d/M/Y", strtotime($item->jth_tempo));}}</td>
                                @endif
                                
                                <td>
                                    <center>
                                        <a href="{{url('invoice-pelanggan/'. $item->id)}}" class="btn btn-primary"><i class="fas fa-eye text-light" title="Lihat"></i>&nbsp;Lihat Invoice</a>
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
    var harga_beli = document.getElementById('harga_beli');
    harga_beli.addEventListener('keyup', function(e)
    {
        harga_beli.value = formatRupiah(this.value, 'Rp. ');
    });
    var harga_jual = document.getElementById('harga_jual');
    harga_jual.addEventListener('keyup', function(e)
    {
        harga_jual.value = formatRupiah(this.value, 'Rp. ');
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