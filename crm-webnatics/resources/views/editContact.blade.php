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
			$contact=$data['contact'];
		@endphp
	
		<h3>Update Contact</h3>
			
		{{ Form::open(array('url' => 'updateContact','id' => 'submitForm')) }}
		
		<div class="form-group">
		{{Form::label('contId','Contact Id:')}}
		{{Form::text('contId',$contact->cont_id,array('class'=>'form-control','id'=>'contId','readonly'=>'readonly'))}}
		</div>
		
		<div class="form-group">
		{{Form::label('compId','Contact Id:')}}
		{{Form::text('compId',$contact->customer_id,array('class'=>'form-control','id'=>'editCompId','readonly'=>'readonly'))}}
		</div>
		
		<div class="form-group">
		{{Form::label('compName','Company Name:')}}
		{{Form::select('compName',$data['companyNames'],null,['placeholder' => 'Select Company','id'=>'editCompName','class' => 'form-control'])}}
		</div>
		
		<div class="form-group">
		{{Form::label('name','Name:')}}
		{{Form::text('name',$contact->name,array('class'=>'form-control','id'=>'name'))}}
		</div>
		
		<div class="form-group">
		{{Form::label('contEmail','Email Address:')}}
		{{Form::email('contEmail',$contact->email,array('class'=>'form-control','id'=>'contEmail','placeholder' => 'example@email.com'))}}
		<div id='valMsg'></div>
		</div>
		
		<div class="form-group">		
		{{Form::label('contNo','Contact No:')}}
		{{Form::text('contNo',$contact->contact_no,array('class'=>'form-control','id'=>'contNo'))}}
		<div id='valMsg'></div>
		</div>
				
		<div class="form-group">
		{{Form::hidden('idHidden',$contact->id)}}	
		{{Form::submit('Update Contact',array('id'=>'contactSubmit','class' => 'btn btn-primary'))}}
		</div>
		
		{{Form::close()}}	
	</div>
		
	@include('footer')
</body>
</html>