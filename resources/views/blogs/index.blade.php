@extends('layouts.app')

@section('content')
    
  <div class="container">

    <h1 class="text-center bg-info text-white">Welcome to Digitalflos blogs</h1>

    @auth

      @if($isadmin == 0)
        <a class=" btn bg-dark text-white nav-link w-25 mb-2" href="/blogs/create">Create blog</a>

      @else
      <div class="row justify-content-center">
        <a class=" btn bg-dark text-white nav-link w-25 mb-4 mr-2" href="/admin/getallusers">User list</a>
        <a class=" btn bg-dark text-white nav-link w-25 mb-4" href="/admin/getallblogs">Blog list</a>
      </div>

      @endif

    @endauth

    <div class="row justify-content-center">

      @foreach ($blogs ?? '' as $blog)

        @if($blog->isapproved == 1 OR $blog->user_id == $id)

        <div class=" col-3 card p-2 m-1" onmouseover="this.style.backgroundColor = '#3490dc'; this.style.color = 'white'" onmouseout="this.style.backgroundColor = 'white'; this.style.color = 'black'">

          <img class="card-img-top" src="{{$blog->image}}" alt="Card image cap">

          <div class="card-body">

            <h5 class="card-title">{{$blog->caption}}</h5>

            <p class="card-text"><small>Created {{$blog->created_at->diffForHumans()}}</small></p>
            <p class="card-text"><small>Created by: {{$blog->user->name}}</small></p>

            <a href="{{route('blog.show', $blog->id)}}" class="btn btn-primary">Read more</a>

            @auth

              @if($blog->user_id == $id)

                <div class="row float-right">

                  @if($isadmin == 0)

                    <a href="{{route('blog.edit', $blog->id)}}"><span class="fas fa-edit text-info mr-2"></span></a>

                  @endif

                  <a><span class="fas fa-trash text-danger "onclick="event.preventDefault();
                                                                      
                      if(confirm('Are You really want to delete?')) {
                      document.getElementById('form-delete-{{$blog->id}}').submit()
                      }"></span>

                  </a>
                                    
                  <form style="display:none" method="post" id="{{'form-delete-'.$blog->id}}" action="{{route('blog.destroy', $blog->id)}}">

                    @csrf
                    @method('delete')
                                                   
                  </form>

                </div>

              @endif

            @endauth

          </div>
          
        </div>

        @endif

      @endforeach
                 
      </div>

    <div class="d-flex justify-content-center">{{$blogs ?? ''->links()}}</div>

    <p class="bg-success text-center text-white rounded">{{ session('message')}}</p>
        
  </div>

@endsection