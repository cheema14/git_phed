<?php

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
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
                    array('id'=>1,'title'=>'ProjectDirector'),
                    array('id'=>2,'title'=>'DeputyDirectorPMU'),
                    array('id'=>3,'title'=>'AssistantProjectDirector'),
                    array('id'=>4,'title'=>'DeputyDirectorCDU'),
                    array('id'=>5,'title'=>'AssistantDirectorCDU'),
                    array('id'=>6,'title'=>'CBMMale'),
                    array('id'=>7,'title'=>'CBMFemale'),
                    array('id'=>8,'title'=>'CDO'),
                );
        
                foreach ($aArrayRecord as $aRecord) {
                    Designation::firstOrCreate($aRecord);
                }
    }
}
