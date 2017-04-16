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
		<h3>Add New Customer</h3>
			
		{{ Form::open(array('url' => 'updateNewCustomer','id' => 'submitForm')) }}
		
		<div class="form-group">
		{{Form::label('custId','Customer Id:')}}
		{{Form::text('custId',$custId,array('class'=>'form-control','id'=>'custId','readonly'=>'readonly'))}}
		</div>
		
		<div class="form-group">
		{{Form::label('compName','Company Name:')}}
		{{Form::text('compName','',array('class'=>'form-control','id'=>'compName'))}}
		</div>
		
		<div class="form-group">
		{{Form::label('address','Address- Street:')}}
		{{Form::text('address','',array('class'=>'form-control','id'=>'address'))}}
		</div>
		
		<div class="form-group">
		{{Form::label('city','Address- City:')}}
		{{Form::text('city','',array('class'=>'form-control','id'=>'city'))}}
		</div>
		
		<div class="form-group">		
		{{Form::label('prov','Address- Province:')}}
		{{Form::text('prov','',array('class'=>'form-control','id'=>'prov'))}}
		</div>
		
		<div class="form-group">		
		{{Form::label('zip','Address- Zip:')}}
		{{Form::text('zip','',array('class'=>'form-control','id'=>'zip'))}}
		</div>
		
		<div class="form-group">		
		{{Form::label('country','Address- Country:')}}
		{{Form::text('country','',array('class'=>'form-control','id'=>'country'))}}
		</div>
		
		<div class="form-group">		
		{{Form::label('brn','Business Registration No:')}}
		{{Form::text('brn','',array('class'=>'form-control','id'=>'brn'))}}
		<div id='valMsg'></div>
		</div>
		
		<div class="form-group">
		{{Form::label('website','Website:')}}
		{{Form::text('website','',array('class'=>'form-control','id'=>'website'))}}
		<div id='valMsg'></div>
		</div>
		
		<div class="form-group">
		{{Form::submit('Add Customer',array('id'=>'customerSubmit','class' => 'btn btn-primary'))}}
		</div>
		
		{{Form::close()}}	
	</div>
	@include('footer')
</body>
</html>