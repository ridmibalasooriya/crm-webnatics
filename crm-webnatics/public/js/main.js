$(document).ready(function () {
	
	var validVal=true;
	
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
		
		if((EmptyField==true)||(validVal==false)){
			$.each(EmptyFieldId, function(index, value) {
				FieldId="#"+value;
				$(FieldId).parent().css( "background-color", "#ff9999" );
			});	
			
			alert('Please Fill All Fields with Valid Data.!');
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
			validVal=false;
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
			validVal=true;
		}	
		
	});
	
	$('#brn').blur(function(){
		var brnVal=$(this).val();
		var brnLegth=brnVal.length;
		if(brnLegth!=8){
			$(this).siblings('#valMsg').html("Invalid.! BRN should have 8 characters");
			$(this).parent().css( "background-color", "#ff9999" );
			validVal=false;
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
			validVal=true;
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
			validVal=false;
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
			validVal=true;
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
			validVal=false;
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
			validVal=true;
		}
		
		
	});
	
	$('#contNo').keypress(function (e) {
	    	    
	    var reg=/\d$/g;
		var regExContNo = new RegExp(reg);		
		var c = String.fromCharCode(e.which);
		
		var phoneVal=$(this).val();
		
		var validContNo =regExContNo.test(c);
		
		if((!validContNo)&&(e.keyCode != 8)){		
			return false;
		}
	    
	});
	
	$('#contNo').keypress(function(e){
		
		var phoneVal=$(this).val();	
	
		
		var phoneLegth=phoneVal.length;
		if((phoneLegth>=10)&&(e.keyCode != 8)){
			$(this).siblings('#valMsg').html("Invalid Phone No");
			$(this).parent().css( "background-color", "#ff9999" );
			return false;
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
			validVal=false;
		}
		else{
			$(this).siblings('#valMsg').html("");
			$(this).parent().css( "background-color", "#ffffff" );
			validVal=true;
		}
		
		
	});
	
	
	//Confirm Message before deleting record.
	$('.deleteCust').click(function(){		
		var confMsg=confirm("Are You Sure You Want to Delete This Record?");
		return confMsg;
		
	});
	

	//Search By Company Name Ajax for Customer/Contact/Activity  
    $('#searchInput').keyup(function() {
	var cName=$(this).val();
	var loadURL=$('#searchUrl').val();
    $.ajax({
        url: loadURL,
        type: 'GET',
        data: {cpName :cName},
        success: function(html){
        	$('#searchResult').html(html);
		},
		  error: function(data) {
			  alert(data);
			}
        });
   }); 
	
});