<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js"></script>
	<link href="inc/jquery.vector-map/jquery.vector-map.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="inc/jquery.vector-map/jquery.vector-map.js" type="text/javascript"></script>
	<script src="inc/jquery.vector-map/world-en.js" type="text/javascript"></script>
	<script src="inc/jquery.vector-map/usa-en.js" type="text/javascript"></script>
	<script>
		<?php 
			include_once "config.inc";
			$result = mysql_query("select state, count(state) as visited from travel group by state") or die(mysql_error()); 
			while($row = mysql_fetch_array( $result )) {
				$geojson = $geojson."'".strtolower($row['state'])."':".$row['visited'].",";
			}
				echo "var gdpData = {".substr($geojson, 0, -1)."};";
		
		?>
		$(function(){
   			$('#map').vectorMap({
   				map: 'usa_en',
   				backgroundColor: '#fff',
   				color: '#ccc',
   				values: gdpData,
    			scaleColors: ['#4AA5D1', '#2576AC'],
    			normalizeFunction: 'polynomial',
    			hoverOpacity: 0.7,
    			hoverColor: false   				
   			});
		});

	</script>
</head>

<body>
	<div id="map" style="height:500px;"></div>

</body>
</html>