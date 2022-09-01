<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>News Details</title>
        <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>News Details</h2>
                    </div>
                    <div class="pull-left mb-2">
                        <a class="btn btn-success" href="{{ route('home') }}"> Dashboard</a>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('news.create') }}"> Create News</a>
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Added By</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($news as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{!! $item->description !!}</td>
                        <td><img src="{{ asset('image/news/'.$item->image) }}" style="height: 100px; width:100px;"></td>
                        <td>
                            @if($item->status==1)
                            Active
                            @else
                            Inactive
                            @endif
                        </td>
                        <td>{{ $item->user->name }}</td>
                        <td>
{{--                             <a class="btn btn-success" href="{{ route('news.show',$item->id) }}">Show</a>
 --}}                            <a class="btn btn-primary" href="{{ route('news.edit',$item->id) }}">Edit</a>
                            <form action="{{ route('news.destroy',$item->id) }}" method="Post">
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