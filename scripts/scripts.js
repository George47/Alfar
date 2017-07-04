// POSTs the login info to server via AJAX
// Not working for some reason
function login() {
	$.ajax({
		url: '../server/login_form.php',
    	type: "POST",
		data: $('form').serialize(),
		success: function(result) {
			data = JSON.parse(result);
			if (data.status == 'success') {
				window.location.href = data.redirect;
			} else {
				return false;
			}
		}
    });
}

// POSTs the register info to server via AJAX
function register() {
	//$username = $('#username2');
	//$password = $('#password1');
	$.ajax({
  	url: '../server/register_form.php',
      type: "POST",
  	data: $('form').serialize(),
  	success: function(result) {
  		data = JSON.parse(result);
  		if (data.status == 'success') {
  			window.location.href = data.redirect;
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
