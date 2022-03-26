<?php

$config = array(
  "db_host" => "localhost",
  "db_user" => "root",
  "db_pass" => "",
  "db_name" => "bs_data",
);

$conn = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);


if(!$conn){
  die("Connection error: " . mysqli_error($conn));
}

// Google Login is broken - change back number in vendor/composer/platform_check

// Things to look at or start working on:
// https://mbcoacademy.co.uk/ <- take a look at making a new mbcoacademy website! (after i'm done)
// since the posts page has taken over the what is on the index page - change the index page around a bit & include everythng


// Things that is broken from the loss of sandbox
// index
// Sign UP
// profile search

?>
