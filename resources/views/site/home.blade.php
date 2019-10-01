<!DOCTYPE html>
<html>

<head>
	<meta name="google-signin-client_id" content="92474155712-60be90rrh9hdg66rll42mfhk8lc6h8sd.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

	<div class="g-signin2" data-onsuccess="onSignIn"></div>

	<p>hi</p>
	<script>

		function onSignIn(googleUser) {
			var profile = googleUser.getBasicProfile();
			console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
			console.log('Name: ' + profile.getName());
			console.log('Image URL: ' + profile.getImageUrl());
			console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
			var id_token = googleUser.getAuthResponse().id_token;
			alert(id_token);
			window.location.replace("http://localhost:8000/homea?id_token="+id_token+"&client_id=92474155712-60be90rrh9hdg66rll42mfhk8lc6h8sd.apps.googleusercontent.com");

			/*
			var pdata = {id_token: id_token, 
						client_id:'92474155712-60be90rrh9hdg66rll42mfhk8lc6h8sd.apps.googleusercontent.com'};
			$.ajax({
				type: 'POST',
				url: 'http://localhost:8000/homea',
				// Always include an `X-Requested-With` header in every AJAX request,
				// to protect against CSRF attacks.
				headers: {
					'X-Requested-With': 'XMLHttpRequest',
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
				async:false,
				//processData: false,
				data: pdata,
				//contentType: 'json',
				success: function(result) {
					// Handle or verify the server response.
					alert("success"+result);
					},
				error: function (jqXHR, exception) {
					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].'+jqXHR;
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					
					if(msg)
						alert("msg"+msg);

					
					},
				complete: function(){
					alert("complete");
				},
	      
	    	});
	    	*/
		  
		}

	</script>



</body>



