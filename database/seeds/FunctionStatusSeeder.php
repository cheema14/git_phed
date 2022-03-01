<?php

use App\Models\FunctionStatus;
use Illuminate\Database\Seeder;

class FunctionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array('id' => 1, 'function_status_title' => 'Functional'),
            array('id' => 2, 'function_status_title' => 'Dysfunctional'),
        );

        foreach ($aArrayRecord as $aRecord) {
            FunctionStatus::firstOrCreate($aRecord);
        }
    }
}
