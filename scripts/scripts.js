(function($) {

  // POSTs the login info to server via AJAX
  function login() {
  	$.ajax({
  		url: './server/login_form.php',
      	type: "POST",
  		data: $('form').serialize(),
  		success: function(result) {
  			data = JSON.parse(result);
  			if (data.status == 'success') {
  				window.location.href = data.redirect;
  			} else {
  				notify(data.errorMsg, 'notify-red');
  			}
  		}
    });
  }

  // POSTs the register info to server via AJAX
  function register() {
  	$username = $('#username2');
  	$password = $('#password1');

  	$.ajax({
  		url: '../server/register_form.php',
        type: "POST",
  		data: $('form').serialize(),
  		success: function(result) {
  			data = JSON.parse(result);
  			if (data.status == 'success') {
  				window.location.href = data.redirect;
  			} else {
  				notify(data.errorMsg);
  			}
  		}
    });
  }

})(jQuery);
