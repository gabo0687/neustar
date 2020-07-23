<?php
/*
namespace App\Model\Table;
use Cake\ORM\Table;
use App\Model\Table\DomainTable; 
use Cake\ORM\TableRegistry; 
use Cake\TestSuite\TestCase;
*/
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppsCountriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class AppsCountriesTableTest extends TestCase {
    
    
    public function setUp() { 
        parent::setUp(); 
        $this->AppsCountries = TableRegistry::getTableLocator()->get('AppsCountries'); 
        
    }
   /* public function initialize(array $config)
    {
        $this->primaryKey('id_domain');
        $this->table('domains');
    }*/
}
?>