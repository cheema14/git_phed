<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\ChiefEngineer;
use Illuminate\Database\Seeder;

class ChiefEngineerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ArrayRecord = array(
            array('id' => 1, 'name' => 'Javed Parwaz','designation'=>'ChiefEngineerPHEDNorth'),
            array('id' => 2, 'name' => 'Rao Qasim','designation'=>'ChiefEngineerPHEDSouth'),
        );
        foreach ($ArrayRecord as $aRecord) {
            ChiefEngineer::firstOrCreate($aRecord);
        }
    }
}
