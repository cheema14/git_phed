<?php

use App\SuprEngineer;
use Illuminate\Database\Seeder;

class SuprEngineerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ArrayRecord = array(
            array('id' => 1,  'name' => 'Shafiq Ur Rehman','designation'=>'SEPHECircleSahiwal'),
            array('id' => 2,  'name' => 'Anwar Ul Haq Toor','designation'=>'SEPHECircleSargodha'),
            array('id' => 3,  'name' => 'Salman Yusaf','designation'=>'SEPHECircleGujranwala'),
            array('id' => 4,  'name' => 'Raja Shahzad','designation'=>'SEPHECircleLahore'),
            array('id' => 5,  'name' => 'Rafique Saroya','designation'=>'SEPHECircleFaisalabad'),
            array('id' => 6,  'name' => 'Zahoor Ahmed Dogar','designation'=>'SEPHECircleMultan'),
            array('id' => 7,  'name' => 'Ehsan UlHaq Qamar','designation'=>'SEPHECircleDGKhan'),
            array('id' => 8,  'name' => 'Khalid Nadeem Bukhari','designation'=>'SEPHECircleBahawalpur'),
            array('id' => 9,  'name' => 'Qaiser Raza','designation'=>'SEPHECircleRawalpindi'),
        );

        foreach ($ArrayRecord as $aRecord) {
            SuprEngineer::firstOrCreate($aRecord);
        }
    }
}
