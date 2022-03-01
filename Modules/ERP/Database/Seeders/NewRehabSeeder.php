<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\NewRehab;
use Illuminate\Database\Seeder;

class NewRehabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array('id' => 1, 'title' => 'NEW'),
            array('id' => 2, 'title' => 'REHABILITATION'),
        );

        foreach ($aArrayRecord as $aRecord) {
            NewRehab::firstOrCreate($aRecord);
        }
    }
}
