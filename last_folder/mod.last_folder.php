<?php
/**
 * add-in last folder
 * @author  Clay Harmon
 * returns string with just the last foldername  
 * from a full path of folders
 * 
 */
class Modifier_last_folder extends Modifier
{
   	var $meta = array(
		'name'			 => 'last_folder',
		'version'		 => '1',
		'author'		 => 'Clay Harmon',
		'author_url' => 'http://clayharmon.com'
		);
    
    

    public function index($value, $parameters=array())  
        
       
        {	
	        return( basename( $value) );
	  	        
	        
    	}
    	
}



