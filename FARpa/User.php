<?php

namespace FARpa;

class User extends FObject
{
    
    public function getFields()
    {
        return array(
            'pk' => 'uid',
            'name','sex','username','contact_email','about_me','birthday_date','locale',
        );
    }
    
}
