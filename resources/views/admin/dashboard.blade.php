@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $jumlah_produk }}</h3>
                    <p>Jumlah Produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('produk.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $jumlah_pengguna }}</h3>
                    <p>Jumlah Pengguna</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jumlah_transaksiproduk }}</h3>
                    <p>Transaksi Produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('transaksi.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $jumlah_transaksicostum }}</h3>
                    <p>Transaksi Costum Design</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('transaksiCustom.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3>Data Penjualan Pie Chart</h3>
                    <canvas id="chartPiePenjualan" style="height: 20vw; width:auto;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3>Data Penjualan Bar Chart</h3>
                    <canvas id="chartBarPenjualan" style="height: 20vw; width:auto;"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk Pie Chart
        var ctxPie = document.getElementById('chartPiePenjualan').getContext('2d');
        var chartPiePenjualan = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Produk 1', 'Produk 2', 'Produk 3'],
                datasets: [{
                    data: [700, 500, 300],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        // Data untuk Bar Chart
        var ctxBar = document.getElementById('chartBarPenjualan').getContext('2d');
        var chartBarPenjualan = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Penjualan',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(60,141,188,0.9)',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
@endsection
