<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\SourceNature as ModelsSourceNature;
use Illuminate\Database\Seeder;

class SourceNatureSeeder extends Seeder
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
            array('id' => 1, 'source_nature_title' => 'Advice'),
            array('id' => 2, 'source_nature_title' => 'Directive'),
            array('id' => 3, 'source_nature_title' => 'Summary'),
            array('id' => 4, 'source_nature_title' => 'Note'),
            array('id' => 5, 'source_nature_title' => 'General'),
            array('id' => 6, 'source_nature_title' => 'CSPetition'),
            array('id' => 7, 'source_nature_title' => 'CMComplaint'),
            array('id' => 8, 'source_nature_title' => 'PUC'),
        );
        foreach ($aArrayRecord as $aRecord) {
            ModelsSourceNature::firstOrCreate($aRecord);
        }
    }
}
