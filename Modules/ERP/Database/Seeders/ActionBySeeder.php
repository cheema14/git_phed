<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\ActionBy;
use Illuminate\Database\Seeder;

class ActionBySeeder extends Seeder
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
            array('id'=>1,'title'=>'RCO'),
            array('id'=>2,'title'=>'Commissioner'),
            array('id'=>3,'title'=>'MPA'),
            array('id'=>4,'title'=>'MNA'),
            array('id'=>5,'title'=>'Directive'),
            array('id'=>6,'title'=>'Others'),
        );

        foreach ($aArrayRecord as $aRecord) {
            ActionBy::firstOrCreate($aRecord);
        }
    }
}
