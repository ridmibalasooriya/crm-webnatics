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
		
		<h3>Customers</h3>
		
		{{ Form::open(array('url' =>'addCustomer')) }}
		<div class="form-group">	
			{{Form::submit('Add New Customer', array('class' => 'btn btn-primary'))}}
		</div>
		{{Form::close()}}
		
		<div class='search-box'>
			{{Form::hidden('searchUrl','searchCustomerByCN',array('id'=>'searchUrl'))}}
			{{Form::text('searchInput',null,array('class'=>'searchInput','id'=>'searchInput', 'placeholder'=>'Search Company...'))}}
		</div>
		
		<div id='searchResult'>
			<table border="1" class="table table-hover">
			<tr>
				<th>Company Id</th>
				<th>Company Name</th>
				<th>Address</th>
				<th>City</th>
				<th>Province</th>
				<th>Zip Code</th>
				<th>Country</th>
				<th>BRNo</th>
				<th>Website</th>
				<th></th>
				<th></th>
			</tr>
			
			@php
			$i=1;
			@endphp
			
			@foreach($customers as $customer)
			<tr>
				@php
					$editId='customerEdit'.$i;
					$deleteId='customerDelete'.$i;
					$editIdHidden='customerEdit'.$i.'Hidden';
					$deleteIdHidden='customerDelete'.$i.'Hidden';
				@endphp
				
				<td>{{$customer->customer_id}}</td>
				<td>{{$customer->company_name}}</td>
				<td>{{$customer->address}}</td>
				<td>{{$customer->city}}</td>
				<td>{{$customer->prov}}</td>
				<td>{{$customer->zip}}</td>
				<td>{{$customer->country}}</td>
				<td>{{$customer->brn}}</td>
				<td>{{$customer->website}}</td>
				<td>
					{{Form::open(array('url' =>'editCustomer')) }}
					<div class="form-group">
						{{Form::hidden('editIdHidden',$customer->id,array('id'=>$editIdHidden))}}		
						{{Form::submit('Edit',['id'=>$editId,'class'=>'editCust btn btn-warning'])}}
					</div>
					{{Form::close()}}
				</td>	
				<td>
					{{ Form::open(array('url' =>'deleteCustomer')) }}
					<div class="form-group">
						{{Form::hidden('deleteIdHidden',$customer->id,array('id'=>$deleteIdHidden))}}		
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
	</div>
	
	@include('footer')
</body>
</html>