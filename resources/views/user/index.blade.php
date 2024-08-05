<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fontawesoeme link -->
    <script src="https://kit.fontawesome.com/9fde51f1b8.js" crossorigin="anonymous"></script>

    <!-- bootstrap -->


    <!-- css link here -->
    <link href="{{ asset('css/style3.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">



    <title>MyJacket.id</title>
</head>

<body>

    <header class="header">

        <div class="logo">
            <h1><i class="fa-solid fa-vest"></i>MY<span>Jacket.id</span></h1>
        </div>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#shop">Shop</a>
            <a href="#contact">Contact</a>
        </nav>

        <div class="icons">
            <div id="menu-bar" class="fas fa-bars"></div>
            <?php

            use Illuminate\Support\Facades\Auth;

            $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if (!empty($pesanan_utama)) {

                $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
            }
            ?>


            <div id="cart"><a href="{{url('check-out')}}">
                    <i class="fa fa-shopping-cart"></i>
                    @if(!empty($notif))
                    <span class="badge badge-primary">{{ $notif }}</span>
                    @endif
                </a>
            </div>
            <div class="Login">
                <a href="{{route('logout')}}" class="btn1">LOGOUT</a>
            </div>
        </div>



    </header>


    <div class="home" id="home">
        <div class="main-home">
            <div class="inner-home">
                <div class="content-home">
                    <h1>WELCOME TO FASHION SALE<br> </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="our-menu-item" id="shop">
        <div class="heading-menu">
            <h1>EXPLORE OUR JACKET</h1>
        </div>

        <div class="main-menu">
            @foreach($posts as $post)
            <div class="inner-menu">
                <div class="menu-content">
                    <div class="image-overlay"></div>
                    <h4>{{$post->title}}</h4>
                    <img src="{{asset('storage/posts/'.$post->image)}}" alt="">
                    <div class="detail">
                        <h4>Rp. {{number_format($post->harga)}}</h4>
                        <div class="menu-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
                <a href="{{url('pesan')}}/{{$post->id }}" class="btn2"><i class="fa fa-shopping-cart"></i> PESAN</a>
            </div>
            @endforeach
        </div>
    </div>

    </div>

    <div class="chose-us">
        <div class="chose-headings">
            <h4>Reason</h4>
            <h1>Why Choose Us</h1>
        </div>

        <div class="main-chose">
            <div class="inner-chose">
                <img src="{{asset('img/ori.png')}}" width="150">
                <div class="chose-content">
                    <h2>100% ORIGINAL PRODUCT</h2>
                    <p>Produk kami 100% orisinal, memberikan kualitas yang tak terbantahkan untuk kepuasan Anda.</p>
                </div>
            </div>

            <div class="inner-chose">
                <img src="{{asset('img/kirim.png')}}" width="200">
                <div class="chose-content">
                    <h2>KIRIM KEMANA SAJA</h2>
                    <p>Dari ujung Sabang hingga ke ujung Merauke, kami siap mengantarkan layanan berkualitas tak terhingga kepada Anda.</p>
                </div>
            </div>

            <div class="inner-chose">
                <img src="{{asset('img/uang.png')}}" width="150">
                <div class="chose-content">
                    <h2>HARGA TERJANGKAU</h2>
                    <p>Dengan harga yang lebih terjangkau, kami hadir untuk memberikan pengalaman tak tertandingi dalam setiap langkah.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="footer-col">
                <h3>Download App</h3>
                <p>Download App for Android and Ios Mobile Phone</p>
                <div class="app-logo">
                    <img src="{{ asset('img/app-logo 1.png')}}" alt="">
                    <img src="{{ asset('img/app-logo 2.png')}}" alt="">
                </div>
            </div>
            <div class="footer-col">
                <img src="{{asset('img/logo.PNG')}}" alt="">
                <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Digital Technology of the Many</p>
            </div>
            <div id="contact" class="footer-col">
                <h3>Contact US</h3>
                <ul>
                    <li><a href="">Facebook</a></li>
                    <li><a href="">WhatsApp</a></li>
                    <li><a href="">Instagram</a></li>
                    <li><a href="">Youtuube</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright 2023 - MyJacket.id</p>
    </div>









    <script src="{{asset('js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>