<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class AppsCountriesFixture extends TestFixture
{
      // Optional. Set this property to load fixtures to a different test datasource
      //public $connection = 'test_neustar';
      public $import = ['table' => 'apps_countries'];
      
      public $fields = [
          'id' => ['type' => 'integer'],
          'CountryName' => ['type' => 'string', 'length' => 50, 'null' => true],
          'TwoCharCountryCode' => ['type' => 'string', 'length' => 2, 'null' => true],
          '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']]
          ]
      ];
      
      public $records = [
          [
              'id' => '50',
              'CountryName' => 'Costa Rica',
              'TwoCharCountryCode' => 'CR'
          ],
          [
             'id' => '51',
             'CountryName' => 'Uruguay',
             'TwoCharCountryCode' => 'UY'
          ]
      ];
 }
