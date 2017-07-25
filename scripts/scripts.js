$("#loginSubmit").click(function(){login()});
$("#registerForm").click(function(){register()});
$("#submit-listing").click(function(){submitListing()});


// POSTs the login info to server via AJAX
// Not working for some reason
function login() {
	$.ajax({
		url: 'server/login_form.php',
    	type: "POST",
		data: $('#usr-login').serialize(),
		success: function(result) {
			data = JSON.parse(result);
			if (data.status == 'success') {
				window.location.href = data.redirect;
			} else {
				$('.notification').show(500);
				window.location.href = "index.php#sign-in-dialog";
			}
		}
    });
}

// POSTs the register info to server via AJAX
function register() {
	//$username = $('#username2');
	//$password = $('#password1');
	$.ajax({
  	url: 'server/register_form.php',
      type: "POST",
  	data: $('#user-register').serialize(),
  	success: function(result) {
  		data = JSON.parse(result);
  		if (data.status == 'success') {
  			window.location.href = "index.php";
			} else {
  			return false;
  		}
  	}
  });
}

function submitListing() {
	$.ajax({
		url: '../server/add_listing.php',
    	type: "POST",
		data: $('#house-loc').serialize() + '&' + $('#house-des').serialize() + '&' + $('#house-info').serialize(),
		//data: $('#flyer-info').serialize() + '&' + $('#flight-info').serialize(),
		success: function(result) {
			data = JSON.parse(result);
			if (data.status == 'success') {
				//notify("您的信息已成功保存", 'notify-green');
				//setTimeout(function(){location.href="flight.php?id="+data['id']}, 3000);
				window.location.href = "../index.php";
			} else {
				return false;
			}
		}
    });
}

$(".like-button").click(function(){
		// button passes a value, js takes it and sends to php
		var houseid = document.getElementById("like-button").value;

    if(! $(this).parent().data('bookmark')){
        // alert('bookmarked');
        $(this).parent().data('bookmark', 1);
				$.ajax({url: 'server/add_bookmark.php?id=' + houseid});
    }
    else {
        // alert('not bookmarked');
        $(this).parent().data('bookmark', null);
				$.ajax({url: 'server/delete_bookmark.php?id=' + houseid});
    }
});


// implement select2
if (typeof $('<select></select>').select2 === "function") {
	$('select.loc').select2({
		placeholder: "输入地区或学校..",
	  	allowClear: true
	});
}



function saveInfo() {
	$.ajax({
		url: '../server/usr_profile_info.php',
    	type: "POST",
		data: $('#usr_details').serialize(),
		success: function(result) {
			data = JSON.parse(result);
			if (data.status == 'success') {
				window.location.href = "../index.php";
			} else {
				//notify(data.errorMsg, 'notify-red');
				return false;
			}
		},
		error: function(result) {
			notify("服务器繁忙，请稍后重试", 'notify-red');
		}
    });
}
