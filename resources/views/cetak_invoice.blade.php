<!DOCTYPE html>
<html lange="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrd-token" content="{{ csrf_token() }}">
        <style>
            
            table {
                position: relative;
                border-collapse: collapse;
               
            }
            thead {
                border-bottom: 1px; 
                
            }
            tbody {
                font-family: Arial, sans-serif;
            margin: 20px; 
            }
            tfoot {
                border-top: 1px;
            }
            h1{
                font-size: 12px;
            }
            th {
                padding: 3px;
                font-size: 10px;
                border-left: none;
                border-right: none;
            }

            td {
                padding: 4px;
                font-size: 10px;
                border: none;
            }
            .text-left {
                text-align: left !important;
            }

            .text-right {
            text-align: right !important;
            }

            .text-center {
            text-align: center !important;
            }
            
            .header {
                max-width: 80%;
                text-align: center;
            }

            .col-sm-auto {
                flex: 0 0 auto;
                width: auto;
                max-width: 100%;
            }
            .col-sm-1 {
                flex: 0 0 8.33333%;
                max-width: 8.33333%;
            }
            .col-sm-2 {
                flex: 0 0 16.66667%;
                max-width: 16.66667%;
            }
            .col-sm-3 {
                flex: 0 0 25%;
                max-width: 25%;
            }
            .col-sm-4 {
                flex: 0 0 33.33333%;
                max-width: 33.33333%;
            }
            .col-sm-5 {
                flex: 0 0 41.66667%;
                max-width: 41.66667%;
            }
            .col-sm-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
            .col-sm-7 {
                flex: 0 0 58.33333%;
                max-width: 58.33333%;
            }
            .col-sm-8 {
                flex: 0 0 66.66667%;
                max-width: 66.66667%;
            }
            .col-sm-9 {
                flex: 0 0 75%;
                max-width: 75%;
            }
            .col-sm-10 {
                flex: 0 0 83.33333%;
                max-width: 83.33333%;
            }
            .col-sm-11 {
                flex: 0 0 91.66667%;
                max-width: 91.66667%;
            }
            .col-sm-12 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .col-sm {
                flex-basis: 0;
                flex-grow: 1;
                max-width: 100%;
            }

            .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
            .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
            .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
            .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
            .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
            .col-xl-auto {
            position: relative;
            width: 100%;
            padding-right: 0.75rem;
            padding-left: 0.75rem;
            }

            .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -0.75rem;
            margin-left: -0.75rem;
            }

            .col {
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%;
            }



.center {
    text-align: center; /* Pusatkan teks di dalam elemen */
    background: #ffffff;
    padding: 3px;

  
}
            p {
  margin-top: 0;
  margin-bottom: 0.3rem;
  font-size: 10px;
}

.pt-3,
.py-3 {
  padding-top: 1rem !important;
}

.pt-2,
.py-2 {
  padding-top: 0.5rem !important;
}

.pl-2 {
    padding-left: 2rem !important;
}
hr {
    border: none;
}
        </style>





        <br>
        <title class="mt-3">Faktur Penjualan</title>
        

</head>

<body>
<div class="center">
    <header>
        
        <div class="row">
            <div class="col-sm-12 text-left pl-2">
                <h1>FAKTUR PENJUALAN</h1>
            </div>
            <div class="col-sm-12 text-left pl-2">
                <p>Nama Pelanggan : {{$faktur->data_pelanggan->nama_pelanggan}}</p>
                <p>No Faktur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                    {{$faktur->no_faktur}}
                </p>
                <p>Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;: 
                    {{date("d/M/Y", strtotime($faktur->tanggal));}}</p>
                <p>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;: 
                    {{$faktur->data_pelanggan->alamat}}</p>
            </div>
           
           
        </div>
   
</header>


    
   <br>
    <table rules="all" style="width: 100%;">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">QTY</th>
                <th class="text-center">Isi</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Harga Barang</th>
                <th class="text-center">Disc</th>
                <th class="text-center">Pot</th>
                <th class="text-center">Subtotal</th>
                {{-- <th class="text-center">Laba</th> --}}
             
            </tr>
        </thead>
        
                        <tbody>
                            @foreach ($invoice as $no=>$p)
                    @php
                       $y = $p->harga_grosir * $p->jumlah + $p->ongkos_toko;
                                
                                $t = (($p->harga_grosir * $p->jumlah) * $p->disc) / 100;
                                $ya = $y - $t;
                                $pp += $ya;
                    @endphp
                             
                <tr>
                    <td class="text-center">{{$no+1}}</td>
                    <td class="text-center">{{$p->data_barang->qty}}</td>
                    <td class="text-center">{{$p->data_barang->isi}}</td>
                    <td class="text-center">{{$p->jumlah}}</td>
                    <td class="text-left">{{$p->nama_barang}}</td>
                    <td class="text-right">Rp. {{ number_format($p->harga_grosir ,0, ',', '.') }}</td>
                    
                                  
                    
                        @if ($p->disc == null)
                        <td class="text-center"></td>    
                        @else
                        <td class="text-center">{{$p->disc}}%</td>
                        @endif
                        
                    
                        @if ($t == 0)
                        <td class="text-center"></td>
                        @else
                        <td class="text-right">Rp. {{ number_format($t, 0, ',', '.') }}</td>
                        @endif
                        
                    
                    <td class="text-right">Rp. {{ number_format($ya ,0, ',', '.') }}</td>
                
            
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="8" class="text-center">Total</th>
                
                <th class="text-right">Rp. {{ number_format($pp ,0, ',', '.') }}</th>
             
            </tr>
        </tfoot>
        
    </table>
</body>
<hr>
<hr>
<footer>
    <div class="row">
        <div class="col-sm-4">
            <p>Pengirim</p>
            <hr>
            <hr>
            <hr>
            <hr>
            <p>(FEBY ELEKTRIK)</p>
        </div>
    <div class="col-sm-4">
        <p>Penerima</p>
        <hr>
        <hr>
        <hr>
        <hr>
        <p>({{$faktur->data_pelanggan->nama_pelanggan}})</p>
    </div>
    </div>
</footer>
<script type="text/javascript">
    window.print();
</script>
</div>
</html>