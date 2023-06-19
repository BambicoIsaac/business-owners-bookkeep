<!DOCTYPE html>
<html>
<head>
    <title>BOB - SALES</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align: center">{{ $title }}</h1>
    <p style="text-align: center">Listed are all the Sales made by your business.</p>
  
    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Amount</th>
        </tr>
        @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->date }}</td>
            <td>{{ $sale->description }}</td>
            <td>{{ $sale->amount }}</td>
        </tr>
        @endforeach
    </table>  
</body>
</html>