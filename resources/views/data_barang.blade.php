@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang</a>
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
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-secondary" rowspan="2">No</th>
                                <th class="text-secondary" rowspan="2">Kode Barang</th>
                                <th class="text-secondary" rowspan="2">Kategori Barang</th>
                                <th class="text-secondary" rowspan="2">Nama Barang</th>
                                <th class="text-secondary" rowspan="2">QTY</th>
                                <th class="text-secondary" rowspan="2">Isi</th>
                                <th class="text-secondary text-center" colspan="4">Harga Barang</th>
                                <th class="text-secondary" rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                              <th class="text-secondary">Harga Pokok</th>
                              <th class="text-secondary">Grosir 1</th>
                              <th class="text-secondary">Grosir 2</th>
                              <th class="text-secondary">Grosir 3</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            @foreach ($db as $no=>$item)
                                <tr>
                                    <td class="text-secondary">{{$no+1}}</td>
                                    <td class="text-secondary">{{$item->kode_barang}}</td>
                                    <td class="text-secondary">{{$item->kategori_barang}}</td>
                                    <td class="text-secondary">{{$item->nama_barang}}</td>
                                    <td class="text-secondary">{{$item->qty}}</td>
                                    @if ($item->isi == null)
                                        <td class="text-secondary">-</td>
                                    @else
                                     <td class="text-secondary">{{$item->isi}}</td>
                                    @endif
                                    <td class="text-secondary text-right">Rp. {{ number_format($item->harga_barang ,0, ',', '.') }}</td>
                                    <td class="text-secondary text-right">Rp. {{ number_format($item->grosir_1 ,0, ',', '.') }}</td>
                                    <td class="text-secondary text-right">Rp. {{ number_format($item->grosir_2 ,0, ',', '.') }}</td>
                                    <td class="text-secondary text-right">Rp. {{ number_format($item->grosir_3 ,0, ',', '.') }}</td>
                                    <td class="text-secondary">
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
    <!-- /.container-fluid -->
@endsection


<!-- Modal -->
<form action="{{url('/tambah-barang')}}" method="POST">
    @csrf
    @method('POST')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleFormControlInput1">Kode Barang</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan kode barang" 
                name="kode_barang">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Kategori Barang</label><br>
                <select class="form-select text-secondary" id="kategori_barang" name="kategori_barang" required>
                  <option selected>Pilih kategori barang...</option>
                  <option value="Lampu">Lampu</option>
                  <option value="Kabel">Kabel</option>
                  <option value="Peralatan Listrik">Peralatan Listrik</option>
                  <option value="Peralatan Rumah">Peralatan Rumah</option>
                  <option value="Material Bangunan">Material Bangunan</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama Barang</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama barang"
                name="nama_barang" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">QTY</label>
                <div class="row ml-1">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="DUS" required>
                            <label class="form-check-label" for="gridRadios1">
                              DUS
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PAK" required>
                            <label class="form-check-label" for="gridRadios1">
                              PAK
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KRG" required>
                            <label class="form-check-label" for="gridRadios1">
                              KRG
                            </label>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PCS" required>
                            <label class="form-check-label" for="gridRadios1">
                              PCS
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KG" required>
                            <label class="form-check-label" for="gridRadios1">
                              KG
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KARTON" required>
                            <label class="form-check-label" for="gridRadios1">
                              KARTON
                            </label>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="ROL" required>
                            <label class="form-check-label" for="gridRadios1">
                              ROL
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="LSN" required>
                            <label class="form-check-label" for="gridRadios1">
                              LSN
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="MTR" required>
                            <label class="form-check-label" for="gridRadios1">
                              MTR
                            </label>
                          </div>
                    </div>    
                </div>  
            </div>
            

            <div class="form-group">
                <label for="exampleFormControlInput1">Isi</label>
                <input type="text" class="form-control" id="isi" placeholder="Masukan jumlah isi barang"
                name="isi">
              </div>

