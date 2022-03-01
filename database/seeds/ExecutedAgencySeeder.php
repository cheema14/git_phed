<?php

use App\ExecutedAgency;
use Illuminate\Database\Seeder;

class ExecutedAgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ArrayRecord = array(
            array('id' => 1, 'description' => 'Urban Development'),
            array('id' => 2, 'description' => 'World Bank'),
            array('id' => 3, 'description' => 'Urban Development'),
            array('id' => 4, 'description' => 'Public Health Engineering Department'),
            array('id' => 5, 'description' => 'Punjab Rural Water Supply and Sanitation Project'),
            array('id' => 6, 'description' => 'Punjab Community WaterSupply and Sanitation Project'),
            array('id' => 7, 'description' => 'Federal Governtment'),
            array('id' => 8, 'description' => 'Provincial Governtment'),
            array('id' => 9, 'description' => 'Tehsil Municipal Administration'),
            array('id' => 10, 'description' => 'Community Based Organization'),
            array('id' => 11, 'description' => 'District Government'),
            array('id' => 12, 'description' => 'Others'),
        );

        foreach ($ArrayRecord as $aRecord) {
            ExecutedAgency::firstOrCreate($aRecord);
        }
    }
}
