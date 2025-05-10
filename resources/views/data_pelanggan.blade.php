@extends('layout.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-9">
            <h1 class="h3 mb-2 text-gray-800">Data Pelanggan</h1>
    <p class="mb-4">Anda dapat mengelola data pelanggan pada halaman ini.</p>
        </div>
        <div class="col-sm-3 mt-2 text-right">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Pelanggan</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pelanggan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-secondary">No</th>
                            <th class="text-secondary">Nama Pelanggan</th>
                            <th class="text-secondary">No Telepon</th>
                            <th class="text-secondary">Alamat</th>
                            
                            <th class="text-secondary">Aksi</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        @foreach ($dp as $no=>$item)
                            <tr>
                                <td class="text-secondary">{{$no+1}}</td>
                                <td class="text-secondary">{{$item->nama_pelanggan}}</td>
                                <td class="text-secondary">{{$item->no_tlp}}</td>
                                <td class="text-secondary">{{$item->alamat}}</td>
                             
                                <td>
                                    <center>
                                        <a href="" data-toggle="modal" data-target="#exampleModal1{{$item->id}}"><i class="fas fa-edit text-primary" title="edit"></i></a>&nbsp;
                                        <a href="" data-toggle="modal" data-target="#exampleModal2{{$item->id}}"><i class="fas fa-trash text-danger" title="hapus"></i></a>
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
<form action="{{url('/tambah-pelanggan')}}" method="POST">
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
                <label for="exampleFormControlInput1">Nama Pelanggan</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama pelanggan" 
                name="nama_pelanggan" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">No Telepon</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan no telepon"
                name="no_tlp">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Alamat</label>
                <textarea name="alamat" class="form-control" id="" cols="5" rows="2"></textarea>
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


@foreach ($dp as $item)
<form action="{{url('edit-pelanggan/'. $item->id)}}" method="POST">
    @csrf
    @method('PUT')
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Pelanggan</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan kode barang" 
                name="nama_pelanggan" value="{{$item->nama_pelanggan}}" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">No Telepon</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama barang"
                name="no_tlp" value="{{$item->no_tlp}}">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Alamat</label>
                <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{$item->alamat}}</textarea>
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
@endforeach

@foreach ($dp as $item)
<form action="{{url('hapus-pelanggan/'. $item->id)}}" method="POST">
    @csrf
    @method('DELETE')
<div class="modal fade" id="exampleModal2{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <p>Apakah anda yakin ingin menghapus data pelanggan <b>{{$item->nama_pelanggan}}</b>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endforeach


@section('css')

@endsection

@section('js')
<script type="text/javascript">
    var ongkos_toko = document.getElementById('ongkos_toko');
    ongkos_toko.addEventListener('keyup', function(e)
    {
        ongkos_toko.value = formatRupiah(this.value, 'Rp. ');
    });
    var ongkos_toko_edit = document.getElementById('ongkos_toko_edit');
    ongkos_toko_edit.addEventListener('keyup', function(e)
    {
        ongkos_toko_edit.value = formatRupiah(this.value, 'Rp. ');
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