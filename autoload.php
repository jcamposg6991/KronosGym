<?php

spl_autoload_register(function($fileName)
{
	if(file_exists('Controllers/'.$fileName.'.php')){
		require 'Controllers/'.$fileName.'.php';

	}elseif(file_exists('Core/'.$fileName.'.php')){
		require 'Core/'.$fileName.'.php';
		
	}elseif(file_exists('Models/'.$fileName.'.php')){
		require 'Models/'.$fileName.'.php';
	}
});

?>