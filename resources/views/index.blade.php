<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All India Pincode Data</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-sm-2 mx-auto text-center">
                <h3 class="text-muted">All India Pincode Data</h3>
                <!-- Form starts -->
                <form action="" method="post">
                    <button class="btn btn-md btn-primary btn-block" type="submit">Load Pincode Data</button>
                    
                </form>
                <!-- Form ends -->
            </div>
        </div>
        <p class="text-muted text-center"><span class="text-danger">Important Note:</span> Queue worker should be running in order to load csv's data.</p>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <!-- Table to show data starts  -->
                <table class="table table-bordered">
                    <tr>
                        <td>officename</td>
                        <td>pincode</td>
                        <td>officeType</td>
                        <td>Deliverystatus</td>
                        <td>divisionname</td>
                        <td>regionname</td>
                        <td>circlename</td>
                        <td>Taluk</td>
                        <td>Districtname</td>
                        <td>statename</td>

                    </tr>
                    @foreach($addresses as $address)
                    <tr>
                        <td>{{$address->officename}}</td>
                        <td>{{$address->pincode}}</td>
                        <td>{{$address->officeType}}</td>
                        <td>{{$address->Deliverystatus}}</td>
                        <td>{{$address->divisionname}}</td>
                        <td>{{$address->regionname}}</td>
                        <td>{{$address->circlename}}</td>
                        <td>{{$address->Taluk}}</td>
                        <td>{{$address->Districtname}}</td>
                        <td>{{$address->statename}}</td>
                    </tr>
                    @endforeach
                </table>
                <!-- Table to show data ends  -->
                <br>
                <!-- Paginate records starts -->
                <div class="row">
                    <div class="col-sm-2 mx-auto">
                        {{ $addresses->render("pagination::bootstrap-4") }}
                    </div>
                </div>
                <!-- Paginate records ends -->
            </div>
        </div>
    </div>
</body>
</html>