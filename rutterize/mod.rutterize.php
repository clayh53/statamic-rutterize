<?php
/**
 * add-in rutterize
 * @author  Clay Harmon
 * Statamic add-on modifier - accepts text and does 
 * regular expression search and replace for typographic
 * niceties recommended by Richard Rutter in his
 * classic "Elements of Typography on the Web"
 * http://webtypography.net
 * This filter will add html <abbr> tags around groups
 * of three or more uppercase letters in sequence so 
 * that they can be targeted in the CSS 
 * (http://webtypography.net/2.1.6)
 * 
 * and put non-breaking spaces in mathematical and 
 * numerical expressions ( http://webtypography.net/2.4.6 )
 * 
 * 
 */
class Modifier_rutterize extends Modifier
{
   	var $meta = array(
		'name'			 => 'rutterize',
		'version'		 => '1',
		'author'		 => 'Clay Harmon',
		'author_url' => 'http://clayharmon.com'
		);
    
    

    public function index($value, $parameters=array())  
        
       
        {	
	        //wrap strings of consecutive capital letters in <abbr> tag
	        $abbreviation_search = '/\b([A-Z][A-Z0-9]{2,})\b/';
			$abbreviation_replace = '<abbr>$1</abbr>';
			$value = preg_replace($abbreviation_search,$abbreviation_replace,$value);
			
			//insert non-breaking spaces between numbers and subsequent words
			$numbered_word_search = '/([0-9]) ([a-zA-Z])/';
			$numbered_word_replace = '$1&nbsp;$2';
			$value = preg_replace($numbered_word_search,$numbered_word_replace,$value);
	        
	        //insert some spans to target some basic kerning pairs - a capital 'T' followed by
	        //lower case 'o', and capital 'W' followed by lower-case 'a' CSS should have 
	        // .kern {letter-spacing: -0.1em } or flavor to taste
	        $kern_search = '/(T)(o)|(W)(a)/';
			$kern_replace = '<span class="kern">$1$3</span>$2$4';
			$value = preg_replace($kern_search,$kern_replace,$value);
	  	        
	        return $value;
    	}
    	
}



