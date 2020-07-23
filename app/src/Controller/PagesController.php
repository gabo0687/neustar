<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Cache\Cache;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Client;
use App\Controller\CountryController;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    
        public $paginate = [        
            'limit' => 5,
            'order' => [
                'AppsCountries.id' => 'desc'
            ]
        ];
        
        public function initialize()
        {
            parent::initialize();        
            $this->loadComponent('Paginator');
        }
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
  
    
    function index(){
      $this->AppsCountries = TableRegistry::get('AppsCountries');
      $details=$this->AppsCountries->find('all')->hydrate(false);    
      $this->set('countries', $this->paginate($details));
   
      
     
    }
    
    function addcountry(){
      $this->layout = 'ajax';
      $this->autoRender = false;
      $this->AppsCountries = TableRegistry::get('AppsCountries');
      $newAppsCountries = $this->AppsCountries->newEntity();
      $newAppsCountries->TwoCharCountryCode = $_POST['country_code'];
      $newAppsCountries->CountryName = $_POST['country_name'];
      $this->AppsCountries->save($newAppsCountries);
      
    }
    
    function deletecountry(){
      $this->layout = 'ajax';
      $this->autoRender = false;
      
      $id = $_POST['countryId'];
      $this->AppsCountries = TableRegistry::get('AppsCountries');
      $country = $this->AppsCountries->get($id);
      $this->AppsCountries->delete($country);

      
    }
    function countrydetail(){
        $this->layout = 'ajax';
        $nombre = $_POST['CountryCode'];
        // create & initialize a curl session
        $curl = curl_init();

        // set our url with curl_setopt()
        curl_setopt($curl, CURLOPT_URL, "https://restcountries.eu/rest/v2/alpha/".$nombre);

        // return the transfer as a string, also with setopt()
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // curl_exec() executes the started curl session
        // $output contains the output string
        $output = json_decode(curl_exec($curl));
        
        // close curl resource to free up system resources
        // (deletes the variable made by curl_init)
        curl_close($curl);
        
        $country = new CountryController();
        $country->setName($output->name);
        $country->setTopLevelDomain($output->topLevelDomain[0]);
        $country->setCallingCode($output->callingCodes[0]);
        $country->setCapital($output->capital);
        $country->setAltSpelling($output->altSpellings[0]);
        $country->setRegion($output->region);
        $country->setSubRegion($output->subregion);
        $country->setPopulation($output->population);
        $country->setLatitud($output->latlng[0]);
        $country->setLongitud($output->latlng[1]);
        $country->setArea($output->area);
        $country->setCurrency($output->currencies[0]->name);
        $country->setTimezone($output->timezones[0]);
        $country->setLanguages($output->languages[0]->name);
        $country->setFlag($output->flag);
        $response = $country->printCountry();
        $this->set('response',$response);
    }
}

