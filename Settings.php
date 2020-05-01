<?php
addAction(); 
include 'Page.php'; 
$page = new Page; 

	function addAction()
	{
		add_action	('admin_menu', 'InterviewTask_admin_actions');
	}

    function InterviewTask_admin_actions()
    {
    	add_menu_page("Menu Title", "3rd Party API", 'manage_options', "comments", "comments_callback_function");
    	add_submenu_page("comments", "Custom", 'Comments', "manage_options", "comments", "comments_callback_function");
    	add_submenu_page("comments", "Custom", 'Users', "manage_options", "users", "users_callback_function");
    	add_submenu_page("comments", "Custom", 'Add Product', "manage_options", "addProduct", "add_product_callback_function");
    	add_submenu_page("comments", "Custom", 'Products', "manage_options", "products", "products_callback_function");
	}

	function comments_callback_function()
	{
		global $page; 
		return $page->comments(); 
	}

	function users_callback_function()
	{	
		global $page; 
		return $page->users();
	}

	function add_product_callback_function()
	{	
		global $page; 
		return $page->addProduct();
	}

	function products_callback_function()
	{	
		global $page; 
		return $page->products();
	}