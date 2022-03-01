<?php

use App\Infrastructure;
use Illuminate\Database\Seeder;

class InfraStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array('id'=>'1','infra_desc'=>'JABATAKATOOMPASH'),
            array('id'=>'2','infra_desc'=>'DRAINAGE'),
            array('id'=>'3','infra_desc'=>'WATERSUPPLY'),
            array('id'=>'4','infra_desc'=>'CONTINGENCIES')
            
        );

        foreach ($aArrayRecord as $aRecord) {
            Infrastructure::firstOrCreate($aRecord);
        }
    }
}
