<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Test extends Entity
{

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
