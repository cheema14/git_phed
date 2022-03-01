<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\Sdo;
use Illuminate\Database\Seeder;

class SdoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ArrayRecord = array(
            array('id' => 1,  'name' => 'Abdul Khaliq','designation'=>'SDOPHESubDivJhang'),
            array('id' => 2,  'name' => 'Gulraiz Arshad','designation'=>'SDOPHESubDivPhoolNagar'),
            array('id' => 3,  'name' => 'Qasir Shahbir','designation'=>'SDOPHESubDivMianwali2'),
            array('id' => 4,  'name' => 'Zahoor Ahmad','designation'=>'SDOPHESubDivHafizabad'),
            array('id' => 5,  'name' => 'Muhammad Asif','designation'=>'SDOPHESubDivFatehJang'),
            array('id' => 6,  'name' => 'Hassan Abdal','designation'=>'SDOPHESubDivHassanAbdal'),
            array('id' => 7,  'name' => 'Mir Afzal','designation'=>'SDOPHESubDivJand'),
            array('id' => 8,  'name' => 'PindiGheb','designation'=>'SDOPHESubDivPindiGheb'),
            array('id' => 9,  'name' => 'Hazro','designation'=>'SDOPHESubDivHazro'),
            array('id' => 10, 'name' => 'Shoukat Ali','designation'=>'SDOPHESubDivAhmadPurEast'),
            array('id' => 11, 'name' => 'Mukhtar Ahmad','designation'=>'SDOPHESubDivBahawalpur'),
            array('id' => 12, 'name' => 'Khalid Rasheed','designation'=>'SDOPHESubDivHasilpur'),
            array('id' => 13, 'name' => 'Rana Nadeem Mumtaz','designation'=>'SDOPHESubDivKhairpurTamewali'),
            array('id' => 14, 'name' => 'Abdul Ghaffar','designation'=>'SDOPHESubDivYazman'),
            array('id' => 15, 'name' => 'Rana Dilawar Khan','designation'=>'SDOPHESubDivBahawalnagar'),
            array('id' => 16, 'name' => 'Nadir Leghari','designation'=>'SDOPHESubDivChisthian'),
            array('id' => 17, 'name' => 'Mazhar Hussain','designation'=>'SDOPHESubDivFortabbas'),
            array('id' => 18, 'name' => 'Ali Raza','designation'=>'SDOPHESubDivMinchinabad'),
            array('id' => 19, 'name' => 'Hamid Masood Gondal','designation'=>'SDOPHESubDivBhakkar'),
            array('id' => 20, 'name' => 'Ahmed Khan','designation'=>'SDOPHESubDivDaryaKhan'),
            array('id' => 21, 'name' => 'KalurKot','designation'=>'SDOPHESubDivKalurKot'),
            array('id' => 22, 'name' => 'Mankera','designation'=>'SDOPHESubDivMankera'),
            array('id' => 23, 'name' => 'KallarKahar','designation'=>'SDOPHESubDivKallarKahar'),
            array('id' => 24, 'name' => 'Mr Sajid Ali Shah','designation'=>'SDOPHESubDivChoaSaidanShah'),
            array('id' => 25, 'name' => 'Farooq Ahmad','designation'=>'SDOPHESubDivTalaGang'),
            array('id' => 26, 'name' => 'Abdul Hameed Khosa','designation'=>'SDOPHESubDivDeExcludedDGK'),
            array('id' => 27, 'name' => 'Vacant','designation'=>'SDOPHESubDivTaunsa'),
            array('id' => 28, 'name' => 'Muhammad Imran','designation'=>'SDOPHESubDivChakJhumra'),
            array('id' => 29, 'name' => 'Muhammad Shahbaz','designation'=>'SDOPHESubDivFaisalabadSadar'),
            array('id' => 30, 'name' => 'Riaz Ahmad','designation'=>'SDOPHESubDivJaranwala'),
            array('id' => 31, 'name' => 'Kiran Jameel','designation'=>'SDOPHESubDivSummundri'),
            array('id' => 32, 'name' => 'Mr Walayat Ali','designation'=>'SDOPHESubDivGujranwala'),
            array('id' => 33, 'name' => 'Summaiva Tariq','designation'=>'SDOPHESubDivKamoke'),
            array('id' => 34, 'name' => 'EhsanUllah','designation'=>'SDOPHESubDivWazirabad'),
            array('id' => 35, 'name' => 'Nisar Ahmad','designation'=>'SDOPHESubDivGujrat'),
            array('id' => 36, 'name' => 'Mr Kalil Ur Rehman','designation'=>'SDOPHESubDivSaraiAlamgir'),
            array('id' => 37, 'name' => 'Muhammad Baksh','designation'=>'SDOPHESubDivChiniot'),
            array('id' => 38, 'name' => 'Saqib Fayyaz','designation'=>'SDOPHESubDivLalian'),
            array('id' => 39, 'name' => 'Muhammad Arshad','designation'=>'SDOPHESubDivShorkot'),
            array('id' => 40, 'name' => 'Nabeel','designation'=>'SDOPHESubDivJhelum'),
            array('id' => 41, 'name' => 'Amjad Naveed','designation'=>'SDOPHESubDivPindDadanKhan'),
            array('id' => 42, 'name' => 'Dina','designation'=>'SDOPHESubDivDina'),
            array('id' => 43, 'name' => 'Ahmed Ghulam Qader','designation'=>'SDOPHESubDivChunian'),
            array('id' => 44, 'name' => 'KotRadhaKishan','designation'=>'SDOPHESubDivKotRadhaKishan'),
            array('id' => 45, 'name' => 'Hafeez ur Rehman','designation'=>'SDOPHESubDivKabirwala'),
            array('id' => 46, 'name' => 'Salman Shujah','designation'=>'SDOPHESubDivKhanewal'),
            array('id' => 47, 'name' => 'Anam Iqbal','designation'=>'SDOPHESubDivKhushab'),
            array('id' => 48, 'name' => 'Abdul Majeed','designation'=>'SDOPHESubDivNoorPur'),
            array('id' => 49, 'name' => 'Khadim Hussain','designation'=>'SDOPHESubDivLahoreCantt'),
            array('id' => 50, 'name' => 'Choubara','designation'=>'SDOPHESubDivChoubara'),
        );

        foreach ($ArrayRecord as $aRecord) {
            Sdo::firstOrCreate($aRecord);
        }
    }
}
