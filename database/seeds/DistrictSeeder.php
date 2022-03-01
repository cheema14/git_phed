<?php

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
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
            array('id' => 1, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 1, 'district_name' => 'Lahore'),
            array('id' => 2, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 1, 'district_name' => 'Sheikhupura'),
            array('id' => 3, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 1, 'district_name' => 'Kasur'),
            array('id' => 4, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 1, 'district_name' => 'Nankana Sahib'),
            array('id' => 5, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 2, 'district_name' => 'Gujranwala'),
            array('id' => 6, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 2, 'district_name' => 'Gujrat'),
            array('id' => 7, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 2, 'district_name' => 'Sialkot'),
            array('id' => 8, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 2, 'district_name' => 'Hafizabad'),
            array('id' => 9, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 3, 'district_name' => 'Narowal'),
            array('id' => 10, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 3, 'district_name' => 'M.B. Din'),
            array('id' => 11, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 3, 'district_name' => 'Sargodha'),
            array('id' => 12, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 3, 'district_name' => 'Khushab'),
            array('id' => 13, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 3, 'district_name' => 'Mianwali'),
            array('id' => 14, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 3, 'district_name' => 'Bhakkar'),
            array('id' => 15, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 4, 'district_name' => 'Rawalpindi'),
            array('id' => 16, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 4, 'district_name' => 'Attock'),
            array('id' => 17, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 4, 'district_name' => 'Jehlum'),
            array('id' => 18, 'province_id' => 1, 'zone_id' => 1, 'division_id' => 4, 'district_name' => 'Chakwal'),
            array('id' => 19, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 5, 'district_name' => 'Faisalabad'),
            array('id' => 20, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 5, 'district_name' => 'Jhang'),
            array('id' => 21, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 5, 'district_name' => 'T.T. Singh'),
            array('id' => 22, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 5, 'district_name' => 'Chiniot'),
            array('id' => 23, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 6, 'district_name' => 'Multan'),
            array('id' => 24, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 6, 'district_name' => 'Khanewal'),
            array('id' => 25, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 6, 'district_name' => 'Lodhran'),
            array('id' => 26, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 6, 'district_name' => 'Vehari'),
            array('id' => 27, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 7, 'district_name' => 'Sahiwal'),
            array('id' => 28, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 7, 'district_name' => 'Pak Pattan'),
            array('id' => 29, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 7, 'district_name' => 'Okara'),
            array('id' => 30, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 8, 'district_name' => 'Bahawalpur'),
            array('id' => 31, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 8, 'district_name' => 'Bahawal Nagar'),
            array('id' => 32, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 8, 'district_name' => 'R.Y. Khan'),
            array('id' => 33, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 9, 'district_name' => 'D.G. Khan'),
            array('id' => 34, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 9, 'district_name' => 'Rajanpur'),
            array('id' => 35, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 9, 'district_name' => 'Muzaffar Garh'),
            array('id' => 36, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 9, 'district_name' => 'Layyah'),
            array('id' => 37, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 1, 'district_name' => 'Punjab'),
            array('id' => 38, 'province_id' => 1, 'zone_id' => 2, 'division_id' => 9, 'district_name' => 'D.G. Khan ll'),
        );

        foreach ($aArrayRecord as $aRecord) {
            District::firstOrCreate($aRecord);
        }
    }
}
