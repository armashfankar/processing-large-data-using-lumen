<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Processing</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-sm-2 mx-auto">
                <form action="" method="post">
                    <button class="btn btn-md btn-primary btn-block" type="submit">Load Pincode Data</button>
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
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
                <br>
                {{ $addresses->links() }}
            </div>
        </div>
    </div>
</body>

</html>