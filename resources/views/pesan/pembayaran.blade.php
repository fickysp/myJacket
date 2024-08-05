<!DOCTYPE html>
<html lang="en">
<style>
        /* Contoh styling untuk tombol */
        .btn {
            background-color: #4CAF50; /* Warna latar belakang */
            color: white; /* Warna teks */
            padding: 10px 20px; /* Padding di dalam tombol */
            border: none; /* Hapus border */
            border-radius: 5px; /* Agar tombol memiliki sudut bulat */
            text-align: center; /* Teks berada di tengah */
            text-decoration: none; /* Hapus underline */
            display: inline-block; /* Agar tombol berada dalam satu baris */
            font-size: 16px; /* Ukuran teks */
            cursor: pointer; /* Ubah kursor saat diarahkan ke tombol */
        }
        
        /* Hover styling (saat kursor diarahkan ke tombol) */
        .btn:hover {
            background-color: #45a049; /* Warna latar belakang saat hover */
        }
    </style>
</head>

<body>

    <button onclick="sweetd()" type="submit" class="btn" id="pay-button">Konfirmasi Pembayaran</button>
    @foreach($pesanan as $pesan)
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
     <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{$pesan->snap_token}}', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
    @endforeach
</body>
</html>

