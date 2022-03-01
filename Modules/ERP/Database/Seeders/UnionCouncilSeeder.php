<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\UnionCouncil;
use Illuminate\Database\Seeder;

class UnionCouncilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array('id' => 1, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 ,  

                'district_id' => 16 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 2, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 ,  

                'district_id' => 16 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 3, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 ,  

                'district_id' => 16 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 4, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 ,  

                'district_id' => 16 , 'tehsil_id' => 5 , 'uc_name' => 'UNION01'),
            
            array('id' => 5, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 ,  

                'district_id' => 16 , 'tehsil_id' => 6 , 'uc_name' => 'UNION01'),
            
            array('id' => 6, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 ,  

                'district_id' => 16 , 'tehsil_id' => 4 , 'uc_name' => 'UNION01'),
            
            array('id' => 7, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 8 ,  

                'district_id' => 30 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 8, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 8 ,  

                'district_id' => 30 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 9, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 8 ,  

                'district_id' => 30 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 10, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 8 , 

                'district_id' => 30 , 'tehsil_id' => 4 , 'uc_name' => 'UNION01'),
            
            array('id' => 11, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 8 , 

                'district_id' => 30 , 'tehsil_id' => 5 , 'uc_name' => 'UNION01'),
            
            array('id' => 12, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 8 , 

                'district_id' => 31 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 13, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 8 , 

                'district_id' => 31 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 14, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 8 , 

                'district_id' => 31 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 15, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 8 , 

                'district_id' => 31 , 'tehsil_id' => 4 , 'uc_name' => 'UNION01'),
            
            array('id' => 16, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 8 , 

                'district_id' => 31 , 'tehsil_id' => 5 , 'uc_name' => 'UNION01'),
            
            array('id' => 17, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 3 , 

                'district_id' => 14 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 18, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 3 , 

                'district_id' => 14 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 19, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 3 , 

                'district_id' => 14 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 20, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 3 , 

                'district_id' => 14 , 'tehsil_id' => 4 , 'uc_name' => 'UNION01'),
            
            array('id' => 21, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 , 

                'district_id' => 18 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 22, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 , 

                'district_id' => 18 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 23, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 , 

                'district_id' => 18 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 24, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 , 

                'district_id' => 18 , 'tehsil_id' => 4 , 'uc_name' => 'UNION01'),
            
            array('id' => 25, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 9 , 

                'district_id' => 33 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 26, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 9 , 

                'district_id' => 33 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 27, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 9 , 

                'district_id' => 33 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 28, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 19 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 29, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 19 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 30, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 19 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 31, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 19 , 'tehsil_id' => 4 , 'uc_name' => 'UNION01'),
            
            array('id' => 32, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 19 , 'tehsil_id' => 5 , 'uc_name' => 'UNION01'),
            
            array('id' => 33, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 19 , 'tehsil_id' => 6 , 'uc_name' => 'UNION01'),
            
            array('id' => 34, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 2 , 

                'district_id' => 5 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 35, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 2 , 

                'district_id' => 5 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 36, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 2 , 

                'district_id' => 5 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 37, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 2 , 

                'district_id' => 5 , 'tehsil_id' => 4 , 'uc_name' => 'UNION01'),
            
            array('id' => 38, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 2 , 

                'district_id' => 6 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 39, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 2 , 

                'district_id' => 6 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 40, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 2 , 

                'district_id' => 6 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 41, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 2 , 

                'district_id' => 8 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 42, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 2 , 

                'district_id' => 8 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 43, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 22 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 44, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 22 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 45, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 22 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 46, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 20 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 47, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 20 , 'tehsil_id' => 3 , 'uc_name' => 'UNION01'),
            
            array('id' => 48, 'province_id' => 1 , 'zone_id' => 2 , 'division_id' => 5 , 

                'district_id' => 20 , 'tehsil_id' => 2 , 'uc_name' => 'UNION01'),
            
            array('id' => 49, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 , 

                'district_id' => 17 , 'tehsil_id' => 1 , 'uc_name' => 'UNION01'),
            
            array('id' => 50, 'province_id' => 1 , 'zone_id' => 1 , 'division_id' => 4 , 

                'district_id' => 17 , 'tehsil_id' => 4 , 'uc_name' => 'UNION01'),
        );

    foreach ($aArrayRecord as $aRecord) {
            UnionCouncil::firstOrCreate($aRecord);
        }
    }
}
