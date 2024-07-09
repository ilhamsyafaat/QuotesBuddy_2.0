<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> --}}
    <style>
        .form-section {
            display: none;
        }

        .form-section.current {
            display: inline;
        }

        .parsley-errors-list {
            color: red;
        }
    </style>
</head>

<body>
    <div class="flex h-screen" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('user.component.sidebar')
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div class="flex flex-col flex-1 w-full">
            @include('user.component.header')
            <main class="h-full bg-[#C4D8EF] overflow-y-auto">

                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header alert alert-success">
                                    Invoice Pembayaran Anda
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Detail Kerusakan</th>
                                            <td>:</td>
                                            <td>{{ $data->detail_transaksi }}</td>
                                        </tr>

                                        <tr class="text-success">
                                            <th>Jumlah Pembayaran</th>
                                            <td>:</td>
                                            <td><button class="btn btn-sm btn-success">Rp.{{ $data->harga }},-</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>

                                        </tr>


                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header alert alert-primary">
                                    Informasi Pembayaran
                                </div>
                                <div class="card-body">
                                    <p class="text-success mb-3">Silahkan melakukan pembayaran melalui nomor rekening di
                                        bawah ini :</p>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Bank Mandiri 1212423344</li>
                                        <li class="list-group-item">Bank BCA 645623534</li>
                                        <li class="list-group-item">Bank BNI 56435645</li>
                                    </ul>

                                    @if ($data->status_pembayaran == '0')
                                        <button style="width: 100%;"  class="btn btn-sm btn-danger mt-3"
                                            data-toggle="modal" data-target="#exampleModal">
                                            Upload Bukti Pembayaran
                                        </button>
                                    @elseif($data->status_pembayaran == '1')
                                        <button style="width: 100%;" class="btn btn-sm btn-warning mt-3"><i
                                                class="fa-regular fa-clock"></i>
                                            Menunggu Konfirmasi</button>
                                    @elseif($data->status_pembayaran == '2')
                                        <button style="width: 100%;" class="btn btn-sm btn-success mt-3"><i
                                                class="fa-solid fa-check"></i>
                                            Pembayaran Selesai</button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload bukti pembayaran anda</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="validasi" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Upload Bukti Pembayaran</label>
                                        <input type="file"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            name="foto_pembayaran">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-success bg-green-700">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
