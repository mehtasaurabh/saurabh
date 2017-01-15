$(function(){
    $("#fn_er").hide();
	$("#ln_er").hide();
	$("#em_er").hide();
	$("#num_er").hide();
	$("#meet_er").hide();
	$("#age_er").hide();
	$("#bg_er").hide(); 
	
	$("#fn").focusout(function(){
        chk_fname();
    });
	$("#ln").focusout(function(){
		chk_lname();
	});
	$("#em").focusout(function(){
        chk_email();
    });
	$("#num").focusout(function(){
        chk_num();
    });
	$("#meet").focusout(function(){
        chk_meet();
    });
	$("#age").focusout(function(){
        chk_age();
    });
	$("#bg").focusout(function(){
        chk_bgroup();
    });
    function chk_fname(){
        var name_length = $("#fn").val().length;
        if(name_length ==""){
			$("#fn_er").html("enter your firstname");
            $("#fn_er").show();
        }
        else{
            $("#fn_er").hide();
        }
    }
	function chk_lname(){
		var name_length = $("#ln").val().length;
		if(name_length == ""){
			$("#ln_er").html("enter your lastname");
			$("#ln_er").show();
		}
		else{
			$("#ln_er").hide();
		}
	}
	function chk_email(){
		var name_length = $("#em").val().length;
		if(name_length == ""){
			$("#em_er").html("enter your email");
			$("#em_er").show();
		}
		else{
			$("#em_er").hide();
		}
	}
	function chk_num(){
		var name_length = $("#num").val().length;
		if((name_length != "10")){
			$("#num_er").html("enter correct 10 digits number");
			$("#num_er").show();
		}
		else{
			$("#num_er").hide();
		}
	}
	function chk_meet(){
		var meet=$("#meet").val();
		if(meet == -1){
			$("#meet_er").html("enter whome you want to meet");
			$("#meet_er").show();
		}
		else{
			$("#meet_er").hide();
		}
	}
	function chk_age(){
		var name_length = $("#age").val().length;
		if(name_length == ""){
			$("#age_er").html("enter your age");
			$("#age_er").show();
		}
		else{
			$("#age_er").hide();
		}
	}
	function chk_bgroup(){
		var bl_grp=$("#bg").val();
		if(bl_grp == -1){
			$("#bg_er").html("enter your blood group");
			$("#bg_er").show();
		}
		else{
			$("#bg_er").hide();
		}
	}
	
	$("#reg_form").on('submit', function(x){
		x.preventDefault();
		var firstname = false;
		var lastname = false;
		var email = false;
		var num = false;
		var meet = false;
		var age = false;
		var bgroup = false;
		
		chk_fname();
		chk_lname();
		chk_email();
		chk_num();
		chk_meet();
		chk_age();
		chk_bgroup();
	
	
		firstname=$("#fn").val();
		lastname=$("#ln").val();
		email=$("#em").val();
		num=$("#num").val();
		meet=$("#meet").val();
		age=$("#age").val();
		bgroup=$("#bg").val();
		
		var markup="<tr> <td>" + firstname + "</td> <td>" + lastname + 
		"</td> <td>" + email + "</td> <td>"+ num +
		"</td> <td>"+ meet +"</td> <td>"+ age +
		"</td> <td>"+ bgroup + "</td> <td><input type='Button' id='btndel' value='del'></td></tr>";
		
		$("table tbody").append(markup);
		
		
	});
	$('body').on('click','#btndel',function(e){
		$(this).closest('tr').remove()
	});
});

	
	
	
	
	
	
	
	
	
	
	
	
	/*				$(function()
		{
			$('input[type="button"]').click(function(e){
					var row=$(this).closest('table tbody');
					row.remove()
			})
		}
		
		//$("table tbody").append("<input type='button' id='updbutton' value='update' click='update(this)'>");
		
	});
	
	/*function update(){
		$("#updbutton").click(function(){
			$("table tbody").
		})
	};*/

