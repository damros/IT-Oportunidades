<?php

function currentUser() {
    return auth()->user();
}

function can( $tag ) {
	
	if ( ! auth()->user() ) {
		return false;
	}
	
	$p = auth()->user()->profile->permissions;
	
	foreach ( $p as $item => $key) {
		if ($key->name == $tag) {
				return true;
		}		
	}
	return false;
	
}

function ratingStar( $rating ) {

	$ret = "no";
	
	switch ( $rating ) {
		case 0:
			$ret = "no";
			break;
		case 1:
			$ret = "one";
			break;
		case 2:
			$ret = "two";
			break;
		case 3:
			$ret = "three";
			break;
		case 4:
			$ret = "four";
			break;
		case 5:
			$ret = "five";
			break;
		default:
			$ret = "no";
			break;
	}
	
	return $ret;
}
