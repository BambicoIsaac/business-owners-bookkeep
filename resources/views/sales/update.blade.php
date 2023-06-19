<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>BOB | Update Sale Record</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-dark">    
    @include('navbar');
    <h1 class="text-light" style="text-align: center;">Sales Record - Update</h1>
    <br><br>

    <form name="add-sale-post-form" id="add-sale-post-form" method="post" action="{{URL::route('sales.storeUpdate', $sale -> id)}}">
       @csrf
        <div class="form-group text-light">
          <label for="category">Category</label>
          <input type="text" id="category" name="category" class="form-control" value="Sales" placeholder="Sales" disabled>
        </div>
        <br><br>
        <div class="form-group text-light">
          <label for="date">Date</label>
          <input type="date" id="date" name="date" class="form-control" required placeholder="Select the date for the record." value="{{ $sale->date }}">
        </div>
        <br><br>
        <div class="form-group text-light">
          <label for="exampleInputEmail1">Amount</label>
          <input type="number" id="amount" name="amount" class="form-control" step="any" required placeholder="Input amount here." value="{{ $sale->amount }}"/>
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary">Update Sale Record</button>
      </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>