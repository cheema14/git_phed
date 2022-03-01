<?php

use App\ExeEngineer;
use Illuminate\Database\Seeder;

class ExeEngineerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ArrayRecord = array(
            array('id' => 1, 'name' => 'Qaisar Rasheed','designation'=>'XENPHEDivisionLahore'),
            array('id' => 2, 'name' => 'MNaeem Akhter','designation'=>'XENPHEDivisionSheikhupura'),
            array('id' => 3, 'name' => 'MAnwar Hussain','designation'=>'XENPHEDivisionKasur'),
            array('id' => 4, 'name' => 'Muhammad Kashif','designation'=>'XENPHEDivisionNankanaSahib'),
            array('id' => 5, 'name' => 'Tanveer Qaiser Sandhu','designation'=>'XENPHEDivisionGujranwala'),
            array('id' => 6, 'name' => 'Muhammad Afzal Tarar','designation'=>'XENPHEDivisionGujrat'),
            array('id' => 7, 'name' => 'Abdul Waheed','designation'=>'XENPHEDivisionSialkot'),
            array('id' => 8, 'name' => 'Muhammad Ahmad','designation'=>'XENPHEDivisionHafizabad'),
            array('id' => 9, 'name' => 'Imran Munir','designation'=>'XENPHEDivisionNarowal'),
            array('id' => 10, 'name' => 'Khadim Hussain','designation'=>'XENPHEDivisionMBDin'),
            array('id' => 11, 'name' => 'AnwarUlHaq Toor','designation'=>'XENPHEDivisionSargodha'),
            array('id' => 12, 'name' => 'Khalid Raza','designation'=>'XENPHEDivisionKhushab'),
            array('id' => 13, 'name' => 'Adnan Zafar','designation'=>'XENPHEDivisionMianwali'),
            array('id' => 14, 'name' => 'Muhammad Saleem Akhter','designation'=>'XENPHEDivisionBhakkar'),
            array('id' => 15, 'name' => 'Shoaib Zia','designation'=>'XENPHEDivisionRawalpindi'),
            array('id' => 16, 'name' => 'Riaz Hussain','designation'=>'XENPHEDivisionAttock'),
            array('id' => 17, 'name' => 'Usman Riaz','designation'=>'XENPHEDivisionJehlum'),
            array('id' => 18, 'name' => 'Muhammad Gohar','designation'=>'XENPHEDivisionChakwal'),
            array('id' => 19, 'name' => 'Muhammad Rafique Saroya','designation'=>'XENPHEDivisionFaisalabad'),
            array('id' => 20, 'name' => 'Muhammad Kashif Fayyaz','designation'=>'XENPHEDivisionJhang'),
            array('id' => 21, 'name' => 'Qaiser Shabir','designation'=>'XENPHEDivisionTTSingh'),
            array('id' => 22, 'name' => 'Faisal Shoukat','designation'=>'XENPHEDivisionChiniot'),
            array('id' => 23, 'name' => 'Jawad Malik','designation'=>'XENPHEDivisionMultan'),
            array('id' => 24, 'name' => 'Nazar Muhammad','designation'=>'XENPHEDivisionKhanewal'),
            array('id' => 25, 'name' => 'Rao Abdul Waheed','designation'=>'XENPHEDivisionLodhran'),
            array('id' => 26, 'name' => 'Ijaz Shah','designation'=>'XENPHEDivisionVehari'),
            array('id' => 27, 'name' => 'Asim Abbas Raza','designation'=>'XENPHEDivisionSahiwal'),
            array('id' => 28, 'name' => 'Ashiq Ali Javed','designation'=>'XENPHEDivisionPakPattan'),
            array('id' => 29, 'name' => 'Muhammad Asadullah Mahar','designation'=>'XENPHEDivisionOkara'),
            array('id' => 30, 'name' => 'Farooq Saddique','designation'=>'XENPHEDivisionBahawalpur'),
            array('id' => 31, 'name' => 'Javed Shakeel','designation'=>'XENPHEDivisionBahawalNagar'),
            array('id' => 32, 'name' => 'Nadeem Abbas','designation'=>'XENPHEDivisionRYKhan'),
            array('id' => 33, 'name' => 'Muhammad Shoaib Fayyaz','designation'=>'XENPHEDivisionDGKhan'),
            array('id' => 34, 'name' => 'Amir Rind','designation'=>'XENPHEDivisionRajanpur'),
            array('id' => 35, 'name' => 'Amjad Saleem','designation'=>'XENPHEDivisionMuzaffarGarh'),
            array('id' => 36, 'name' => 'Amir Sharif','designation'=>'XENPHEDivisionLayyah'),
            array('id' => 37, 'name' => 'Muhammad Nadeem','designation'=>'XENPHEDivisionKhanli'),
        );
        foreach ($ArrayRecord as $aRecord) {
            ExeEngineer::firstOrCreate($aRecord);
        }
    }
}
