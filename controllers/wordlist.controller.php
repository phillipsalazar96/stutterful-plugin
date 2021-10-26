<?php

class Wordlist extends WordlistModel{

    public static function index()
    {
        
        if (!empty($_POST['sets']))
        {
            $row_header_arr = self::tableTitle($_POST['sets']);
        }

        if (!empty($_POST['type']))
        {
            // if statement for data input
            $table_name = self::tableTitle($_POST['type']);
            if (!empty($_POST['type']) && $_POST['type'] === 'words')
            {
                $word = sanitize_text_field( $_POST['word'] );
                $letter = sanitize_text_field( $_POST['letter'] );
                $data = self::tableData($_POST['type'], $_POST['letter'], $_POST['word']);
            }
            else if (!empty($_POST['type']) && $_POST['type'] === 'phrases')
            {
                $word = sanitize_text_field( $_POST['phrase'] );
                $letter = sanitize_text_field( $_POST['letter'] );
                $data = self::tableData($_POST['type'], $_POST['letter'], $_POST['phrase']);
                print_r($data);
            }
            else if (!empty($_POST['type']) && $_POST['type'] === 'riddles')
            {
                $word = sanitize_text_field( $_POST['riddle'] );
                $letter = sanitize_text_field( $_POST['letter'] );
                $data = self::tableData($_POST['type'], $_POST['letter'], $_POST['riddle']);
            }

            print_r($data);
            self::addToDB($table_name, $data);
        }
        
        
        $words = self::getAllWords();
        $phrases = self::getAllPhrases();
        $riddles = self::getAllRiddles();

        include_once plugin_dir_path( __FILE__ ) . '../views/admin/wordlist.php';
    }

    private static function tableTitle($value)
    {
        $table_name = '';
        if ($value == 'words')
        {
            $table_name = 'words_practice';
        }
        else if ($value == 'phrases')
        {
            $table_name = 'phrases_practice';
        }
        else if ($value == 'riddles')
        {
            $table_name = 'riddles_practice';
        }
       
        return $table_name;
    }

    private static function tableData($value, $letter, $lang)
    {
        $data = [];
        if ($value == 'words')
        {
            $data = 
            [
                'word' => $lang,
                'letter_type' => $letter
            ];
        }
        else if ($value == 'phrases')
        {
            $data = 
            [
                'phrase' => $lang,
                'letter_type' => $letter
            ];
        }
        else if ($value == 'riddles')
        {
            $data = 
            [
                'riddle' => $lang,
                'letter_type' => $letter
            ];
        }
       
        return $data;
    }

    private static function addToDB($table_name, $data)
    {
        global $wpdb;
        $table = $wpdb->prefix. $table_name;
        $insert = $wpdb->insert($table, $data);
    }

}


