<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Student</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('students.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>First Name:</strong>
                            <input type="text" name="first_name" value="{{ $student->first_name }}" class="form-control" placeholder="First Name">
                            @error('first_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            <input type="text" name="last_name" value="{{ $student->last_name }}" class="form-control" placeholder="Last Name">
                            @error('last_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" value="{{ $student->email }}" class="form-control" placeholder="Email">
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            <input type="number" name="phone" value="{{ $student->phone }}" class="form-control" placeholder="Phone">
                            @error('phone')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            <input type="text" name="address" value="{{ $student->address }}" class="form-control" placeholder="Address">
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>DOB:</strong>
                            <input type="date" name="dob" value="{{ $student->dob }}" class="form-control" placeholder="DOB">
                            @error('dob')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="image" value="{{old('image')}}" class="form-control" placeholder="Image">
                            <br>
                            <img src="{{ asset('image/student/'.$student->image) }}" style="height: 100px; width:100px;">
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
                                <option value="Male" @if($student->gender=='Male') selected @endif>Male</option>
                                <option value="Female" @if($student->gender=='Female') selected @endif>Female</option>
                                <option value="Other" @if($student->gender=='Other') selected @endif>Other</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <strong>Status:</strong>
                            <select class="form-select form-select-lg mb-3" name="status" aria-label=".form-select-sm example">
                                <option selected value="">Please select</option>
                                 <option value="1" @if($student->status=='1') selected @endif>Active</option>
                          <option value="0" @if($student->status=='0') selected @endif>Inactive</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>


                        </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
        </form>
    </div>
</body>
</html>