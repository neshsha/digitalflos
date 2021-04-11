@extends('layouts.app')

@section('content')

    <div class="container">
      <h1 class="text-center bg-info text-white rounded">Create new blog</h1>
      {{-- <x-alert /> --}}
    
      <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
       @csrf
        
        <div class="form-group">
        <label for="caption">Caption</label>
        <input type="text" class="form-control" name="caption" placeholder="Blog caption" id="caption">
        </div>

        <div class="form-group">
          <label for="image">Blog image</label>
        <input type="file" class="form-control-file" name="image" id="image" >
        </div>

        <div class="form-group">
        <label for="article">Blog</label>
        <textarea name="article" class="form-control" id="article" placeholder="Blog text"></textarea>
        </div>

    
        <button type="submit" class="btn btn-primary">Create blog</button>
        <a href="{{route('blog.index')}}" class="btn btn-dark float-right">Back</a>

      </form>

      <br>
      
  </div>
        
@endsection