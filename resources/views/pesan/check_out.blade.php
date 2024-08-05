<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fontawesoeme link -->
    <script src="https://kit.fontawesome.com/9fde51f1b8.js" crossorigin="anonymous"></script>

    <!-- css link here -->
    <link href="{{ asset('css/style4.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">



    <title>MyJacket.id</title>
</head>

<body>

    <header class="header">
        <div class="logo">
            <h1><i class="fa-solid fa-vest"></i>MY<span>Jacket.id</span></h1>
        </div>

        <nav class="navbar">
            <a href="{{ url('user') }}">Home</a>
            <a href="{{ url('user')}}">Shop</a>
            <a href="{{ url('user')}}">Contact</a>
        </nav>

        <div class="icons">
            <div id="menu-bar" class="fas fa-bars"></div>
            <div id="cart"><i class="fas fa-cart-plus"></i></div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="back">
                    <a href="{{url('user')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('user')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Check Out</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                        @if(!empty($pesanan))
                        <p align="right"> Tanggal Pesan : {{ $pesanan->tanggal}}</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>    
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($pesanan_details as $pesanan_detail)
                                <tr>
                                    <td>{{ $no++}}</td>
                                    <td>{{ $pesanan_detail->post->title}}</td>
                                    <td>{{ $pesanan_detail->jumlah}} item</td>
                                    <td>Rp. {{ number_format($pesanan_detail->post->harga)}}</td>
                                    <td>Rp. {{ number_format($pesanan_detail->jumlah_harga)}}</td>
                                    <td>
                                        <form action="{{url('check-out')}}/{{ $pesanan_detail->id}}" method="post">
                                            @csrf
                                            <button onclick="sweetd()" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="right"><strong>Total Harga : </strong></td>
                                    <td><strong>Rp. {{ number_format($pesanan->jumlah_harga)}}</strong></td>
                                    <td>
                                        <a onclick="sweetalert()" href="{{ url('konfirmasi-check-out')}}" class="btn btn-success" id="pay-button"><i class="fa fa-shopping-cart pr2"></i>
                                            Check Out
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        function sweetalert() {
            Swal.fire({
                title: 'Success',
                text: 'Berhasil Checkout Barang',
                icon: 'success',
                confirmButtonText: 'Done'
            })
        }

        function sweetd(){
            Swal.fire({
                title: 'HAPUS',
                text: 'Data Berhasil Dihapus',
                icon: 'error',
                confirmButtonText: 'Done'
            })
        }
    </script>

</body>

</html>