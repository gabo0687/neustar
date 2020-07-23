<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         1.2.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Test\TestCase\Controller;

use App\Controller\PagesController;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * PagesControllerTest class
 */
class PagesControllerTest extends IntegrationTestCase
{
    /**
     * testMultipleGet method
     *
     * @return void
     */
    
    public $fixtures = ['app.AppsCountries'];
    
    public function testMultipleGet()
    {
        $this->get('/');
        $this->assertResponseOk();
        $this->get('/');
        $this->assertResponseOk();
    }

    /**
     * testDisplay method
     *
     * @return void
     */
    public function testDisplay()
    {
        $this->get('/pages/index');
        $this->assertResponseOk();
        //$this->assertResponseContains('CakePHP');
        $this->assertResponseContains('<html>');
    }

    /**
     * Test that missing template renders 404 page in production
     *
     * @return void
     */
    public function testMissingTemplate()
    {
        Configure::write('debug', false);
        $this->get('/pages/default');

        $this->assertResponseError();
        $this->assertResponseContains('Error');
    }
    
    /**
     * Test Country insert in DB
     */
    public function testAddCountry() {

        $this->AppsCountries = TableRegistry::get('AppsCountries');
        $country = $this->AppsCountries->find()->first();
        
        $country_code = $country->TwoCharCountryCode;
        $country_name = $country->CountryName;
        
        $test = new PagesController();
        $response = $test->addcountries($country_code, $country_name);
         //fwrite(STDERR, var_dump($response, TRUE)); 
        $this->assertTrue($response);
    }
    
    /**
     * Test Country insert in DB
     */
    public function testEditCountry() {

        $this->AppsCountries = TableRegistry::get('AppsCountries');
        $country = $this->AppsCountries->find()->first();
        
        $country_id = $country->id;
        $country_code = $country->TwoCharCountryCode;
        $country_name = $country->CountryName;
        
        $test = new PagesController();
        $response = $test->editcountries($country_id,$country_code, $country_name);
         //fwrite(STDERR, var_dump($response, TRUE)); 
        $this->assertTrue($response);
    }
    
    /**
     * Test Country Delete in DB
     */
    public function testDeleteCountry() {

        $this->AppsCountries = TableRegistry::get('AppsCountries');
        $country = $this->AppsCountries->find()->first();
        
        $country_id = $country->id;
        
        $test = new PagesController();
        $response = $test->deletecountries($country_id);
         //fwrite(STDERR, var_dump($response, TRUE)); 
        $this->assertTrue($response);
    }
    
    
}
