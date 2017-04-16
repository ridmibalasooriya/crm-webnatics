<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">

        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<script type="text/javascript" src="{{URL::asset('js/main.js')}}"></script>
		
</head>
<body>
	@include('header')
	
	<div class="container">
	
		<h3>Contacts</h3>
		
		{{ Form::open(array('url' =>'addContact')) }}
		<div class="form-group">	
			{{Form::submit('Add New Contact', array('class' => 'btn btn-primary'))}}
		</div>
		{{Form::close()}}
		
		<table border="1" class="table table-hover">
		<tr>
			<th>Id</th>
			<th>Contact Id</th>
			<th>Company Name</th>
			<th>Name</th>
			<th>Email Address</th>
			<th>Contact No</th>
			<th></th>
			<th></th>
		</tr>
		
		@php
		$i=1;
		@endphp
		
		@foreach($contacts as $contact)
		<tr>
			@php
				$editId='contactEdit'.$i;
				$deleteId='contactDelete'.$i;
				$editIdHidden='contactEdit'.$i.'Hidden';
				$deleteIdHidden='contactDelete'.$i.'Hidden';
			@endphp
			
			<td>{{$contact->id}}</td>
			<td>{{$contact->cont_id}}</td>
			<td>{{$contact->customer_id}}</td>
			<td>{{$contact->name}}</td>
			<td>{{$contact->email}}</td>
			<td>{{$contact->contact_no}}</td>
			<td>
				{{Form::open(array('url' =>'editContact')) }}
				<div class="form-group">
					{{Form::hidden('editIdHidden',$contact->id,array('id'=>$editIdHidden))}}		
					{{Form::submit('Edit',['id'=>$editId,'class'=>'editCust btn btn-warning'])}}
				</div>
				{{Form::close()}}
			</td>	
			<td>
				{{ Form::open(array('url' =>'deleteContact')) }}
				<div class="form-group">
					{{Form::hidden('deleteIdHidden',$contact->id,array('id'=>$deleteIdHidden))}}		
					{{Form::submit('Delete',['id'=>$deleteId,'class'=>'deleteCust btn btn-danger'])}}
				</div>
				{{Form::close()}}
			</td>	
		</tr>
		
		@php
		$i++;
		@endphp
		
		@endforeach
		
		</table>
	</div>
	
	@include('footer')
</body>
</html>