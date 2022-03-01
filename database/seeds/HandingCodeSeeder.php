<?php

use App\HandingCode;
use Illuminate\Database\Seeder;

class HandingCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array('id'=>'1','handing_status'=>'AwaitingElectricity'),
            array('id'=>'2','handing_status'=>'UnderTesting'),
            array('id'=>'3','handing_status'=>'ReadyToHandOver'),
            array('id'=>'4','handing_status'=>'HandedOver')
            
        );

        foreach ($aArrayRecord as $aRecord) {
            HandingCode::firstOrCreate($aRecord);
        }
    }
}
