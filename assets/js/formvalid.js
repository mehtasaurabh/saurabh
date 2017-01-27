function validate(event)
	{
		event.preventDefault();
		if(document.myForm.firstname.value == "")
			{
				alert("Please provide your firstname!!");
				document.myForm.firstname.focus();
				return false;
			}
		if(document.myForm.lastname.value=="")
			{
				alert("Please provide your lastname!!");
				document.myForm.firstname.focus();
				return false;
			}
		if(document.myForm.email.value=="")
			{
				alert("please enter your email id");
				document.myForm.email.focus();
				return false;
			}
		if((isNaN(document.myForm.number.value)) || (document.myForm.number.value.length !=10))
			{
				alert("enter correct number");
				document.myForm.number.focus();
				return false;
			}
		if(document.myForm.age.value=="")
			{
				alert("Please provide your age!!");
				document.myForm.age.focus();
				return false;
			}
		if(document.myForm.blood_group.value==-1)
			{
				alert("please enter your blood group");	
				document.myForm.blood_group.focus();
				return false;
			}
	
		myFunction();
		return true;
	}

function myFunction()
	{
		var firstname = document.getElementById("fn");
        var lastname = document.getElementById("ln");
		var email = document.getElementById("em");
		var number = document.getElementById("num");
		var meet = document.getElementById("ent");
		var age = document.getElementById("age");
		var blood_group = document.getElementById("bg");
		var table = document.getElementById("tabdata");
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        row.insertCell(0).innerHTML= firstname.value;
        row.insertCell(1).innerHTML= lastname.value;
        row.insertCell(2).innerHTML= email.value;
		row.insertCell(3).innerHTML= number.value;
		row.insertCell(4).innerHTML= meet.value;
        row.insertCell(5).innerHTML= age.value;
		row.insertCell(6).innerHTML= blood_group.value;
		row.insertCell(7).innerHTML= '<input type = "button" value = "delete" onclick = "deleteRow(this)">' ;
		row.insertCell(8).innerHTML= '<input type = "button" value = "update" onclick = "updateRow(this)">';
		row.insertCell(9).innerHTML= '<input type = "button" value = "save"   onclick = "saveRow(this)">';
		}
	
function deleteRow(r)
	{
		var i = r.parentNode.parentNode.rowIndex;
		document.getElementById("tabdata").deleteRow(i);
	}

function updateRow(q)
	{
		var x=q.parentNode.parentNode.childNodes;
		q1 = x[0].innerHTML;
		q2 = x[1].innerHTML;
		q3 = x[2].innerHTML;
		q4 = x[3].innerHTML;
		q5 = x[4].innerHTML;
		q6 = x[5].innerHTML;
		q7 = x[6].innerHTML;
		q8 = x[7].innerHTML;
		x[0].innerHTML='<input type = "text" id = "f_n" value = "'+q1+'" />';
		x[2].innerHTML='<input type = "text" id = "l_n" value = "'+q3+'" />';
		x[3].innerHTML='<input type = "text" id = "e_m" value = "'+q4+'" />';
		x[1].innerHTML='<input type = "text" id = "n_m" value = "'+q2+'" />';
		x[4].innerHTML='<input type = "text" id = "m_t" value = "'+q5+'" />';
		x[5].innerHTML='<input type = "text" id = "a_g" value = "'+q6+'" />';
		x[6].innerHTML='<input type = "text" id = "b_g" value = "'+q7+'" />';
	}
	 
function saveRow(obj)
	{
		var x=obj.parentNode.parentNode.childNodes;
		x[0].innerHTML = document.getElementById("f_n").value;
		x[1].innerHTML = document.getElementById("l_n").value;
		x[2].innerHTML = document.getElementById("e_m").value;
		x[3].innerHTML = document.getElementById("n_m").value;
		x[4].innerHTML = document.getElementById("m_t").value;
		x[5].innerHTML = document.getElementById("a_g").value;
		x[6].innerHTML = document.getElementById("b_g").value;
								
	}

/*function newvalidate()
	{
		if(document.getElementById("f_n").value == "")
			{
				alert("Please provide your firstname!!");
				document.newtable.getElementById("f_n").focus();
				return false;
			}
}*/
