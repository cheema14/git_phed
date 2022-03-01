<?php

namespace Modules\ERP\Database\Seeders;

use Modules\ERP\Entities\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create court types
        $aArrayRecord = array(
            array('id'=>1,'province_name'=>'Punjab','no_of_districts'=>'36'),
            array('id'=>2,'province_name'=>'Balochistan','no_of_districts'=>'30'),
            array('id'=>3,'province_name'=>'Sindh','no_of_districts'=>'23'),
            array('id'=>4,'province_name'=>'Khayber Pakhtoonkhawa','no_of_districts'=>'24'),
            array('id'=>5,'province_name'=>'AJK','no_of_districts'=>'8'),
            array('id'=>6,'province_name'=>'Gilgit Baltistan','no_of_districts'=>'7'),
        );

        foreach ($aArrayRecord as $aRecord) {
            Province::firstOrCreate($aRecord);
        }
    }
}
