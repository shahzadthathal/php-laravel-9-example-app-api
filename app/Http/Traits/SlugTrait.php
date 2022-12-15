<?php
namespace App\Http\Traits;


trait SlugTrait {

    public function generateSlug($text, $divider='-'){

        //Replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        //Transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        //Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;

    }
}