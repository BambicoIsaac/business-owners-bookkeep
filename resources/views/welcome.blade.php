<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>BOB | Welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="bg-dark text-secondary px-4 py-5 text-center">
            <div class="py-5">
                @if (session('success'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('failure'))
                    <div class="alert alert-success" role="alert">
                        {{ session('failure') }}
                    </div>
                @endif
                <h1 class="display-5 fw-bold text-white">Welcome to</h1>
                <h1 class="display-5 fw-bold text-white">B O B</h1>
                <p class="fs-5 mb-4">The Business Owner's Bookkeeping App.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a class="btn btn-outline-success btn-lg px-4 me-sm-3 fw-bold" href="{{ route('authenticate') }}">S T A R T</a>
                </div>
            </div>
        </div>   
    </div> 
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>