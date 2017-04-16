$(document).ready(function () {
	
	$('#submitForm').submit(function(){
		
		var returnVal=false;
		
		var EmptyField=false;
		var EmptyFieldId=[];
		var i=0;
		
		$('.form-control').each(function(){
			if($(this).val()==''){
				EmptyFieldId[i]=$(this).attr('id')
				EmptyField=true;
				i++
			}
		});
		
		if(EmptyField==true){
			$.each(EmptyFieldId, function(index, value) {
				FieldId="#"+value;
				$(FieldId).parent().css( "background-color", "#ff9999" );
			});	
			
			alert('Please Fill All Fields');
			var firstElementId='#'+EmptyFieldId[0];
			$(firstElementId).focus();
			
			returnVal=false;
		}
		else{
			returnVal=true;
		}
		
		return returnVal;	
	});
	
	$('.form-control').blur(function(){
		if($(this).val()!=''){
			$(this).parent().css( "background-color", "#ffffff" );
		}
		else{
			$(this).parent().css( "background-color", "#ff9999" );
		}
	});
	
	$('#brn').keyup(function(){
		var brnVal=$(this).val();
		var brnLegth=brnVal.length;
		if(brnLegth>8){
			$(this).siblings('#valMsg').html("Invalid.! BRN should have 8 characters");
			$(this).parent().css( "background-color", "#ff9999" );
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
		}	
		
	});
	
	$('#brn').blur(function(){
		var brnVal=$(this).val();
		var brnLegth=brnVal.length;
		if(brnLegth!=8){
			$(this).siblings('#valMsg').html("Invalid.! BRN should have 8 characters");
			$(this).parent().css( "background-color", "#ff9999" );
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
		}	
		
	});
	
	$('#website').blur(function(){
		
		var reg=/((http:|https:|)\/\/|www\.)[\w+(\.|\/|\-|\w+)]*$/g;
		var regExUrl = new RegExp(reg);
		var thisUrl= $(this).val();
		
		var validUrl=regExUrl.test(thisUrl);
		
		if(!validUrl){
			$(this).siblings('#valMsg').html("Invalid Website Link.!");
			$(this).parent().css( "background-color", "#ff9999" );
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
		}	
		
		
	});
    
    $('#contEmail').blur(function(){
		
		var reg=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/g;
		var regExEmail = new RegExp(reg);
		var thisEmail= $(this).val();
		
		var validEmail =regExEmail.test(thisEmail);
		
		if(!validEmail){
			$(this).siblings('#valMsg').html("Invalid Email Address");
			$(this).parent().css( "background-color", "#ff9999" );
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
		}
		
		
	});
	
	$('#contNo').keyup(function(){
		
		var phoneVal=$(this).val();
		var phoneLegth=phoneVal.length;
		if(phoneLegth>10){
			$(this).siblings('#valMsg').html("Invalid Phone No");
			$(this).parent().css( "background-color", "#ff9999" );
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
		}
		
		
	});
	
	$('#contNo').blur(function(){
		
		var phoneVal=$(this).val();
		var phoneLegth=phoneVal.length;
		if(phoneLegth!=10){
			$(this).siblings('#valMsg').html("Invalid Phone No");
			$(this).parent().css( "background-color", "#ff9999" );
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
		}
		
		
	});
	
	//Change Company Id when change name
	$('#editCompName').change(function(){
		$newVal=$('#editCompName').val();
		$('#editCompId').val($newVal);
		
	});
	
});