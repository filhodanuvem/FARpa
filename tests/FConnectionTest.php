<?php

namespace FARpa;
use Facebook;

class FConnectionTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if(!defined('F_APP_ID'))
            define('F_APP_ID','randomkey');
            
        if(!defined('F_SECRET'))
            define('F_SECRET','randomkey');
    }
    
    /**
     * @dataProvider providerConstruct
     */ 
    public function testConstruct($param)
    {
        $fcon = new FConnection($param);
    }
    
    /**
     * @dataProvider providerConstructFail
     * @expectedException FacebookApiException
     */ 
    public function testConstructFail($param)
    {
        $fcon = new FConnection($param);
    }
    
    // provider 
    
    public function providerConstruct()
    {
        
        return array(
            array(new Facebook(array(
                    'appId'  => F_APP_ID,
                    'secret' => F_SECRET,
                    'fileUpload' => F_UPLOAD, 
                )
            )),
            array(new Facebook(array(
                    'appId'  => F_APP_ID,
                    'secret' => F_SECRET,
                )
            )),
            array(null),
        );
    }
    
    public function providerConstructFail()
    {
        return array(
            array(0),
            array('Claudson Oliveira'),
            array(new \stdClass),
        );
    }
    
    
    
}
