<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fontawesoeme link -->
    <script src="https://kit.fontawesome.com/9fde51f1b8.js" crossorigin="anonymous"></script>

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
            <div id="cart"><a href="{{ url('check-out')}}"><i class="fas fa-shopping-cart"></i></a></div>
            <div class="Login">
                <a href="{{route('auth')}}" class="btn1">LOGIN</a>
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
                <a href="{{url('pesan')}}/{{$post->id }}" class="btn2"><i class="fa fa-shopping-cart"></i>PESAN</a>
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

    <button id="myBtn" hidden>Open Modal</button>


    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content" style="background-color:#b31d1c">
            <!-- <div class="modal-header">
    <span class="close">&times;</span>
    <h2>Modal Header</h2>
  </div> -->
            <span class="close">
                <font style="float:right;font-size:18px; color:#fff">Klik dimana saja untuk menutup x</font>
            </span>
            <div class="modal-body">
                <a href="#">
                    <img src="{{ asset('img/1.jpeg')}}" style="width:100%;" />
                </a>
            </div>
            <!-- <div class="modal-footer">
    <h3>Modal Footer</h3>
  </div> -->
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>



    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>