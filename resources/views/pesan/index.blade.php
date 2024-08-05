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
    </header>

    <div class="container">
        <div class="row">
        <div class="col-md-12">
                <div class="back">
                    <a href="{{url('user')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$posts->title}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('storage/posts/'.$posts->image)}}" width="400" alt="Gaambar Produk">
                            </div>
                            <div class="col-md-6 mt-5" style="font-size: 14px;">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>:</td>
                                            <td>{{$posts->desc}}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td> Rp. {{number_format($posts->harga)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td>{{$posts->stok}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <td>
                                                <form action="{{url('pesan')}}/{{$posts->id}}" method="post">
                                                    @csrf
                                                    <input type="text" name="jumlah_pesan" class="form-control" required>
                                                    <button onclick="sweetalert()" type="submit" class="btn btn-primary mt-3"><i class="fa fa-shopping-cart"></i>PESAN</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                text: 'Barang ditambahkan ke keranjang',
                icon: 'success',
                confirmButtonText: 'Done'
            })
        }
    </script>

</body>

</html>