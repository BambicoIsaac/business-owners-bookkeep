<!DOCTYPE html>
<html>
<head>
    <title>BOB - SUMMARY REPORT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align: center">{{ $title }}</h1>
    <p style="text-align: center">Listed are all the sales and expenses made by your business.</p>
  
    <table class="table-sm table-bordered">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col">Description</th>
            <th scope="col">Sale</th>
            <th scope="col">Expense</th>
            <th scope="col">Profit</th>
            </tr>
        </thead>
        <tbody>
            @php
                $profit = (float)0;
                $totalSales = (float)0;
                $totalExpenses = (float)0;
                $profitString = "";
                $saleString = "";
                $expenseString = "";
            @endphp
            @foreach ($reports as $report)
                    <tr>
                    <td>{{ $report -> id }}</td> 
                    <td>{{ $report -> date }}</td>
                    <td>{{ $report -> description }}</td>
                    @if ($report -> category == "Sales")
                        <td>{{ $report -> amount}}</td>
                        <td></td>
                        @php
                            echo $profit;
                            echo $report -> amount;
                            $profit = $profit + ($report -> amount);
                            $totalSales = $totalSales + ($report -> amount);
                            $profitString = number_format( $profit, 2, '.', '' );
                        @endphp
                    @endif
                    @if ($report -> category == "Expenses")
                        <td></td>
                        <td>{{ $report -> amount}}</td>
                        @php
                            $profit = floatval($profit) - floatval($report->amount);
                            $totalExpenses = $totalExpenses + ($report -> amount);
                            $profitString = number_format( $profit, 2, '.', '' );
                        @endphp
                    @endif
                    <td>{{$profitString}}</td>
                    </tr>
            @endforeach
            @php                
                $saleString = number_format( $totalSales, 2, '.', '' );
                $expenseString = number_format( $totalExpenses, 2, '.', '' );
            @endphp
            <tr>
                <td>Totals: </td>
                <td></td>
                <td></td>
                <td>Total Sales: {{$saleString}}</td>
                <td>Total Expenses: {{$expenseString}}</td>
                <td>Total Profit: {{$profitString}}</td>
            </tr>
        </tbody>
    </table>
  
</body>
</html>