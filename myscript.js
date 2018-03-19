function validation()
{
	var result=true;
	var i=document.getElementsByTagName("input");
	if(i[0].value.length == 0)
	{
		alert("Fill the Username");
		result=false;
	}	
    else if(i[0].value.length <= 3 && i[0].value.length != 0)
    {
    	alert("Username is too Short.Atleast 4 characters");
		result=false;
    }
    else
    {
    	result=true;
    }
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