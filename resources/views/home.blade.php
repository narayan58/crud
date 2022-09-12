@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <ul>
                        <li>
                            <a href="{{ route('companies.index') }}">Companies Details</a>
                        </li>
                        <li>
                            <a href="{{ route('news.index') }}">News Details</a>
                        </li>
                        <li>
                            <a href="{{ route('students.index') }}">Student Details</a>
                        </li>
                        <li>
                            <a href="{{ route('attendance.list') }}">Attendance List</a>
                        </li>
                    </ul>
                    <form action="{{ route('attendance.post') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                        Today's Attendance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection