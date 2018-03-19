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
	if(i[1].value.length == 0)
	{
		alert("Fill the Password");
		result=false;
	}
    else if(i[1].value.length <= 3 && i[1].value.length != 0)
    {
    	alert("Password is too Short.Atleast 4 characters");
		result=false;
    }
	else
	{
		result=true;
	}
	
	return(result);
}