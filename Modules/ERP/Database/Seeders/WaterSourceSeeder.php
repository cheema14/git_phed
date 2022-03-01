<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\WaterSource;
use Illuminate\Database\Seeder;

class WaterSourceSeeder extends Seeder
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
            array('id' => 1, 'water_source_title' => 'TUBEWELL'),
            array('id' => 2, 'water_source_title' => 'PERCULATIONWELL'),
            array('id' => 3, 'water_source_title' => 'CANAL'),
            array('id' => 4, 'water_source_title' => 'SPRING'),
            array('id' => 5, 'water_source_title' => 'HANDPUMP'),
            array('id' => 6, 'water_source_title' => 'SMALLDAM'),
        );
        foreach ($aArrayRecord as $aRecord) {
            WaterSource::firstOrCreate($aRecord);
        }
    }
}
