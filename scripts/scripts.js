(function($) {

  // POSTs the login info to server via AJAX
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
  				alert(data.errorMsg);
  			}
  		}
      });
  }

})(jQuery);