<hr>
<h3>Harga Barang</h3>
             
<div class="form-group">
  <label for="exampleFormControlInput1">Harga Pokok</label>
  <input type="text" class="form-control" id="harga_barang" placeholder="Masukan harga pokok"
  name="harga_barang" required>
</div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Harga Grosir 1</label>
                <input type="text" class="form-control" id="grosir_1" placeholder="Masukan harga grosir 1"
                name="grosir_1" required>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Harga Grosir 2</label>
                <input type="text" class="form-control" id="grosir_2" placeholder="Masukan harga grosir 2">
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Harga Grosir 3</label>
                <input type="text" class="form-control" id="grosir_3" placeholder="Masukan harga grosir 3"
                name="grosir_3" required>
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

@foreach ($db as $item)
    

<form action="{{url('edit-barang/'. $item->id)}}" method="POST">
  @csrf
  @method('PUT')
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label for="exampleFormControlInput1">Kode Barang</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan kode barang" 
              name="kode_barang" value="{{$item->kode_barang}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Kategori Barang</label><br>
              <select class="form-select text-secondary" id="kategori_barang" name="kategori_barang" required>
                <option selected>{{$item->kategori_barang}}</option>
                <option value="Lampu">Lampu</option>
                <option value="Kabel">Kabel</option>
                <option value="Peralatan Listrik">Peralatan Listrik</option>
                <option value="Peralatan Rumah">Peralatan Rumah</option>
                <option value="Material Bangunan">Material Bangunan</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Barang</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama barang"
              name="nama_barang" value="{{$item->nama_barang}}" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">QTY</label>
              <div class="row ml-1">
                  <div class="col-md-4">
                    @if ($item->qty == 'DUS')
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="DUS" required checked>
                      <label class="form-check-label" for="gridRadios1">
                        DUS
                      </label>
                    </div>
                    @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="DUS" required>
                      <label class="form-check-label" for="gridRadios1">
                        DUS
                      </label>
                    </div>
                    @endif
                      

                    @if ($item->qty == 'PAK')
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PAK" required checked>
                      <label class="form-check-label" for="gridRadios1">
                        PAK
                      </label>
                    </div>
                    @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PAK" required>
                      <label class="form-check-label" for="gridRadios1">
                        PAK
                      </label>
                    </div>
                    @endif
                        
                    @if ($item->qty == 'KRG')
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KRG" required checked>
                      <label class="form-check-label" for="gridRadios1">
                        KRG
                      </label>
                    </div>
                    @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KRG" required>
                      <label class="form-check-label" for="gridRadios1">
                        KRG
                      </label>
                    </div>
                    @endif
                        
                    
                  </div>
                  <div class="col-md-4">
                    @if ($item->qty == 'PCS')
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PCS" required checked>
                      <label class="form-check-label" for="gridRadios1">
                        PCS
                      </label>
                    </div>
                    @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PCS" required>
                      <label class="form-check-label" for="gridRadios1">
                        PCS
                      </label>
                    </div>
                    @endif
                    @if ($item->qty == 'KG')
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KG" required checked>
                      <label class="form-check-label" for="gridRadios1">
                        KG
                      </label>
                    </div>
                    @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KG" required>
                      <label class="form-check-label" for="gridRadios1">
                        KG
                      </label>
                    </div>
                    @endif
                    @if ($item->qty == 'KARTON')
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KARTON" required checked>
                      <label class="form-check-label" for="gridRadios1">
                        KARTON
                      </label>
                    </div>
                    @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KARTON" required>
                      <label class="form-check-label" for="gridRadios1">
                        KARTON
                      </label>
                    </div>
                    @endif
                  </div>
                  <div class="col-md-4">
                    @if ($item->qty == 'ROL')
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="ROL" required checked>
                      <label class="form-check-label" for="gridRadios1">
                        ROL
                      </label>
                    </div>
                    @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="ROL" required>
                      <label class="form-check-label" for="gridRadios1">
                        ROL
                      </label>
                    </div>
                    @endif
                    @if ($item->qty == 'LSN')
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="LSN" required checked>
                      <label class="form-check-label" for="gridRadios1">
                        LSN
                      </label>
                    </div>
                    @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="LSN" required>
                      <label class="form-check-label" for="gridRadios1">
                        LSN
                      </label>
                    </div>
                    @endif
                    @if ($item->qty == 'MTR')
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="MTR" required checked>
                      <label class="form-check-label" for="gridRadios1">
                        MTR
                      </label>
                    </div>
                    @else
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="MTR" required>
                      <label class="form-check-label" for="gridRadios1">
                        MTR
                      </label>
                    </div>
                    @endif
                  </div>    
              </div>  
          </div>
          

          <div class="form-group">
              <label for="exampleFormControlInput1">Isi</label>
              <input type="text" class="form-control" placeholder="Masukan jumlah isi barang"
              name="isi" value="{{$item->isi}}">
            </div>

            <hr>
