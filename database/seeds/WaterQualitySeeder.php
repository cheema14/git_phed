<?php

use App\Models\WaterQuality;
use Illuminate\Database\Seeder;

class WaterQualitySeeder extends Seeder
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
            array('id' => 1, 'water_quality_title' => 'BRAKISH'),
            array('id' => 2, 'water_quality_title' => 'SWEET'),
            array('id' => 3, 'water_quality_title' => 'SALINE'),
            array('id' => 4, 'water_quality_title' => 'CONTAMINATED'),
        );
        foreach ($aArrayRecord as $aRecord) {
            WaterQuality::firstOrCreate($aRecord);
        }
    }
}
