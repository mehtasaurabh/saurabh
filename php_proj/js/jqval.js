/*
* File    : jqval.js
* Purpose : function validation and table generation for patient reg_form
* Author  : Saurabh Mehta
*/
$(function(){
	function validate(){
		//hiding the <p> messages
		/*var i;
		var ids=["#fn_er","#ln_er","#em_er","#num_er","#meet_er","#age_er","#bg_er"];
		for(i=o;i<=ids.length();i++)
		{
			$(ids[i]).hide();
		}*/
		$("#fn_er").hide();
		$("#ln_er").hide();
		$("#em_er").hide();
		$("#num_er").hide();
		$("#meet_er").hide();
		$("#age_er").hide();
		$("#bg_er").hide(); 
		//validation for firstname
		var name_length = $("#fn").val().length;
		if(name_length ==""){
			$("#fn_er").html("enter your firstname");
			$("#fn_er").show();
			return false;
		}
		else{
			$("#fn_er").hide();
		}
		//validation for lastname
		var name_length = $("#ln").val().length;
		if(name_length == ""){
			$("#ln_er").html("enter your lastname");
			$("#ln_er").show();
			return false;
		}
		else{
			$("#ln_er").hide();
		}		
		//validation for email
		var name_length = $("#em").val().length;
		if(name_length == ""){
			$("#em_er").html("enter your email");
			$("#em_er").show();
			return false;
		}
		else{
			$("#em_er").hide();
		}
		//validation for contact number
		var name_length = $("#num").val().length;
		if((name_length != "10")){
			$("#num_er").html("enter correct 10 digits number");
			$("#num_er").show();
			return false;
		}
		else{
			$("#num_er").hide();
		}
		//validation for meet
		var meet=$("#meet").val();
		if(meet == -1){
			$("#meet_er").html("enter whome you want to meet");
			$("#meet_er").show();
			return false;
		}
		else{
			$("#meet_er").hide();
		}
		//validation for age
		var name_length = $("#age").val().length;
		if(name_length == ""){
			$("#age_er").html("enter your age");
			$("#age_er").show();
			return false;
		}
		else{
			$("#age_er").hide();
		}
		//validation for bloodgroup
		var bl_grp=$("#bg").val();
		if(bl_grp == -1){
			$("#bg_er").html("enter your blood group");
			$("#bg_er").show();
			return false;
		}
		else{
			$("#bg_er").hide();
		}
	return true;
	}
	//code for submit button
	$("#reg_form").on('click','#btn-add',function(x){
		//calling validate function
		var find = validate();
		x.preventDefault();
		if (find){
			var _fn = $('#fn').val();
			var _ln = $('#ln').val();
			var _em = $('#em').val();
			var _num = $('#num').val();
			var _meet = $('#meet').val();
			var _age = $('#age').val();
			var _bg = $('#bg').val();
			//table
			var _tr = "<tr> <td>" + _fn + "</td> <td>" + _ln + 
			"</td> <td>" + _em + "</td> <td>"+ _num +
			"</td> <td>"+ _meet +"</td> <td>"+ _age +
			"</td> <td>"+ _bg +
			"</td> <td><button type='button' class='btn btn-success btn-edit'>Edit </button> | <button type='button' class='btn btn-danger btn-delete'>Delete </button></td></tr>";
			$('tbody').append(_tr);
		}
	});
	//function for edit button
	var _trEdit = null;
	$(document).on('click', '.btn-edit',function(){
		_trEdit   = $(this).closest('tr');
		var _fn   = $(_trEdit).find('td:eq(0)').text();
		var _ln   = $(_trEdit).find('td:eq(1)').text();
		var _em   = $(_trEdit).find('td:eq(2)').text();
		var _num  = $(_trEdit).find('td:eq(3)').text();
		var _meet = $(_trEdit).find('td:eq(4)').text();
		var _age  = $(_trEdit).find('td:eq(5)').text();
		var _bg   = $(_trEdit).find('td:eq(6)').text();
		
		$('#fn').val(_fn);
		$('#ln').val(_ln);
		$('#em').val(_em);
		$('#num').val(_num);
		$('#meet').val(_meet);
		$('#age').val(_age);
		$('#bg').val(_bg);
	});
	//function for update button
	$('#btn-update').click(function(){
		if(_trEdit){
			var _fn = $('#fn').val();
			var _ln = $('#ln').val();
			var _em = $('#em').val();
			var _num = $('#num').val();
			var _meet = $('#meet').val();
			var _age = $('#age').val();
			var _bg = $('#bg').val();
		
			$(_trEdit).find('td:eq(0)').text(_fn);
			$(_trEdit).find('td:eq(1)').text(_ln);
			$(_trEdit).find('td:eq(2)').text(_em);
			$(_trEdit).find('td:eq(3)').text(_num);
			$(_trEdit).find('td:eq(4)').text(_meet);
			$(_trEdit).find('td:eq(5)').text(_age);
			$(_trEdit).find('td:eq(6)').text(_bg);
			
			alert("Record has been updated!");
			_trEdit = null;
		}
	});
	//function for delete button
	$(document).on('click','.btn-delete', function(){
		if(confirm("Are you sure to delete?")){
			$(this).closest('tr').remove(); 
		}
	});
});	
	
	
	
	
