<?php

class Region extends Eloquent
{
    protected $table = "regions";

    static public function regionNameAsKey($input)
    {
        list($province, $city, $district) = Region::findMany(
            array($input['province_id'], $input['city_id'], 
                  $input['district_id']));

        $regions = array();
        $regions['province'] = $province->name;
        $regions['province_id'] = $province->id;
        $regions['city'] = $city->name;
        $regions['city_id'] = $city->id;
        $regions['district'] = $district->name;
        $regions['district_id'] = $district->id;

        return $regions;
    }
}