<?php

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
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
            array('id' => 1, 'program_name' => 'ADP'),
            array('id' => 2, 'program_name' => 'NON ADP'),
        );

        foreach ($aArrayRecord as $aRecord) {
            Program::firstOrCreate($aRecord);
        }
    }
}
