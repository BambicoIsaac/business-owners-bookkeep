<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>BOB | EXPENSES</title>

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
    <h1 class="text-light" style="text-align: center;">Expenses</h1>
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
        <form method="GET" action="{{URL::route('expenses.filter')}}">
            <div class="row pb-3">                                
                <div class="col md-1 pt-4"></div>   
                <div class="col md-2 pt-4">
                    <a class="btn btn-success" href="{{URL::route('expenses.create')}}">Record Expense</a>
                </div>     
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
                    <a class="btn btn-danger" href="{{URL::route('expenses.clearFilter')}}">Clear Filter</a>
                </div>                
                <div class="col-md-1 pt-4">
                    <a class="btn btn-warning text-light" href="{{URL::route('expenses.pdf')}}">Download PDF (All)</a>
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


    <table id="example" class="table table-striped table-bordered bg-transparent text-light">
        <thead>
            <tr>
            <th scope="col">Date</th>
            <th scope="col">Description</th>
            <th scope="col">Amount</th>
            <th scope="col">Functions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                    <tr>
                    <td>{{ $expense -> date }}</td>
                    <td>{{ $expense -> description }}</td>
                    <td>{{ $expense -> amount}}</td>
                    <td>                
                        <a class="btn btn-success" href="{{URL::route('expenses.update', $expense->id)}}">
                            Update
                        </a>

                        <a class="btn btn-danger "href="{{URL::route('expenses.delete', $expense->id)}}">
                            Delete
                        </a>
                    </td>
                    </tr>
            @endforeach     

        </tbody>
    </table>
</body>
</html>