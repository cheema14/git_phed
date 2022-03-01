<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\SchemeType;
use Modules\ERP\Entities\Zone;
use Illuminate\Database\Seeder;

class SchemeTypeSeeder extends Seeder
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
            array('id'=>'1','short_desc'=>'Punjab','type_title'=>'PunjabBasis'),
            array('id'=>'2','short_desc'=>'PSDP','type_title'=>'PSDP'),
            array('id'=>'3','short_desc'=>'UWS','type_title'=>'UrbanWaterSupply'),
            array('id'=>'4','short_desc'=>'USD','type_title'=>'UrbanSewerageDrainage'),
            array('id'=>'5','short_desc'=>'RWS','type_title'=>'RuralWaterSupply'),
            array('id'=>'6','short_desc'=>'RSD','type_title'=>'RuralSewerageDrainage'),
            array('id'=>'7','short_desc'=>'ForAid','type_title'=>'FOREIGNAIDED')
            
        );

        foreach ($aArrayRecord as $aRecord) {
            SchemeType::firstOrCreate($aRecord);
        }
    }
}
