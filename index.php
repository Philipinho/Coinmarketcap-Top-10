<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css"/>

<meta name="viewport" content="width=device-width",initial-scale=1">

	<?php

require 'cache.php';

$json = file_get_contents('coins.json');

$fetch = json_decode($json, true);

echo "<div class='w3-container w3-center'><h3>CoinMarketCap Top 10</h3></div>";

echo "<table class='w3-table-all'>";

echo "<tr class='w3-green w3-hover-teal' ><th>Rank</th><th>Name</th><th> Symbol</th><th>Price</th></tr>";

foreach($fetch['data'] as $coin) {

	echo "<tr>";

	echo "<td>".$coin['rank']. "</td>";

	echo "<td>".$coin['name']. "</td>";

	echo "<td>".$coin['symbol']."</td>";

	echo "<td>".number_format($coin['quotes']['USD']['price'], 2). "</td>";

	echo "</tr>";

	}

	echo "</table>";

	?>
