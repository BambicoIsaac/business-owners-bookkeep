<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>BOB</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-dark">    
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent text-light">
        <div class="container-fluid">
            @guest
            <a class="navbar-brand" href="{{URL::route('home')}}">B O B</a>
            @else
            <a class="navbar-brand" href="{{URL::route('dashboard')}}">B O B</a>
            @endguest
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::route('sales.viewAll') }}">Sales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::route('expenses.viewAll') }}">Expenses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::route('reports.viewAll') }}">Generate Report</a>
                        </li>
                </ul>
                        <a class="btn btn-outline-danger" type="submit" href=" {{URL::route('logout')}} ">Log-Out</a>
                    @endguest         
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>