<?php
function view($filePath, $variables = array(), $print = true)
{
    $path =  plugin_dir_path(__FILE__);
	$filePath = $path.'views/'.$filePath.'.php';
    $output = NULL;
    if(file_exists($filePath)){
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include $filePath;

        // End buffering and return its contents
        $output = ob_get_clean();
    }
    else
    {
    	echo "File not found";
    }
    if ($print) {
        print $output;
    }
    return $output;

} 