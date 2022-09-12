<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Student</title>
        <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Add Student</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>First Name:</strong>
                            <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" placeholder="First Name">
                            @error('first_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" placeholder="Last Name">
                            @error('last_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            <input type="number" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Phone">
                            @error('phone')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Address">
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>DOB:</strong>
                            <input type="date" name="dob" value="{{old('dob')}}" class="form-control" placeholder="DOB">
                            @error('dob')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="image" value="{{old('image')}}" class="form-control" placeholder="Image">
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gender:</strong>
                            <select class="form-select form-select-lg mb-3" name="gender" aria-label=".form-select-sm example">
                                <option selected value="">Please select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <strong>Status:</strong>
                            <select class="form-select form-select-lg mb-3" name="status" aria-label=".form-select-sm example">
                                <option selected value="">Please select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>


                        </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </form>
                        <br>
        </div>
    </body>
</html>