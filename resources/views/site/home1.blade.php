<!DOCTYPE html>
<!-- The top of file index.html -->
<html itemscope itemtype="http://schema.org/Article">
<head>
  <!-- BEGIN Pre-requisites -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
  </script>
  <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
  <!-- END Pre-requisites -->

    <script>
    function start() {
      gapi.load('auth2', function() {
        auth2 = gapi.auth2.init({
          client_id: '710372425263-ta0o1rgnl0v45c32bna49nvvqhhqbe43.apps.googleusercontent.com',
          // Scopes to request in addition to 'profile' and 'email'
          //scope: 'additional_scope'
        });
      });
    }
  </script>

  <meta name="csrf-token" content="{{ csrf_token() }}" />
 
 </head>
 <body>
 	<!-- Add where you want your sign-in button to render -->
	<!-- Use an image that follows the branding guidelines in a real app -->
	<button id="signinButton">Sign in with Google</button>
	<script>
	  $('#signinButton').click(function() {
	    // signInCallback defined in step 6.
	    auth2.grantOfflineAccess().then(signInCallback);
	  });
	</script>



	<!-- Last part of BODY element in file index.html -->
	<script>
	function signInCallback(authResult) {
	  if (authResult['code']) {

	  	alert("auth code received from google server: " + authResult['code']);
	    // Hide the sign-in button now that the user is authorized, for example:
	    $('#signinButton').attr('style', 'display: none');

	    console.log(authResult);
	    
	    window.location.replace("http://localhost:8000/home2?authcode="+authResult['code']);


/*
	    var pdata = {code: authResult['code']};

	    // Send the code to the server


	    $.ajax({
	      type: 'POST',
	      url: 'http://localhost:8000/storeauthcode',
	      // Always include an `X-Requested-With` header in every AJAX request,
	      // to protect against CSRF attacks.
	      headers: {
	      	'X-Requested-With': 'XMLHttpRequest',
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      },
	      //contentType: 'json',
	      success: function(result) {
	        // Handle or verify the server response.
	        alert("auth code posted to our app server");
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
	      complete: function()
	      {
	      	//alert("complete");
	      },
	      async:false,
	      //processData: false,
	      data: pdata,
	    });
	    */
	  } else {
	    // There was an error.
	    alert("error no auth code received from google server");
	  }
	}

	</script>
 </body>
 </html>