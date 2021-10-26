<?php

class WordlistModel {
    private $wpdb;
    //private $word_table = $this->$wpdb->prefix . '';

    protected static function getAllWords()
    {
        global $wpdb;
        $word_table = $wpdb->prefix . 'words_practice';
        $words = $wpdb->get_results("SELECT * from $word_table");
        return $words;
    }

    protected static function getAllPhrases()
    {
        global $wpdb;
        $word_table = $wpdb->prefix . 'phrases_practice';
        $phrases = $wpdb->get_results("SELECT * from $word_table");
        return $phrases;
    }

    protected static function getAllRiddles()
    {
        global $wpdb;
        $word_table = $wpdb->prefix . 'riddles_practice';
        $riddles = $wpdb->get_results("SELECT * from $word_table");
        return $riddles;
    }

    protected static function getType($type)
    {
        global $wpdb;
        $word_table = $wpdb->prefix . 'words_practice';
        $words = $wpdb->get_results("SELECT * from $word_table WHERE ");
        return $words;
    }


}