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
		@php
			$activity=$data['activity'];
		@endphp
	
		<h3>Add New Activity</h3>
			
		{{ Form::open(array('url' => 'updateActivity','id' => 'submitForm')) }}
		
		<div class="form-group">
		{{Form::label('actId','Activity Id:')}}
		{{Form::text('actId',$activity->act_id,array('class'=>'form-control','id'=>'actId','readonly'=>'readonly'))}}
		</div>
		
		<div class="form-group">
		{{Form::label('compId','Company Name:')}}
		{{Form::select('compId',$data['companyNames'],$activity->customer_id,['id'=>'compId','class' => 'form-control'])}}
		</div>
		
		<div class="form-group">
		{{Form::label('date','Date:')}}
		{{Form::date('date',$activity->date,array('class'=>'form-control','id'=>'date','placeholder' => 'MM/DD/YYYY'))}}
		<div id='valMsg'></div>
		</div>
		
		<div class="form-group">
		{{Form::label('actType','Activity Type:')}}
		{{Form::select('actType',['Call' => 'Call', 'Email' => 'Email','Meeting' => 'Meeting'], $activity->activity_type, ['class' => 'form-control'])}}
		</div>
		
		<div class="form-group">		
		{{Form::label('outcomes','Outcomes:')}}
		{{Form::text('outcomes',$activity->outcomes,array('class'=>'form-control','id'=>'outcomes'))}}
		</div>
		
		<div class="form-group">		
		{{Form::label('salesPerson','Sales Person:')}}
		{{Form::text('salesPerson',$activity->sales_person,array('class'=>'form-control','id'=>'salesPerson'))}}
		</div>
				
		<div class="form-group">
		{{Form::hidden('idHidden',$activity->id)}}		
		{{Form::submit('Update Activity',array('id'=>'activitySubmit','class' => 'btn btn-primary'))}}
		</div>
		
		{{Form::close()}}	
	</div>
		
	@include('footer')
</body>
</html>