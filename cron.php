<?php

include_once "config.inc";

// Load GeoRSS feed
$getfoursquare = "https://feeds.foursquare.com/history/" . $foursquareid . ".rss?count=500";
$xml = simplexml_load_file($getfoursquare);

$travel = $xml->channel->item;

// Parse through results
for ($i = 0; $i < 500; $i++) {

	$title = addslashes($travel[$i]->title);
	$uniqueid =  $travel[$i]->guid;
	$datevisited = strftime("%Y-%m-%d %H:%M:%S", strtotime($travel[$i]->pubDate));
	$geocoordinates = explode(" ",$travel[$i]->children('georss', true)->point);
		$lat = $geocoordinates[0];
		$long = $geocoordinates[1];
	echo $title . "<br>";
	echo $uniqueid . "<br>";
	echo $datevisited . "<br>";
	echo $lat . "<br>";
	echo $long . "<br>";
	
	//Get city and state from Yahoo
	$getyahoomap = "http://where.yahooapis.com/geocode?q=" . $lat . ",+". $long ."&gflags=R&appid=";
	$mapxml = simplexml_load_file($getyahoomap);
	//print_r($mapxml);
	$geocode = $mapxml->Result;
	$city = addslashes($geocode[0]->city);
	$state = $geocode[0]->statecode;
	$country = $geocode[0]->countrycode;

	echo $city . "<br>";
	echo $state . "<br>";	
	echo $country . "<br>";
	echo "<br>";
			
	//Insert new records into database
	mysql_query("INSERT INTO travel
(guid, title, latitude, longitude, dateadded, city, state, country) VALUES('".$uniqueid."', '".$title."', '".$lat."', '".$long."', '".$datevisited."', '".$city."', '".$state."', '".$country."' ) ") 
or die();  

}


?>