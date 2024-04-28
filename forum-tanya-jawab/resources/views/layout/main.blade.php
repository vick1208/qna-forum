<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum Kita|{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        a {
            text-decoration: none;
        }

        body {
            font-size: 12px;
            font-family: sans-serif;
            color: #000;
            /* font-family: 'DM Serif Text', serif; */
        }

        .sidebar-kiri {
            background-color: white;
            position: relative;
            height: 100vh;
        }

        .main-content {
            background-color: #FBFBFB;
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 3px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            /* border-radius: 10px; */
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: grey;
            border-radius: 3px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: rgb(90, 84, 84);
        }

        #horizontal-navbar {
            margin-top: 50px;
            margin-left: 10px;
            font-size: 15px;
        }

        #horizontal-navbar a {
            color: #000;
        }

        .sidebar-kiri .footer {
            margin-left: 10px;
            position: absolute;
            bottom: 20px;
        }

        .sidebar-kanan {
            padding: 40px 15px;
        }

        .sidebar-kanan #search-input {
            border-radius: 10px;
            border: 0;
            background-color: #F7F7F7;
            width: 100%;
            padding: 7px 5px;
        }

        .sidebar-kanan .footer {
            position: absolute;
            bottom: 20px;
        }

        .main-content .container-postingan {
            width: 90%;
            margin: auto;
        }

        .text-justify {
            text-align: justify;
        }
    </style>
    @yield('css')
</head>

<body>

    <div class="container-fluid container3">
        <div class="row">
            <!-- sidebar -->
            <div class="col sidebar-kiri col-sm-2 col-md-2 pt-3 m-0 p-0 ">
                <div class=" container ms-1 px-2">
                    @include('layout.sidebar', ['bagian' => 'kiri'])
                </div>
            </div>
            <!-- main -->
            <div class="col col-md-8 main-content pt-5">
                @if(session()->has('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('sukses') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @yield('container')
            </div>
            <div class="col col-md-2 sidebar-kanan">
                @include('layout.sidebar', ['bagian' => 'kanan'])
            </div>
        </div>
    </div>

    <div id="kumpulan-script">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            feather.replace();
        </script>
    </div>
    @yield('js')
</body>

</html>