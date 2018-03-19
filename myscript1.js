alert("Hello")
function myfun()
{
	var result=true;
	var i=document.getElementsByTagName("input");
	if(i[0].value.length == 0){
		document.getElementById("nameerror").innerHTML = "Username Not mention";
		result=false;
	}	
	else if(i[0].value.length <= 3 && i[0].value.length != 0){
		document.getElementById("nameerror").innerHTML = "Username is too Short.Atleast 4 characters";
		result=false;
	}
	else if(i[0].value.length >= 4){
		document.getElementById("nameerror").innerHTML = "";
		result=true;
	}
	else{
		result=true;
	}
}
function valFNAME()
{
	var result=true;
	var i=document.getElementsByTagName("input");
	if(i[1].value.length == 0)
	{
		document.getElementById("fnameerror").innerHTML = "Please Enter Full Name";
		result=false;
	}	
	else if(i[1].value.length <= 3 && i[1].value.length != 0)
	{
		document.getElementById("fnameerror").innerHTML = "Username is too Short.Atleast 4 characters";
		result=false;
	}
	else if(i[1].value.length >= 4)
	{
		document.getElementById("fnameerror").innerHTML = "";
		result=true;
	}
	else
	{
		result=true;
	}
}
function validEmail{
	var result=true;
	var i=document.getElementsByTagName("input");
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(i[2].value.match(mailformat))
	{
		document.getElementById("emailerror").innerHTML = "";
		return true;
	}
	else
	{
		document.getElementById("emailerror").innerHTML = "You have entered an invalid email address!";
		uemail.focus();
		return false;
		}
	}
}
function
	if(i[3].value.length == 0)
	{
		alert("Fill the Password");
		result=false;
	}
    else if(i[3].value.length <= 3 && i[3].value.length != 0)
    {
    	alert("Password is too Short.Atleast 4 characters");
		result=false;
    }
	else
	{
		result=true;
	}
	var phoneno = /^\d{10}$/;
	if(i[5].value.match(phoneno))
	{
		result= true;
	}
	else
	{
		alert("Enter Valid Number of 10 digits");
		result= false;
	}
	if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(i[2].value))
	{
		result= true;
	} 
	else
	{
		alert("Enter Valid email address");
		result= false;
	}
	
	return(result);
}