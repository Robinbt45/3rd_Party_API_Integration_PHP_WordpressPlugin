<?php
require_once (__DIR__.'/vendor/autoload.php');

include "Helper.php"; 
 class Page {

	 function comments()
	 {
	 	 return view('comments', array());
	 }

	 function users()
	 {
	 	return view('users', array());
	 }

	 function addProduct()
	 {
	 	return view('addProduct', array());
	 }

	 function products()
	 {
	 	return view('products', array());
	 }

}