<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun Anda</title>
</head>
<body>
    <p> 
        Halo <b> {{$details['nama']}}</b>!
    </p>
    <br>
    <p>
        Berikut ini adalah data anda :
    </p>
    <table>
        <tr>
            <td>Fullname</td>
            <td>:</td>
            <td>{{$details['nama']}}</td>
        </tr>
        <tr>
            <td>Role</td>
            <td>:</td>
            <td>{{$details['role']}}</td>
        </tr>
        <tr>
            <td>Website</td>
            <td>:</td>
            <td>{{$details['website']}}</td>
        </tr>
        <tr>
            <td>Tanggal Registrasi</td>
            <td>:</td>
            <td>{{$details['datetime']}}</td>
        </tr>
        <br><br><br>
        <center>
            <h3>Klik dibawah ini untuk Verifikasi akun anda</h3>
            <a href="{{ $details['url']}}" style="text-decoration: none;color: rgb(225,225,225);padding: 9px;background-color: blue;font: bold;border-radius: 20%;"> Verifikasi</a>
            <br><br><br>
            <p>
                Copyright @ 2023| Ficky Sandika
            </p>
        </center>
</body>
</html>