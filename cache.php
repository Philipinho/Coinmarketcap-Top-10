<?php
// To avoid reaching the API limit quickly 
// Caching script by github/erwstout 
// https://gist.github.com/erwstout/13369353c73baf29ef31299d5f14bc49
function write_data_to_file( $filename ) {

	$json = file_get_contents('https://api.coinmarketcap.com/v2/ticker/?limit=10');	$time = time();

	file_put_contents( $filename, $json );

}
// cached file 
$filename = 'coins.json';

if ( file_exists( $filename ) ) {

	$file_time = filemtime( $filename );

	$expire = 120; // Time in seconds to cache the file for

	if ( $file_time < ( time() - $expire ) ) {

		// if expired, overwrite file

		write_data_to_file( $filename );

	}

} else {

	// if file does not exist, write to file

	write_data_to_file( $filename );

}
?>
