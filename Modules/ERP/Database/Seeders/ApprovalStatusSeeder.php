<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\ApprovalStatus as ModelsApprovalStatus;
use Illuminate\Database\Seeder;

class ApprovalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array('id' => 1, 'approval_status_title' => 'Approved'),
            array('id' => 2, 'approval_status_title' => 'Unapproved'),
            array('id' => 3, 'approval_status_title' => 'Rejected'),
            array('id' => 4, 'approval_status_title' => 'Deferred'),
        );

        foreach ($aArrayRecord as $aRecord) {
            ModelsApprovalStatus::firstOrCreate($aRecord);
        }
    }
}
