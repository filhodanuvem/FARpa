<?php

namespace FARpa; 
require './lib/Facebook/facebook.php';

class FConnection
{
    private static $fcon;
    public static $base = 'https://graph.facebook.com/';
    public $face;
    
    private function __construct()
    {
        $this->configure();
        $config = array(
            'appId'  => F_APP_ID,
            'secret' => F_SECRET,
            'fileUpload' => F_UPLOAD, 
        
        );
        $this->face = new \Facebook($config);
    }
    
    private function configure()
    {
        if(!defined('F_APP_ID') || !defined('F_SECRET')){
            throw new \FacebookApiException(array(
                'error_description' => 'You needs to set the constant for app',
                'error_code'        => 0
                )
            );
        }
        
        if(!defined('F_UPLOAD')){
            define('F_UPLOAD',false);
        }
    }
    
    public static function getConnection()
    {
        if(!isset(self::$fcon)){
            self::$fcon = new self();
        }
        return self::$fcon;
    }
         
    
}