<h3>Harga Barang</h3>
              
<div class="form-group">
  <label for="exampleFormControlInput1">Harga Pokok</label>
  <input type="text" class="form-control" id="harga_barang_edit" placeholder="Masukan harga pokok"
  name="harga_barang" value="{{$item->harga_barang}}" required>
</div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Harga Grosir 1</label>
                <input type="text" class="form-control" id="grosir_1_edit" placeholder="Masukan harga barang"
                name="grosir_1" value="{{$item->grosir_1}}" required>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Harga Grosir 2</label>
                <input type="text" class="form-control" id="grosir_2_edit" placeholder="Masukan harga barang"
                name="grosir_2" value="{{$item->grosir_2}}" required>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Harga Grosir 3</label>
                <input type="text" class="form-control" id="grosir_3_edit" placeholder="Masukan harga barang"
                name="grosir_3" value="{{$item->grosir_3}}" required>
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

@foreach ($db as $item)
<form action="{{url('hapus-barang/'. $item->id)}}" method="POST">
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
           <p>Apakah anda yakin ingin menghapus data barang <b>{{$item->kategori_barang}} - {{$item->nama_barang}}</b>?</p>
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

@section('js')

<script type="text/javascript">
  
  var harga_barang = document.getElementById('harga_barang');
    harga_barang.addEventListener('keyup', function(e)
    {
        harga_barang.value = formatRupiah(this.value, 'Rp. ');
    });
    var grosir_1 = document.getElementById('grosir_1');
    grosir_1.addEventListener('keyup', function(e)
    {
        grosir_1.value = formatRupiah(this.value, 'Rp. ');
    });
    var grosir_2 = document.getElementById('grosir_2');
    grosir_2.addEventListener('keyup', function(e)
    {
        grosir_2.value = formatRupiah(this.value, 'Rp. ');
    });
    var grosir_3 = document.getElementById('grosir_3');
    grosir_3.addEventListener('keyup', function(e)
    {
        grosir_3.value = formatRupiah(this.value, 'Rp. ');
    });
    var harga_barang_edit = document.getElementById('harga_barang_edit');
    harga_barang_edit.addEventListener('keyup', function(e)
    {
        harga_barang_edit.value = formatRupiah(this.value, 'Rp. ');
    });
    var grosir_1_edit = document.getElementById('grosir_1_edit');
    grosir_1_edit.addEventListener('keyup', function(e)
    {
        grosir_1_edit.value = formatRupiah(this.value, 'Rp. ');
    });
    var grosir_2_edit = document.getElementById('grosir_2_edit');
    grosir_2_edit.addEventListener('keyup', function(e)
    {
        grosir_2_edit.value = formatRupiah(this.value, 'Rp. ');
    });
    var grosir_3_edit = document.getElementById('grosir_3_edit');
    grosir_3_edit.addEventListener('keyup', function(e)
    {
        grosir_3_edit.value = formatRupiah(this.value, 'Rp. ');
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