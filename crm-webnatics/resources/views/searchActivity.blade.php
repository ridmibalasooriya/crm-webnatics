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
		<h3>Activities</h3>
		
		{{ Form::open(array('url' =>'addActivity')) }}
		<div class="form-group">	
			{{Form::submit('Add New Activity', array('class' => 'btn btn-primary'))}}
		</div>
		{{Form::close()}}
		
		<div class='search-box'>
			{{Form::hidden('searchUrl','searchActivityByCN',array('id'=>'searchUrl'))}}
			{{Form::text('searchInput',null,array('class'=>'searchInput','id'=>'searchInput', 'placeholder'=>'Search Company...'))}}
		</div>
		
		<div id='searchResult'>		
			<table border="1" class="table table-hover">
			<tr>
				<th>Id</th>
				<th>Activity Id</th>
				<th>Company Name</th>
				<th>Date</th>
				<th>Activity Type</th>
				<th>Outcomes</th>
				<th>Sales Person</th>
				<th></th>
				<th></th>
			</tr>
			
			@php
			$i=1;
			@endphp
			
			@foreach($activities as $activity)
			<tr>
				@php
					$editId='activityEdit'.$i;
					$deleteId='activityDelete'.$i;
					$editIdHidden='activityEdit'.$i.'Hidden';
					$deleteIdHidden='activityDelete'.$i.'Hidden';
				@endphp
				
				<td>{{$activity->id}}</td>
				<td>{{$activity->act_id}}</td>
				<td>{{$activity->customers->company_name}}</td>
				<td>{{$activity->date}}</td>
				<td>{{$activity->activity_type}}</td>
				<td>{{$activity->outcomes}}</td>
				<td>{{$activity->sales_person}}</td>
				<td>
					{{Form::open(array('url' =>'editActivity')) }}
					<div class="form-group">
						{{Form::hidden('editIdHidden',$activity->id,array('id'=>$editIdHidden))}}		
						{{Form::submit('Edit',['id'=>$editId,'class'=>'editCust btn btn-warning'])}}
					</div>
					{{Form::close()}}
				</td>	
				<td>
					{{ Form::open(array('url' =>'deleteActivity')) }}
					<div class="form-group">
						{{Form::hidden('deleteIdHidden',$activity->id,array('id'=>$deleteIdHidden))}}		
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