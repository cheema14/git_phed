<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
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
                    array('id' => 1, 'area_title' => 'Sweet'),
                    array('id' => 2, 'area_title' => 'Brackish'),
                    array('id' => 3, 'area_title' => 'Barani'),
                    array('id' => 4, 'area_title' => 'SweetContamina'),
                );
                foreach ($aArrayRecord as $aRecord) {
                    Area::firstOrCreate($aRecord);
                }
    }
}
