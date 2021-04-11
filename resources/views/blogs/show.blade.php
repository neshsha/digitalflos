@extends('layouts.app')

@section('content')
    
    <div class="container">

      <h1 class="text-center bg-info text-white rounded"><b>{{$blog->caption}}</b></h1>

      <div class="row d-flex justify-content-center">
                
        <div class="card col-10 p-2 m-1">

          <img class="card-img-top" src="../../{{$blog->image}}" alt="Card image cap">

          <div class="card-body">

              <p class="card-text">{{$blog->article}}</p>
              
              <div class="container">
                <a href="{{route('blog.index')}}" class="btn btn-dark">Back</a>
              </div>
        </div>

      </div>       

    </div>

@endsection