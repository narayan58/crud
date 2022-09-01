<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add News Form - Company Details</title>
        <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Add News</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>News Title:</strong>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="News Title">
                            @error('title')
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
                            <strong>Description:</strong>
                            <textarea id="editor" name="description"></textarea>
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