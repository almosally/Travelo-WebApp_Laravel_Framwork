<!DOCTYPE html>
<html>
<head>
    <title>TRAVELO USERS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
    </style>
</head>
<body>
<br />
<div class="container">
    <a href="/adminpanel" class="btn btn-success">back to admin panel</a>
    <h1 align="center">Travelo users </h1><br />
    <div align="center">
        <a href="{{ route('export_excel.excel') }}" class="btn btn-success">Export to Excel</a>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <td>id</td>
                <td>name</td>
                <td>email</td>
                <td>admin</td>
            </tr>
            @foreach($customer_data as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->admin }}</td>
                </tr>
            @endforeach
        </table>
    </div>

</div>
</body>
</html>