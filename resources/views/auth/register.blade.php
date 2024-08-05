<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi</title>
    <link rel="icon" href="{{ asset('img/mocku1.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Buat Akun!</h2>
        <form method="POST" action="{{ route('registrasi')}}">
            @csrf
            <span class="login100-form-title p-b-43">
            </span>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $item)
                    <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <ul>
                    <li>{{Session::get('success')}}</li>
                </ul>
            </div>
            @endif
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="name" name="fullname" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name= "email" placeholder="Masukkan Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" class="btn btn-primary col-12">Daftar</button>
            <div class="text-center p-t-46 p-b-20">
                <span class="txt2">
                    Sudah Punya Akun? <a href="{{ route('auth')}}" class="text-primary">Login</a>
                </span>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
