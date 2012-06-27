<?php

namespace FARpa;
 
use Facebook;
use FacebookApiException;

class FConnection
{
    
    public static $base = 'https://graph.facebook.com/';
    public  $face;
    private $relationships = array(
        'User'  => 'uid',
        'Album' => 'aid',
        'Application' => 'app_id',
    );
    
    public function __construct($face = null)
    {
        if(is_object($face) && get_class($face) == 'Facebook'){
            $this->face = $face;
            return;
        }
        
        if(!is_null($face)){
            throw new FacebookApiException(array(
                'error_description' => 'Impossible connect with '.gettype($face).' class',
                )
            );
        }
        
        $this->configure();
        $config = array(
            'appId'  => F_APP_ID,
            'secret' => F_SECRET,
            'fileUpload' => F_UPLOAD, 
        
        );
        $this->face = new Facebook($config);
    }
    
    private function configure()
    {
        if(!defined('F_APP_ID') || !defined('F_SECRET')){
            throw new FacebookApiException(array(
                'error_description' => 'You needs to set the F_APP_ID and F_SECRET',
                'error_code'        => 0
                )
            );
        }
        
        if(!defined('F_UPLOAD')){
            define('F_UPLOAD',false);
        }
    }
    
         
    
}
