<!DOCTYPE html>
<html>

<head>
	<meta name="google-signin-client_id" content="92474155712-60be90rrh9hdg66rll42mfhk8lc6h8sd.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer ></script>
	
	
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
		}

	</script>



</body>
