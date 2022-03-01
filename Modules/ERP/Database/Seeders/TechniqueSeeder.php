<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\Technique as ModelsTechnique;
use Illuminate\Database\Seeder;

class TechniqueSeeder extends Seeder
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
            array('id' => 1, 'technique_title' => 'GRAVITY'),
            array('id' => 2, 'technique_title' => 'PUMPING'),
        );
        foreach ($aArrayRecord as $aRecord) {
            ModelsTechnique::firstOrCreate($aRecord);
        }
    }
}
