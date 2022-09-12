<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ $student->first_name }}'s Attendance Details</title>
        <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{ $student->first_name }}'s Attendance Details</h2>
                    </div>
                    <div class="pull-left mb-2">
                        <a class="btn btn-success" href="{{ route('students.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($attendances as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->date }}</td>
                        <td>
                            @if($item->status==1)
                            Present
                            @else
                            Absent
                            @endif
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>