<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit News Form - News Details</title>
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit News</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('news.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" value="{{ $news->title }}" class="form-control"
                            placeholder="Title">
                        @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" value="{{old('image')}}" class="form-control" placeholder="Image">
                        <br>
                        <img src="{{ asset('image/news/'.$news->image) }}" style="height: 100px; width:100px;">
                        @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea id="editor" name="description"> {{ $news->description }}</textarea>
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        <select class="form-select form-select-sm" name="status" aria-label=".form-select-sm example">
                          <option selected value="">Please select</option>
                          <option value="1" @if($news->status=='1') selected @endif>Active</option>
                          <option value="0" @if($news->status=='0') selected @endif>Inactive</option>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
    console.log( editor );
    } )
    .catch( error => {
    console.error( error );
    } );
    </script>
</html>