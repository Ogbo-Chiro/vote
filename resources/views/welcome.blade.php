<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ALA E-Vote</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



        <!-- Styles -->
        <style>
            html, body {
                background-color: #0A0002;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
                color: #111;
            }

            .links > a {
                color: #f5f5f5;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 700 !important;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .image img{
                height: 150px;
            }
            .vote{
                border: none;
                width: 200px;
                color: #fff !important;;
                padding:12px !important;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                border-radius: 6px;
            }
            .vote:hover{
              background-color: #8E4A49 !important;

            }
            .footer {
              background-color: rgba(10,0,2) !important;
              font-size: 15px;
            }
            .builder{
              color: #f5f5f5;
            }
          .builder:hover{
            color: #A88A8A;
            text-decoration: none;
          }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="image">
                    <img class="img-responsive" src="{{ asset('ala.png') }}">
                </div>
 
                <div class="title m-b-md">
                    <!--E-Vote-->
                </div>

                <div class="links">
                    <a class="vote" href="{{ route('home') }}">Vote now!</a><br><br>
                    <p style="color:#fff">Built for ease.</p>
                </div>
            </div>
        </div>

        <footer class="footer mt-auto py-3">
          <div class="container">
            <center>
            <p style="font-size: 15px !important; color:#fff" class="copyright-text">Copyright &copy; 2019 All Rights Reserved
            </p>
          </center>
          </div>
        </footer>

    </body>
</html>
