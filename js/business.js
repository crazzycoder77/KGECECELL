$(document).ready(function() {


    
var pre = document.createElement('pre');
pre.style.margin = "0";
pre.style.padding = "24px";
pre.style.whiteSpace = "pre-wrap";
pre.style.textAlign = "justify";
pre.style.overflow = "hidden";
//pre.appendChild(document.createTextNode($('#la').text()));

var Tsize=0,Tname='',n1='',n2='',n3='',n4='',p1='',p2='',p3='',p4='',em1='',em2='',em3='',em4='';



function send(){

	var data="<div class='container'><ul><li><h3>Team Details :-</h3><p>Team Name : "+Tname+"</p><p>Team Size : "+Tsize+"</p></li><li><h3>Member Details :- </h3><ul>";
	switch(Tsize)
	{
		case 4: data = data + "<li><p> Member 4 :- <br/> Name  : "+n1+"<br/> Phone : "+p1+"<br/> Email : "+em1+"</p></li>";
		case 3: data = data + "<li><p> Member 3 :- <br/> Name  : "+n2+"<br/> Phone : "+p2+"<br/> Email : "+em2+"</p></li>";
		case 2: data = data + "<li><p> Member 2 :- <br/> Name  : "+n3+"<br/> Phone : "+p3+"<br/> Email : "+em3+"</p></li>";
		default:data = data + "<li><p> Member 1 :- <br/> Name  : "+n4+"<br/> Phone : "+p4+"<br/> Email : "+em4+"</p></li>";
	}
	data= data + "</ul></li></ul></div>";
	pre.innerHTML=data
				alertify.confirm('Please Confirm Details Before proceeding', pre, function(){
				document.getElementById("BusinessForm").submit();
				},function(){
				}).set({labels:{cancel: 'Change Details', ok:'Proceed To Pay Registration Fee of Rs 500/-'}, padding: false,'closable': false});
}

$('#b1').click(function(){
    var p1,p2=0;
    $('#e1').css('display','none');
    $('#e2').css('display','none');
    $('#e3').css('display','none');
    $('#e4').css('display','none');
    Tname=$('.teamname').val();
    Tsize=parseInt($('.teamsize').val());
    if(Tname.length<1){
        $('#e1').css('display','block');
        p1=0;
    }
    else{
        p1=1;
    }
    if(Tsize==0){
        $('#e2').css('display','block');
        p2=0;
    }
    else if(Tsize<0){
        $('#e4').css('display','block');
        p2=0;
    }
    else{
        p2=1;
    }
    if(p1==1 && p2==1){
        $('#div1').css('display','none');
        if(Tsize==1){
            $('#div5').css('display','block');
            $('#hd5').html('Member 1');
        }
        else if(Tsize==2){
            $('#div4').css('display','block');
            $('#hd4').html('Member 1');
            $('#hd5').html('Member 2');
            
        }
        else if(Tsize==3) {
            $('#div3').css('display','block');
            $('#hd3').html('Member 1');
            $('#hd4').html('Member 2');
            $('#hd5').html('Member 3');
        }
        else
		{
			$('#div2').css('display','block');
            $('#hd2').html('Member 1');
            $('#hd3').html('Member 2');
            $('#hd4').html('Member 3');
			$('#hd5').html('Member 4');
		}
    }
});


$('#b5').click(function(){
   n4=$('.name4').val();
   p4=$('.phone4').val();
   em4=$('.email4').val();
   $('#e51').css('display','none');
   $('#e52').css('display','none');
   $('#e53').css('display','none');
   if(n4.length<1){
    $('#e51').css('display','block');
   }else{
       if(p4.length<10 || p4.length>12){
            $('#e52').css('display','block');
       }
       else{
           if(em4.length<01){
            $('#e53').css('display','block');
           }else{
            $('#div5').css('display','none');
            $('#div6').css('display','block'); 
			//show as confirm
			pre.innerHTML='KGEC E Cell takes responsibility for maintaining the confidentiality of the information provided. The idea, summary, complete plan shall not be revealed to anyone except the Event Judges and the Business Committee(core members of the E Cell) who will be responsible for forwarding the information to the jury panel.'
			alertify.confirm('Terms & Conditions',pre, function(){

				},function(){
					window.location.replace("confirm");
				}).set({labels:{ok:'Accept', cancel: 'Decline'}, padding: false,'closable': false});

			
           }
       }
   }

});

$('#b4').click(function(){
   n3=$('.name3').val();
   p3=$('.phone3').val();
   em3=$('.email3').val();
    $('#e41').css('display','none');
    $('#e42').css('display','none');
    $('#e43').css('display','none');
    if(n3.length<1){
     $('#e41').css('display','block');
    }else{
        if(p3.length<10 || p3.length>12){
             $('#e42').css('display','block');
        }
        else{
            if(em3.length<01){
             $('#e43').css('display','block');
            }else{
                $('#div4').css('display','none');
                $('#div5').css('display','block');
            }
        }
    }
 
 });

$('#b3').click(function(){
   n2=$('.name2').val();
   p2=$('.phone2').val();
   em2=$('.email2').val();
    $('#e31').css('display','none');
    $('#e32').css('display','none');
    $('#e33').css('display','none');
    if(n2.length<1){
     $('#e31').css('display','block');
    }else{
        if(p2.length<10 || p2.length>12){
             $('#e32').css('display','block');
        }
        else{
            if(em2.length<01){
             $('#e33').css('display','block');
            }else{
                $('#div3').css('display','none');
                $('#div4').css('display','block');
            }
        }
    }
 
 });
 
$('#b2').click(function(){
    n1=$('.name1').val();
    p1=$('.phone1').val();
    em1=$('.email1').val();
    $('#e21').css('display','none');
    $('#e22').css('display','none');
    $('#e23').css('display','none');
    if(n1.length<1){
     $('#e21').css('display','block');
    }else{
        if(p1.length<10 || p1.length>12){
             $('#e22').css('display','block');
        }
        else{
            if(em1.length<01){
             $('#e23').css('display','block');
            }else{
                $('#div2').css('display','none');
                $('#div3').css('display','block');
				
                
            }
        }
    }
 
 });


 $('#b6').click(function(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
     if(filePath==''){
        alertify.alert('Alert', 'Please Select a file to upload').set({'closable': false});
     }
     else{
			send();
            
     }
    
 });

$('#b7').click(function(){
	 $('#div6').css('display','none');
     $('#div5').css('display','block');
});

$('#b8').click(function(){
	 $('#div5').css('display','none');
	switch(Tsize)
	{
		case 4:
		case 3:
		case 2:
		$('#div4').css('display','block');
		break;
		default: $('#div1').css('display','block');
	}
});

$('#b9').click(function(){
	 $('#div4').css('display','none');
	switch(Tsize)
	{
		case 4:
		case 3:
		$('#div3').css('display','block');
		break;
		default: $('#div1').css('display','block');
	}
	
});

$('#b10').click(function(){
	 $('#div3').css('display','none');
	switch(Tsize)
	{
		case 4:
		$('#div2').css('display','block');
		break;
		default: $('#div1').css('display','block');
	}
	
});

$('#b11').click(function(){
	 $('#div2').css('display','none');
     $('#div1').css('display','block');
});


$('#file').change(function(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.pdf)$/i;
    if(!allowedExtensions.exec(filePath)){
        alertify.alert('Alert', 'Please upload a file with .pdf extension.').set({'closable': false});
        fileInput.value = '';
        return false;
    }
})




});