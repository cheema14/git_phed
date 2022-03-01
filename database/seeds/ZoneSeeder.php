<?php

use App\Models\Zone;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
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
            array('id'=>1,'province_id'=>1,'zone_name'=>'North zone'),
            array('id'=>2,'province_id'=>1,'zone_name'=>'South zone'),
        );

        foreach ($aArrayRecord as $aRecord) {
            Zone::firstOrCreate($aRecord);
        }
    }
}
