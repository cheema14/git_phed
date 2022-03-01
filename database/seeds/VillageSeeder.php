<?php
use App\Models\Village;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
                array('id' => 1, 'province_id' => 1 , 'zone_id' => 1 , 'district_id' => 3 ,  
                  'division_id' => 1 , 'tehsil_id' => 53 , 'village_name' => 'Village ABC'
                ),
                array('id' => 2, 'province_id' => 1 , 'zone_id' => 1 , 'district_id' => 4 ,  
                  'division_id' => 1 , 'tehsil_id' => 121 , 'village_name' => 'Village AB'
                ),
                array('id' => 3, 'province_id' => 1 , 'zone_id' => 2 , 'district_id' => 19 ,  
                  'division_id' => 5 , 'tehsil_id' => 28 , 'village_name' => 'Village CV'
                ),
                array('id' => 4, 'province_id' => 1 , 'zone_id' => 2 , 'district_id' => 23 ,  
                  'division_id' => 6 , 'tehsil_id' => 82 , 'village_name' => 'Village VB'
                ),
                array('id' => 5, 'province_id' => 1 , 'zone_id' => 1 , 'district_id' => 6 ,  
                  'division_id' => 2 , 'tehsil_id' => 38 , 'village_name' => 'Village Test'
                ),
                array('id' => 6, 'province_id' => 1 , 'zone_id' => 1 , 'district_id' => 7 ,  
                  'division_id' => 2 , 'tehsil_id' => 125 , 'village_name' => 'Village AYY'
                ),
                array('id' => 7, 'province_id' => 1 , 'zone_id' => 2 , 'district_id' => 20 ,  
                  'division_id' => 5 , 'tehsil_id' => 48 , 'village_name' => 'Village RB'
                ),
                array('id' => 8, 'province_id' => 1 , 'zone_id' => 2 , 'district_id' => 21 ,  
                  'division_id' => 5 , 'tehsil_id' => 131 , 'village_name' => 'Village Chak'
                ),
        );
        foreach ($aArrayRecord as $aRecord) {
            Village::firstOrCreate($aRecord);
        }
    }
}
