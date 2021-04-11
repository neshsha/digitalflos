@extends('layouts.app')

@section('content')

<div class="container">

	<div class="container p-2 justify-content-center">

		<h1 class="text-center bg-info text-white">Admin - all users</h1>
		    
		<div class="row justify-content-center">

			<table class="table table-striped table-bordered w-50">

				<thead class="thead-dark">
			
				        <tr>
				            <th>ID</th>
				            <th>Name</th>
				            <th>E-mail</th>
				  
				        </tr>
			
				</thead>
			
				<tbody>

				    	@foreach($users as $user)
				    	<tr>
				    		<td>{{$user->id}}</td>
				    		<td>{{$user->name}}</td>
				    		<td>{{$user->email}}</td>
				    		
				    	</tr>
				        @endforeach
	
				</tbody>
		
			</table></div>

		<div class="d-flex justify-content-center">{{$users ?? ''->links()}}</div>

	</div>

</div>

@endsection