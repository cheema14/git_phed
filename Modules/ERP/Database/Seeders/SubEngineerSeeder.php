<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\SubEngineer;
use Illuminate\Database\Seeder;

class SubEngineerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ArrayRecord = array(
            array('id' => 1,  'name' => 'Mr Ali Javed','designation'=>'SubEngineerPHEDivisionKhanewal'),
            array('id' => 2,  'name' => 'VACANT','designation'=>'SubEngineerPHEDivisionVehari'),
            array('id' => 3,  'name' => 'Muhammad Ansar Javid','designation'=>'SubEngineerPHEDivisionVehari'),
            array('id' => 4,  'name' => 'MrMuhammad Tahir Khan','designation'=>'SubEngineerPHEDivisionVehari'),
            array('id' => 5,  'name' => 'Muhammad Bilal','designation'=>'SubEngineerPHEDivisionLodhran'),
            array('id' => 6,  'name' => 'Shafqat Rasool','designation'=>'SubEngineerPHEDivisionLodhran'),
            array('id' => 7,  'name' => 'Nadeem Hassan','designation'=>'SubEngineerPHEDivisionLodhran'),
            array('id' => 8,  'name' => 'Rizwan Sohail','designation'=>'SubEngineerPHEDivisionSahiwal'),
            array('id' => 9,  'name' => 'Kazam Raza','designation'=>'SubEngineerPHEDivisionSahiwal'),
            array('id' => 10, 'name' => 'Niaz Ahmad','designation'=>'SubEngineerPHEDivisionPakPattan'),
            array('id' => 11, 'name' => 'Saeed Ahmad Bhutta','designation'=>'SubEngineerPHEDivisionPakPattan'),
            array('id' => 12, 'name' => 'Muhammad Aamer','designation'=>'SubEngineerPHEDivisionPakPattan'),
            array('id' => 13, 'name' => 'Jahangeer Hassan Azad','designation'=>'SubEngineerPHEDivisionOkara'),
            array('id' => 14, 'name' => 'Abdul Jabbar','designation'=>'SubEngineerPHEDivisionOkara'),
            array('id' => 15, 'name' => 'Asfar Khan','designation'=>'SubEngineerPHEDivisionBahawalpur'),
            array('id' => 16, 'name' => 'Muhammad Arshad','designation'=>'SubEngineerPHEDivisionBahawalpur'),
            array('id' => 17, 'name' => 'Muhammad Munawar','designation'=>'SubEngineerPHEDivisionBahawalpur'),
            array('id' => 18, 'name' => 'Muhammad Bilal Hussain','designation'=>'SubEngineerPHEDivisionBahawalpur'),
            array('id' => 19, 'name' => 'Naveed Khan','designation'=>'SubEngineerPHEDivisionBahawalpur'),
            array('id' => 20, 'name' => 'Jamshaid Ali','designation'=>'SubEngineerPHEDivisionBahawalpur'),
            array('id' => 21, 'name' => 'Ziaul Hassan','designation'=>'SubEngineerPHEDivisionBahawalpur'),
            array('id' => 22, 'name' => 'Khalid Bashir','designation'=>'SubEngineerPHEDivisionBahawalnagar'),
            array('id' => 23, 'name' => 'Irfan Ahmed','designation'=>'SubEngineerPHEDivisionBahawalnagar'),
            array('id' => 24, 'name' => 'Mazhar Hussain','designation'=>'SubEngineerPHEDivisionBahawalnagar'),
            array('id' => 25, 'name' => 'Israr Shafique','designation'=>'SubEngineerPHEDivisionBahawalnagar'),
            array('id' => 26, 'name' => 'Tahir Farooq','designation'=>'SubEngineerPHEDivisionBahawalnagar'),
            array('id' => 27, 'name' => 'Muhammad Nadeem Iqbal','designation'=>'SubEngineerPHEDivisionBahawalnagar'),
            array('id' => 28, 'name' => 'Imran Ali','designation'=>'SubEngineerPHEDivisionBahawalnagar'),
            array('id' => 29, 'name' => 'Muhammad Asif Khan','designation'=>'SubEngineerPHEDivisionBahawalnagar'),
            array('id' => 30, 'name' => 'Mudasar Ilyas','designation'=>'SubEngineerPHEDivisionRYKhan'),
            array('id' => 31, 'name' => 'Muhammad Bilal Arshad','designation'=>'SubEngineerPHEDivisionRYKhan'),
            array('id' => 32, 'name' => 'Rizwan Ahmed','designation'=>'SubEngineerPHEDivisionRYKhan'),
            array('id' => 33, 'name' => 'Habibullah','designation'=>'SubEngineerPHEDivisionDGKhan'),
            array('id' => 34, 'name' => 'Vacant','designation'=>'SubEngineerPHEDivisionDGKhan'),
            array('id' => 35, 'name' => 'Vacant','designation'=>'SubEngineerPHEDivisionDGKhan'),
            array('id' => 36, 'name' => 'Tanvir Ahmad','designation'=>'SubEngineerPHEDivisionRajanpur'),
            array('id' => 37, 'name' => 'Sohail Shahzad','designation'=>'SubEngineerPHEDivisionRajanpur'),
            array('id' => 38, 'name' => 'Zafar Hussain','designation'=>'SubEngineerPHEDivisionMuzaffarGarh'),
            array('id' => 39, 'name' => 'Rana Shahid Naeem','designation'=>'SubEngineerPHEDivisionMuzaffarGarh'),
            array('id' => 40, 'name' => 'Mahir Hasnain','designation'=>'SubEngineerPHEDivisionMuzaffarGarh'),
            array('id' => 41, 'name' => 'Vacant','designation'=>'SubEngineerPHEDivisionMuzaffarGarh'),
            array('id' => 42, 'name' => 'Muhammad Asif Imran','designation'=>'SubEngineerPHEDivisionMuzaffarGarh'),
            array('id' => 43, 'name' => 'Vacant','designation'=>'SubEngineerPHEDivisionLayyah'),
            array('id' => 44, 'name' => 'Akhtar Abbas','designation'=>'SubEngineerPHEDivisionLayyah'),
            array('id' => 45, 'name' => 'Ghazanfar Abbas','designation'=>'SubEngineerPHEDivisionLayyah'),
            array('id' => 46, 'name' => 'Muhammad Imran','designation'=>'SubEngineerPHEDivisionOkara'),
            array('id' => 47, 'name' => 'MrAbdul Razzaq Rana','designation'=>'SubEngineerPHEDivisionRYKhan'),
            array('id' => 48, 'name' => 'Vacant','designation'=>'SubEngineerPHEDivisionKhanewal'),
            array('id' => 49, 'name' => 'Muhammad Mudassar','designation'=>'SubEngineerPHEDivisionSheikhupura'),
            array('id' => 50, 'name' => 'Muhammad Anjum','designation'=>'SubEngineerPHEDivisionSheikhupura'),
        );

        foreach ($ArrayRecord as $aRecord) {
            SubEngineer::firstOrCreate($aRecord);
        }
    }
}
