<?php

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} 


//header("refresh: 10");

$moi_enable = get_option('moi_enable');


if ( $_SERVER['REQUEST_URI'] == '/wp-admin/edit.php?post_type=shop_order') {
	header("refresh: 5");
}





if ( $moi_enable == 1) {

if ( $_SERVER['REQUEST_URI'] == $moi_vendor_api) {
	header("refresh: $moi_vendor_time");
}


for ($x = 0; $x <= 5; $x++) {

  $req = "moi_req_url".$x;
  $time = "moi_req_time".$x;

  //echo get_option($req) . "Time " . $time ." <br/>";

  //echo get_option($time). "<br/>";

    if ( $_SERVER['REQUEST_URI'] == get_option($req)) {
              $time = get_option($time);
              header("refresh: $time");
    }



  }
}








