<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOB | Initialization</title>
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    @include('navbar');

    <main class="login-form">
        <div class="bg-dark text-secondary px-4 py-5 text-center">            
            <div class="py-5">
                <h1 class="display-5 fw-bold text-white">Register</h1>
                <br><br>  
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
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
                    <br><br>
                    <div class="form-group">
                        <label for="name" class="text-light">Name:</label>
                        <input type="text" id="name" name="name" maxlength="59" size="59" required autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="email_address" class="text-light">E-Mail Address:</label>
                        <input type="text" id="email_address" name="email" maxlength="50" size="50" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="password" class="text-light">Password:</label>
                        <input type="password" id="password" name="password" maxlength="55" size="55" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>      
                    <br><br>
                    <div>
                        <button type="submit" class="btn btn-outline-success">
                            I N I T I A L I Z E
                        </button>
                    </div>          
                </form>  
            </div>
        </div>        
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>