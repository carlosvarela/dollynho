<?php
/**
 * @package Hello_Dollynho
 * @version 1.0
 */
/*
Plugin Name: Hello Dollynho!
Plugin URI: http://wordpress.org/plugins/hello-dollynho/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Dollynho e seu amiguinho Matt Mullenweg
Version: 1.0
Author URI: http://facebook.com/dollynhonorole
*/

function hello_dolly_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "Oi pessoal, sou o Dollynho seu amiguinho vamos cantar?
Dolly,Dolly guaraná,
Dolly, o melhor!
Dolly guaraná
O sabor brasileiro
Dolly, Dolly guarána
Dolly, Dolly guarána
O sabor brasileiro
Dolly guarána, Dolly guarána
Dolly guarána, Dolly guarána
Dolly, Dolly, Dolly
Dolly, Dolly, o melhor!
Dolly!

";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dollynho() {
	$chosen = hello_dolly_get_lyric();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dollynho' );

// We need some CSS to position the paragraph
function dolly_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
		color:#fff;
		background:#25c738
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );

?>
