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
	
		<h3>Add New Contact</h3>
			
		{{ Form::open(array('url' => 'updateNewContact','id' => 'submitForm')) }}
		
		<div class="form-group">
		{{Form::label('contId','Contact Id:')}}
		{{Form::text('contId',$data['contId'],array('class'=>'form-control','id'=>'contId','readonly'=>'readonly'))}}
		</div>
		
		<div class="form-group">
		{{Form::label('compName','Company Name:')}}
		{{Form::select('compName',$data['companyNames'],null,['placeholder' => 'Select Company','class' => 'form-control'])}}
		</div>
		
		<div class="form-group">
		{{Form::label('name','Name:')}}
		{{Form::text('name','',array('class'=>'form-control','id'=>'name'))}}
		</div>
		
		<div class="form-group">
		{{Form::label('contEmail','Email Address:')}}
		{{Form::email('contEmail','',array('class'=>'form-control','id'=>'contEmail','placeholder' => 'example@email.com'))}}
		<div id='valMsg'></div>
		</div>
		
		<div class="form-group">		
		{{Form::label('contNo','Contact No:')}}
		{{Form::text('contNo','',array('class'=>'form-control','id'=>'contNo'))}}
		<div id='valMsg'></div>
		</div>
				
		<div class="form-group">
		{{Form::submit('Add Contact',array('id'=>'contactSubmit','class' => 'btn btn-primary'))}}
		</div>
		
		{{Form::close()}}	
	</div>
		
	@include('footer')
</body>
</html>