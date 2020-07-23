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

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class CountryController extends AppController
{

       public $name;
       public $TopLevelDomain;
       public $CallingCode;
       public $Capital;
       public $AltSpelling;
       public $Region;
       public $SubRegion;
       public $Population;
       public $latitud;
       public $longitud;
       public $area;
       public $timezone;
       public $currency;
       public $languages;
       public $flag;
    
       
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getTopLevelDomain()
    {
        return $this->TopLevelDomain;
    }
    
    public function setTopLevelDomain($TopLevelDomain)
    {
        $this->TopLevelDomain = $TopLevelDomain;
    }
    
    public function getCallingCode()
    {
        return $this->CallingCode;
    }
    
    public function setCallingCode($CallingCode)
    {
        $this->CallingCode = $CallingCode;
    }
    
    public function getCapital()
    {
        return $this->Capital;
    }
    
    public function setCapital($Capital)
    {
        $this->Capital = $Capital;
    }
    
    public function getAltSpelling()
    {
        return $this->AltSpelling;
    }
    
    public function setAltSpelling($AltSpelling)
    {
        $this->AltSpelling = $AltSpelling;
    }
    
    public function getRegion()
    {
        return $this->Region;
    }
    
    public function setRegion($Region)
    {
        $this->Region = $Region;
    }
    
    public function getSubRegion()
    {
        return $this->SubRegion;
    }
    
    public function setSubRegion($SubRegion)
    {
        $this->SubRegion = $SubRegion;
    }
    
    public function getPopulation()
    {
        return $this->Population;
    }
    
    public function setPopulation($Population)
    {
        $this->Population = $Population;
    }
    
    public function getLatitud()
    {
        return $this->latitud;
    }
    
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }
        
    public function getLongitud()
    {
        return $this->longitud;
    }
    
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }
     
    public function getArea()
    {
        return $this->area;
    }
    
    public function setArea($area)
    {
        $this->area = $area;
    }
    
    public function getTimezone()
    {
        return $this->timezone;
    }
    
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }
    
    public function getCurrency()
    {
        return $this->currency;
    }
    
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
    
    public function getLanguages()
    {
        return $this->languages;
    }
    
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }
    
    public function getFlag()
    {
        return $this->flag;
    }
    
    public function setFlag($flag)
    {
        $this->flag = $flag;
    }
    
    public function printCountry(){
        
        $response = '<div class="row"><div class="col-sm"><img width="50px" heigth="50px" src="'.$this->getFlag().'" /></div><div class="col-sm"><label>Name: </label>'.$this->getName().'</div><div class="col-sm"><label>Capital: </label>'.$this->getCapital().'</div></div>';
        $response .= '<div class="row"><div class="col-sm"><label>Language: </label>'.$this->getLanguages().'</div><div class="col-sm"><label>Currency: </label>'.$this->getCurrency().'</div><div class="col-sm"><label>TimeZone: </label>'.$this->getTimezone().'</div></div>';
        $response .= '<div class="row"><div class="col-sm"><label>Area: </label>'.$this->getArea().'</div><div class="col-sm"><label>Lat: </label>'.$this->getLatitud().'</div><div class="col-sm"><label>Long: </label>'.$this->getLongitud().'</div></div>';
        $response .= '<div class="row"><div class="col-sm"><label>Population: </label>'.$this->getPopulation().'</div><div class="col-sm"><label>Region: </label>'.$this->getRegion().'</div><div class="col-sm"><label>SubRegion: </label>'.$this->getSubRegion().'</div></div>';
        $response .= '<div class="row"><div class="col-sm"><label>Alt Spelling: </label>'.$this->getAltSpelling().'</div><div class="col-sm"><label>Calling Code: </label>'.$this->getCallingCode().'</div><div class="col-sm"><label>Top Level Domain: </label>Top Level Domain: '.$this->getTopLevelDomain().'</div></div>';
	
        return $response;
        
    }
    
}

