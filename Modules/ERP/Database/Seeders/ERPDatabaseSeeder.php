<?php

namespace Modules\ERP\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ERPDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     Model::unguard();

    //     // $this->call("OthersTableSeeder");
    // }
    public function run()
    {
        $this->call(ProvinceSeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(TehsilSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(ActionBySeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(SchemeTypeSeeder::class);
        $this->call(SourceNatureSeeder::class);
        $this->call(TechniqueSeeder::class);
        $this->call(WaterQualitySeeder::class);
        $this->call(WaterSourceSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(FunctionStatusSeeder::class);
        $this->call(ApprovalStatusSeeder::class);
        $this->call(NewRehabSeeder::class);
        $this->call(PpSeeder::class);
        $this->call(NaSeeder::class);
        $this->call(ChiefEngineerSeeder::class);
        $this->call(ExeEngineerSeeder::class);
        $this->call(SdoSeeder::class);
        $this->call(SubEngineerSeeder::class);
        $this->call(SuprEngineerSeeder::class);
        $this->call(ExecutedAgencySeeder::class);
        $this->call(OMBySeeder::class);
        $this->call(SponseredAgencySeeder::class);
        $this->call(UnionCouncilSeeder::class);
        $this->call(VillageSeeder::class);
        $this->call(HandingCodeSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(InfraStructureSeeder::class);
        $this->call(SubHeadSeeder::class);
        $this->call(DetailHeadSeeder::class);
        $this->call(AdminUserSeeder::class);
        
        // $this->call(A::class);
        // $this->call(A::class);
        
    }
}
