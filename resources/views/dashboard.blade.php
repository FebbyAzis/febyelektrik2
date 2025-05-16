@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Pelanggan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dp}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Data Barang</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$db}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-boxes fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Faktur</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$f}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-invoice fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Penjualan</div>
                                <div class="h5 mb-0 font-weight-bold text-primary-800">{{$i}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-invoice-dollar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-8 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Pemasukan Keseluruhan</div>
                            
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($total ,0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                               
                                <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-8 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Pemasukan Hari Ini</div>
                            
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($totalss ,0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                               
                                <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-8 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Pemasukan Bulan Ini</div>
                                    
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($totalsss ,0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                
                                    <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Piutang Saat Ini</div>
                                    
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($summary_ppp_piutang ,0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                
                                    <i class="fas fa-money-bill-wave fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Utang Saat Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($summary_utang_ub ,0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                
                                    <i class="fas fa-money-bill-wave fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Total Piutang Aktif/Belum Lunas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$p}}</div>
                            </div>
                            <div class="col-auto">
                                <a href="{{url('/piutang')}}">
                                <i class="fas fa-money-bill-wave fa-2x text-red"></i><br>Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Total Utang Aktif/Belum Lunas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$u}}</div>
                            </div>
                            <div class="col-auto">
                                <a href="{{url('/utang')}}">
                                    <i class="fas fa-money-bill-wave fa-2x text-red"></i><br>Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode($tanggalList) !!};
    const data = {!! json_encode($penjualanList) !!};

    new Chart(document.getElementById('penjualanChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labels.map(date => new Date(date).toLocaleDateString('id-ID')),
            datasets: [{
                label: 'Total Penjualan (Rp)',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: { title: { display: true, text: 'Tanggal' }},
                y: { beginAtZero: true, title: { display: true, text: 'Jumlah (Rp)' }}
            }
        }
    });
</script>



@endsection