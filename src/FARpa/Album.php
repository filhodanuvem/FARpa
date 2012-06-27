<?php

namespace FARpa;

class Album extends FObject
{
    public function getFields()
    {
        return array(
            'pk' =>  'aid',
            'owner', 'name'
        );
    }
}
