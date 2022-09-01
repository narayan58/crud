<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Show - Company Details</title>
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Show Company</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('companies.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        {{ $company->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Email:</strong>
                       {{ $company->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Address:</strong>
                        {{$company->address}}
                    </div>
                </div>
            </div>
    </div>
</body>

</html>