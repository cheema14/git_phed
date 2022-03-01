<?php

use App\SponseredAgency;
use Illuminate\Database\Seeder;

class SponseredAgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ArrayRecord = array(
            array('id' => 1, 'description' => 'Agency ICI'),
        );
        foreach ($ArrayRecord as $aRecord) {
            SponseredAgency::firstOrCreate($aRecord);
        }
    }
}
