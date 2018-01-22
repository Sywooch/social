<?php
namespace app\commands;

use app\models\Area;
use app\models\AreaTranslation;
use app\models\City;
use app\models\CityTranslation;
use app\models\Country;
use app\models\CountryTranslation;
use app\models\I18n;
use yii\console\Controller;
use yii\helpers\FileHelper;

class ParserController extends Controller
{
    private function getCountriesList()
    {
        $list = json_decode(file_get_contents('https://www.mamba.ru/api/location?_=' . time()), true);

        return $list['locationItemList'];
    }

    private function getAreasList($countryID)
    {
        $list = json_decode(file_get_contents('https://www.mamba.ru/api/location/' . $countryID . '?_=' . time()), true);

        return $list['locationItemList'];
    }

    private function getCitiesList($countryID, $areaID)
    {
        $list = json_decode(file_get_contents('https://www.mamba.ru/api/location/'.$countryID.'/'.$areaID.'?_=' . time()), true);

        return $list['locationItemList'];
    }

    /**
     * Импортирует страну.
     *
     * @param $countryData
     */
    private function importCountry($countryData)
    {
        $country = Country::findOne($countryData['id']);
        if (empty($country->id)) {
            $country = new Country();
            $country->id = $countryData['id'];
            $country->save();
        }

        $translation = CountryTranslation::findOne(['sourceID' => $country->id]);
        if (empty($translation->id)) {
            echo '+';
            $translation = new CountryTranslation();
            $translation->sourceID = $country->id;
            $translation->language = 'ru';
            $translation->name = $countryData['name'];
            $translation->save();
        }
    }

    /**
     * Импортирует область.
     *
     * @param $countryData
     * @param $areaData
     */
    private function importArea($countryData, $areaData)
    {
        $area = Area::findOne($areaData['id']);
        if (empty($area->id)) {
            $area = new Area();
            $area->id = $areaData['id'];
            $area->countryId = $countryData['id'];
            $area->save();
        }

        $translation = AreaTranslation::findOne(['sourceID' => $area->id]);
        if (empty($translation->id)) {
            echo '+';
            $translation = new AreaTranslation();
            $translation->sourceID = $area->id;
            $translation->language = 'ru';
            $translation->name = $areaData['name'];
            $translation->save();
        }
    }

    private function importCity($countryData, $areaData, $cityData)
    {
        $city = City::findOne($cityData['id']);
        if (empty($city->id)) {
            $city = new City();
            $city->id = $cityData['id'];
            $city->areaId = $areaData['id'];
            $city->save();
        }

        $translation = CityTranslation::findOne(['sourceID' => $city->id]);
        if (empty($translation->id)) {
            echo '+';
            $translation = new CityTranslation();
            $translation->sourceID = $city->id;
            $translation->language = 'ru';
            $translation->name = $cityData['name'];
            $translation->save();
        }
    }

    /**
     * Старт импорта.
     */
    public function actionImport()
    {
        foreach ($this->getCountriesList() as $countryData) {
            echo $countryData['name'] . ' | ';
            $this->importCountry($countryData);

            foreach ($this->getAreasList($countryData['id']) as $areaData) {
                echo $areaData['name']. ' | ';
                $this->importArea($countryData, $areaData);

                foreach ($this->getCitiesList($countryData['id'], $areaData['id']) as $cityData) {
                    echo $cityData['name'] . "\n";

                    $this->importCity($countryData, $areaData, $cityData);
                }
            }
        }
    }
}
