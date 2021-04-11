@extends('layouts.app')

@section('content')

    <div class="container">
      <h1 class="text-center bg-info text-white rounded">Update blog</h1>
      
      <form action="{{route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        
        <div class="form-group">
        <label for="caption">Caption</label>
        <input type="text" class="form-control" value="{{$blog->caption}}" name="caption" placeholder="Article caption" id="caption">
        </div>

        <div class="form-group">
          <label for="image">Blog image</label>
        <input type="file" class="form-control-file" name="image" id="image" >
        </div>

         <div class="form-group">
        <label for="article">Article</label>
        <textarea name="article" class="form-control" id="article"  placeholder="Article text">{{$blog->article}}</textarea>
        </div>

    
        <button type="submit" class="btn btn-primary">Update blog</button>

        <a href="{{route('blog.index')}}" class="btn btn-dark float-right">Back</a>

      </form>

      <br>
    </div>
        
@endsection