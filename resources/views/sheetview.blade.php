<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rudra Task</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="card shadow mt-4 mb-4">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-8">
                            <h5>Preview Data From Google Sheet</h5><br>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{url('genrate-report')}}" class="btn btn-dark">Export Data</a>
                        </div>
                        <div class="col-12">
                            <table class="table">
                                @foreach($sheet_array->values as $r1)
                                <tr>
                                    <td class="font-weight-bold">{{$loop->iteration}} .</td>
                                    <td>{{$r1[0]}}</td>
                                    <td>{{$r1[1]}}</td>
                                    <td>{{$r1[2]}}</td>
                                    <td>{{$r1[3]}}</td>
                                    <td>{{$r1[4]}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>