<?php

use App\SubHead;
use Illuminate\Database\Seeder;

class SubHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array('id'=>'1', 'infra_idFk'=> '1' , 'sub_head_desc'=>'PRIMEMOVER'),
            array('id'=>'2', 'infra_idFk'=> '1' , 'sub_head_desc'=>'TRIALBORE'),
            array('id'=>'3', 'infra_idFk'=> '1' , 'sub_head_desc'=>'TUBEWELL'),
            array('id'=>'4', 'infra_idFk'=> '2' , 'sub_head_desc'=>'SULLAGECARRIER'),
            array('id'=>'5', 'infra_idFk'=> '1' , 'sub_head_desc'=>'PUMPINGMACHINERY'),
            array('id'=>'6', 'infra_idFk'=> '1' , 'sub_head_desc'=>'RISINGMAIN'),
            array('id'=>'7', 'infra_idFk'=> '1' , 'sub_head_desc'=>'DISTRIBUTIONSYSTEM'),
            array('id'=>'8', 'infra_idFk'=> '1' , 'sub_head_desc'=>'PUMPHOUSE'),
            array('id'=>'9', 'infra_idFk'=> '1' , 'sub_head_desc'=>'HYPOCHLORINATOR'),
            array('id'=>'10', 'infra_idFk'=> '1',  'sub_head_desc'=>'POWERCONNECTION'),
            array('id'=>'11', 'infra_idFk'=> '2',  'sub_head_desc'=>'SURFACEDRAIN'),
            array('id'=>'12', 'infra_idFk'=> '2',  'sub_head_desc'=>'BRICKPAVEMENT'),
            array('id'=>'13', 'infra_idFk'=> '2',  'sub_head_desc'=>'OXIDATIONPOND'),
            array('id'=>'14', 'infra_idFk'=> '2',  'sub_head_desc'=>'DIESELSULLAGEPUMP'),
            array('id'=>'15', 'infra_idFk'=> '2',  'sub_head_desc'=>'LATRINEBLOCK'),
            array('id'=>'16', 'infra_idFk'=> '1',  'sub_head_desc'=>'OVERHEADRESERVIOR')
            
        );

        foreach ($aArrayRecord as $aRecord) {
            SubHead::firstOrCreate($aRecord);
        }
    }
}
