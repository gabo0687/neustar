<?php

namespace App\Model\Table;
use Cake\ORM\Table;

class AppsCountriesTable extends Table {

    public function initialize(array $config)
    {
        $this->setPrimaryKey('id');
        $this->setTable('apps_countries');
    }  
    
}
?>