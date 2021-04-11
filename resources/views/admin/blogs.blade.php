@extends('layouts.app')

@section('content')

<div class="container">

	<div class="container p-2 mt-2">

		<h1 class="text-center bg-info text-white">Admin - all blogs</h1>

		<p class="bg-success text-center text-white rounded">{{ session('message')}}</p>
		    
		<table class="table table-striped table-bordered">

		    <thead class="thead-dark">
	
		        <tr>
		            <th>Created by</th>
		            <th>Caption</th>
		            <th>Image</th>
		            <th>Action</th>
		        </tr>
	
		    </thead>
	
		    <tbody>

		    	@foreach($blogs as $blog)

		    	<tr>

		    		<td>{{$blog->user->name}}</td>
		    		<td><a href="{{route('blog.show', $blog->id)}}">{{$blog->caption}}</a></td>
		    		<td class="row justify-content-center"><img style="width: 80px; height: 80px" src="../{{$blog->image}}" alt="Card image cap"></td>
		    		<td>
		    		
		    		<div class="row justify-content-center">

		    			@if($blog->isapproved !== 1)

		    			<a class="btn btn-success mr-2" onclick="event.preventDefault();if(confirm('Do You really want to approve the blog?')) {
		    		              document.getElementById('form-update-{{$blog->id}}').submit()
		    		           }">APPROVE</a>
		    		                                    
		    		     <form style="display:none" method="post" id="{{'form-update-'.$blog->id}}" action="{{route('blog.approve', $blog->id)}}">
		    		     	
		    		     	@csrf
		    		        @method('patch')                 
		    		     </form>

		    		     @else

		    		     <a class="btn btn-warning mr-2" onclick="event.preventDefault();if(confirm('Do You really want to deny the blog?')) {
		    		                  document.getElementById('form-update-{{$blog->id}}').submit()
		    		                  }">DENY</a>
		    		                                    
		    		      <form style="display:none" method="post" id="{{'form-update-'.$blog->id}}" action="{{route('blog.deny', $blog->id)}}">
		    		            @csrf
		    		            @method('patch')                 
		    		      </form>

		    		     @endif


		    			<a class="btn btn-danger" onclick="event.preventDefault();if(confirm('Are You really want to delete?')) {
		    		         document.getElementById('form-delete-{{$blog->id}}').submit()}">DELETE</a>
		    		                                    
		    		     <form style="display:none" method="post" id="{{'form-delete-'.$blog->id}}" action="{{route('blog.destroy', $blog->id)}}">
		    		        @csrf
		    		        @method('delete') 

		    		     </form>

		    		</div>


		    		</td>

		    	</tr>

		        @endforeach

		    </tbody>

		</table>

		<div class="d-flex justify-content-center">{{$blogs ?? ''->links()}}</div>

	</div>

</div>

@endsection