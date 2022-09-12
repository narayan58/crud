<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Todays Attendance</title>
        <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Today {{ $now }}</h2>
                    </div>
                    <div class="pull-left mb-2">
                        <a class="btn btn-success" href="{{ route('home') }}"> Back</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <form method="POST" action="{{ route('attendanceFinalPost') }}">
                    @csrf
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($todayAttendance as $item)
                    <input type="hidden" name="attendance_id[]" value="{{ $item->id }}">
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->student->first_name }} {{ $item->student->last_name }}</td>
                        <td>{{ $item->student->email }}</td>
                        <td>{{ $item->student->phone }}</td>
                        <td>
                            <div class="form-group">
                                <select class=" form-select form-select-lg mb-3" name="status[]" aria-label=".form-select-sm example" required>
                                    <option selected value="">Please select</option>
                                    <option value="1" @if($item->status=='1') selected @endif>Present</option>
                                    <option value="0" @if($item->status=='0') selected @endif>Absent</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary ml-3 float-right mb-4">Attendance</button>
            </form>
            <br>
        </div>
    </body>
</html>