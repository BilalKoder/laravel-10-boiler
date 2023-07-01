<?php
namespace App\Traits;

trait SlugTrait{
    
    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        
        // trim
        $text = trim($text, '-');
        
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        
        // lowercase
        $text = strtolower($text);
        
        if (empty($text)) {
            return 'n-a';
        }
        
        return $text;
    }
 
    public function removeSpaces($text){
        $text = preg_replace('~[^\pL\d]+~u', '', $text);
        $text = preg_replace('/\s+/', '', $text);
        return $text;
    }

    public function removeComma($text){
        $text = preg_replace('~[^\pL\d]+~u', '', $text);
        return $text;
    }
    
}