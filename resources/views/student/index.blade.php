<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Students Details</title>
        <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Students Details</h2>
                    </div>
                    <div class="pull-left mb-2">
                        <a class="btn btn-success" href="{{ route('home') }}"> Dashboard</a>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('students.create') }}"> Create Students</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th width="280px">Present Activity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($students as $item)
                    @php
                        $present = App\Models\Attendance::where('student_id',$item->id)->where('status','1')->count();
                        $absent = App\Models\Attendance::where('student_id',$item->id)->where('status','0')->count();
                    @endphp
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td><img src="{{ asset('image/student/'.$item->image) }}" style="height: 100px; width:100px;"></td>
                        <td>
                            @if($item->status==1)
                            Active
                            @else
                            Inactive
                            @endif
                        </td>
                        <td>
                          <a href="{{ route('student.attendanceDetail',$item->slug) }}">Total days:{{ $totalDays }} <br>
                            Presnt Days:{{ $present }}<br>
                            Absent Days:{{ $absent }}</a>
                        </td>
                        <td>
                     <a class="btn btn-primary" href="{{ route('students.edit',$item->id) }}">Edit</a>
                            <form action="{{ route('students.destroy',$item->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>