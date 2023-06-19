<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>BOB | SUMMARY REPORT</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- Bootstrap and DataTables core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <!-- Scripts for DataTables -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="{{asset('assets/js/datatable.js')}}"></script>
</head>

<body class="bg-dark">    
    @include('navbar');
    <h1 class="text-light" style="text-align: center;">Summary Report</h1>
    <br><br>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('failure'))
        <div class="alert alert-success" role="alert">
            {{ session('failure') }}
        </div>
    @endif
    <br><br>
    <div class="text-light">  
        <form method="GET" action="{{URL::route('reports.filter')}}">
            <div class="row pb-3">                                
                <div class="col md-1 pt-4"></div>   
                <div class="col md-2">
                    <label> Start Date: </label>
                    <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $start_date }}" required>
                </div>
                <div class="col md-2">
                    <label> End Date: </label>
                    <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $end_date }}" required>
                </div>
                <div class="col-md-1 pt-4">
                    <button type="submit" class="btn btn-primary" name="filter" value="filter">Filter</button>
                </div>
                <div class="col-md-1 pt-4">
                    <a class="btn btn-danger" href="{{URL::route('reports.clearFilter')}}">Clear Filter</a>
                </div>                
                <div class="col-md-1 pt-4">
                    <a class="btn btn-warning text-light" href="{{URL::route('reports.pdf')}}">Download PDF (All)</a>
                </div>      
                @if (session('failure')) 
                    <div class="col-md-1 pt-4">
                        <button type="submit" class="btn btn-info text-light" name="saveFilter" value="saveFilter">Download PDF (Filtered)</button>
                    </div>
                @endif
                <div class="col md-1 pt-4"></div>
            </div>
        </form>
        <br><br>
    </div>


    <table id="example" class="table table-striped table-bordered bg-transparent text-light" data-ordering="false">
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