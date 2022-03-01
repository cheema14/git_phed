<?php

use App\OMBy;
use Illuminate\Database\Seeder;

class OMBySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ArrayRecord = array(
            array('id' => 1, 'description' => 'COMMUNITY'),
            array('id' => 2, 'description' => 'TEHSIL MUNICIPAL ADMINISRATION'),
            array('id' => 3, 'description' => 'PUBLIC HEALTH ENGINEERING DEPARTMENT'),
        );

        foreach ($ArrayRecord as $aRecord) {
            OMBy::firstOrCreate($aRecord);
        }
    }
}
