<?php

class Wordlist extends WordlistModel{

    public static function index()
    {
        
        if (!empty($_POST['sets']))
        {
            $row_header_arr = self::tableTitle($_POST['sets']);
        }

        if (!empty($_POST['word']) && !empty($_POST['letter']))
        {
            
            $table_name = 'words_practice';
            $word = sanitize_text_field( $_POST['word'] );
            $letter = sanitize_text_field( $_POST['letter'] );
            $data = 
            [
                'word' => $word,
                'letter_type' => $letter
            ];
            self::addToDB($table_name, $data);
        }
        
        $words = self::getAll();
        
        include_once plugin_dir_path( __FILE__ ) . '../views/admin/wordlist.php';
    }

    private static function tableTitle($value)
    {
        $arr = [];
        if ($value == 'words')
        {

        }
        else if ($value == 'phrases')
        {

        }
        else if ($value == 'riddles')
        {

        }
       
        return $arr;
    }

    private static function addToDB($table_name, $data)
    {
        global $wpdb;
        $table = $wpdb->prefix. $table_name;
        $insert = $wpdb->insert($table, $data);
    }

}


