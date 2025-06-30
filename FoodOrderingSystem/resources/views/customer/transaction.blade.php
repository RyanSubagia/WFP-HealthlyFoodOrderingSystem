@extends('layouts.main')

@section('title')
    Riwayat Pesanan
@endsection

@section('container')

    <section class="about-hero position-relative">
        <div class="container-fluid p-0">
            <div class="hero-overlay d-flex align-items-center justify-content-center text-center"
                 style="background-image: url('{{ asset('img/illustration/background_about.png') }}'); background-size: cover; background-position: center; height: 400px; position: relative;">
                <div style="background-color: rgba(0,0,0,0.5); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
                <div class="position-relative" style="z-index: 2;">
                    <h1 class="display-4 fw-bold text-white mb-2">Riwayat Pesanan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered align-middle bg-white">
                    <thead class="table-light">
                        <tr>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Metode</th>
                            <th>No Meja</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-table-body">
                        <tr><td colspan="5" class="text-center">Memuat data...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- jQuery for polling -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function fetchTransactions() {
            $.ajax({
                url: "{{ route('customer.cart.history.json') }}",
                method: "GET",
                success: function (data) {
                    let html = '';
                    if (data.length === 0) {
                        html += `<tr><td colspan="5" class="text-center">Belum ada pesanan.</td></tr>`;
                    } else {
                        data.forEach(item => {
                            html += `
                                <tr>
                                    <td>${item.tgl_Pemesanan}</td>
                                    <td>Rp ${item.total}</td>
                                    <td>${item.metode_Pemesanan}</td>
                                    <td>${item.no_meja}</td>
                                    <td><span class="badge bg-${item.badge}">${item.status}</span></td>
                                </tr>
                            `;
                        });
                    }
                    $('#transaction-table-body').html(html);
                },
                error: function () {
                    $('#transaction-table-body').html('<tr><td colspan="5" class="text-danger text-center">Gagal mengambil data.</td></tr>');
                }
            });
        }

        $(document).ready(function () {
            fetchTransactions();
            setInterval(fetchTransactions, 10000); // refresh every 10 seconds
        });
    </script>
@endsection
