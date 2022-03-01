<?php

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
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
            array('id'=>1,'zone_id'=>1,'province_id'=>1,'division_name'=>'Lahore'),
            array('id'=>2,'zone_id'=>1,'province_id'=>1,'division_name'=>'Gujranwala'),
            array('id'=>3,'zone_id'=>1,'province_id'=>1,'division_name'=>'Sargodha'),
            array('id'=>4,'zone_id'=>1,'province_id'=>1,'division_name'=>'Rawalpindi'),
            array('id'=>5,'zone_id'=>2,'province_id'=>1,'division_name'=>'Faisalabad'),
            array('id'=>6,'zone_id'=>2,'province_id'=>1,'division_name'=>'Multan'),
            array('id'=>7,'zone_id'=>2,'province_id'=>1,'division_name'=>'Sahiwal'),
            array('id'=>8,'zone_id'=>2,'province_id'=>1,'division_name'=>'Bhahawalpur'),
            array('id'=>9,'zone_id'=>2,'province_id'=>1,'division_name'=>'D.G Khan'),
        );

        foreach ($aArrayRecord as $aRecord) {
            Division::firstOrCreate($aRecord);
        }
    }
}
