<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array('id'=>'1','short_desc'=>'C','unit_desc'=>'CENTIGRADE'),
            array('id'=>'2','short_desc'=>'F','unit_desc'=>'FORNHEIT'),
            array('id'=>'3','short_desc'=>'No','unit_desc'=>'NUMBER'),
            array('id'=>'4','short_desc'=>'RFT','unit_desc'=>'RUNNINGFOOT'),
            array('id'=>'5','short_desc'=>'SFT','unit_desc'=>'SQUREFOOT'),
            array('id'=>'6','short_desc'=>'CM','unit_desc'=>'CENTIMETER'),
            array('id'=>'7','short_desc'=>'CFT','unit_desc'=>'CUBICFOOT'),
            array('id'=>'8','short_desc'=>'M','unit_desc'=>'METER'),
            array('id'=>'9','short_desc'=>'KG','unit_desc'=>'KILOGRAM'),
            array('id'=>'10','short_desc'=>'MGL','unit_desc'=>'MILIGRAMSPERLITER'),
            array('id'=>'11','short_desc'=>'UMCM','unit_desc'=>'UMCM'),
            array('id'=>'12','short_desc'=>'Rs','unit_desc'=>'Rupees'),
            array('id'=>'13','short_desc'=>'RsinMillion','unit_desc'=>'PakRupeesinMillion'),
            array('id'=>'14','short_desc'=>'USinMillion','unit_desc'=>'USDollarsinMillion')
            
        );

        foreach ($aArrayRecord as $aRecord) {
            Unit::firstOrCreate($aRecord);
        }
    }
}
