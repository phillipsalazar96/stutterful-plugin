<?php

class WordlistModel {
    private $wpdb;
    //private $word_table = $this->$wpdb->prefix . '';

    protected static function getAll()
    {
        global $wpdb;
        $word_table = $wpdb->prefix . 'words_practice';
        $words = $wpdb->get_results("SELECT * from $word_table");
        return $words;
    }

}