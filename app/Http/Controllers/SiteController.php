<?php

namespace App\Http\Controllers;


require_once(__DIR__ . '/../../../vendor/autoload.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Google_Client; 


class SiteController extends Controller
{

	public function home()
	{
		 return view('site.home');
	}

	public function homea()
	{

		echo " :::::ID TOKEN:::::".$_GET['id_token'];
		echo " :::::::GOOGLE PROJECT/APP CLIENT ID:::::".$_GET['client_id'];

		// Get $id_token via HTTPS POST.

		$client = new Google_Client(['client_id' => $_GET['client_id']]);  // Specify the CLIENT_ID of the app that accesses the backend
		$payload = $client->verifyIdToken($_GET['id_token']);
		if ($payload) {
			  $userid = $payload['sub'];
			  echo " ::::::Google User ID:::::".$userid;

			/*
			  $calendarList = $service->calendarList->listCalendarList();

			while(true) {
			  foreach ($calendarList->getItems() as $calendarListEntry) {
			    echo $calendarListEntry->getSummary();
			  }
			  $pageToken = $calendarList->getNextPageToken();
			  if ($pageToken) {
			    $optParams = array('pageToken' => $pageToken);
			    $calendarList = $service->calendarList->listCalendarList($optParams);
			  } else {
			    break;
			  }
			}
			*/
		  // If request specified a G Suite domain:
		  //$domain = $payload['hd'];
		} else {
		  // Invalid ID token
			echo "invalid token";
		}

		
		 //return view('site.homea');
	}

	public function home1()
	{
		 return view('site.home1');
	}

	public function home2()
	{
		//echo "thanks".$_POST['code'];


		//echo "<pre>";
		//print_r($_POST);
		//return view('site.home1');


		

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://oauth2.googleapis.com/token",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "grant_type=authorization_code&code=".urlencode($_GET['authcode'])."&redirect_uri=".urlencode('http://localhost:8000/home3/')."&client_id=".urlencode('710372425263-ta0o1rgnl0v45c32bna49nvvqhhqbe43.apps.googleusercontent.com')."&client_secret=".urlencode('tXEPL4ZvLmqX05o-cZnfaI1x'),
		  CURLOPT_HTTPHEADER => array(
		    "Accept: */*",
		    "Accept-Encoding: gzip, deflate",
		    "Cache-Control: no-cache",
		    "Connection: keep-alive",
		    "Content-Length: 302",
		    "Content-Type: application/x-www-form-urlencoded",
		    "Host: oauth2.googleapis.com",
		    "Postman-Token: ebe5d063-d0e9-4bb5-8e66-3bdc7e959acf,39104d00-0581-4da6-af52-84beacff01ea",
		    "User-Agent: PostmanRuntime/7.16.3",
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}

	}

	public function home3()
	{

	}

}