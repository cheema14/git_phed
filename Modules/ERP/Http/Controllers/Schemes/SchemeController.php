<?php

namespace Modules\ERP\Http\Controllers\Schemes;

use Modules\ERP\Http\Controllers\Controller;
use Modules\ERP\Entities\Pc;
use Modules\ERP\Entities\Aa;
use Modules\ERP\Entities\Ts;
use Modules\ERP\Entities\Contract;
use Modules\ERP\Entities\Allocation;
use Modules\ERP\Entities\ReleasePnd;
use Modules\ERP\Entities\ReleaseFd;
use Modules\ERP\Entities\MonthlyProgress;
use Modules\ERP\Entities\Visits;
use Modules\ERP\Entities\Enhancement;
use Modules\ERP\Entities\Assets;
use Modules\ERP\Entities\Cbo;
use Modules\ERP\Entities\HhConnections;
use Modules\ERP\Entities\CommunityShare;
use Modules\ERP\Entities\VillageServed;
use Modules\ERP\Entities\Scheme;
use Modules\ERP\Entities\ChiefEngineer;
use Modules\ERP\Entities\SuprEngineer;
use Modules\ERP\Entities\ExeEngineer;
use Modules\ERP\Entities\Sdo;
use Modules\ERP\Entities\SubEngineer;
use Modules\ERP\Entities\ExecutedAgency;
use Modules\ERP\Entities\OMBy;
use Modules\ERP\Entities\SponseredAgency;
use Modules\ERP\Entities\PcDtl;
use Modules\ERP\Entities\TsDtl;
use Modules\ERP\Entities\MpDtl;
use Modules\ERP\Entities\Infrastructure;
use Modules\ERP\Entities\SubHead;
use Modules\ERP\Entities\DetailHead;
use Illuminate\Http\Request;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class SchemeController extends Controller
{
    public function schemes_list(Request $request)
    {


        $data = Scheme::whereNotNull("id");

        $data = $data->paginate($request->length);

        if ($data->count()) {
            foreach ($data as $iKey => $item) {
                $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
            }
        }

        return new DataTableCollectionResource($data);
    }
    public function get_scheme_by_id($id)
    {
        $data = Scheme::with(
            'province:province_name,id',
            'zone:zone_name,id',
            'division:division_name,id',
            'district:district_name,id',
            'program:program_name,id',
            'tehsil:tehsil_name,id',
            'identified_by:title,id',
            'cleared_by:title,id'
        )->find($id);
        // dd($data);
        return $data;
    }
    public function schemes_update(Request $request)
    {
        if ($request['id']) {
            $scheme = Scheme::findOrFail($request['id']);
        } else {
            $scheme = new Scheme();
        }
        $this->validateScheme($request);
        try {

            //Scheme Details
            $scheme->scheme_number = $request['scheme_number'];
            $scheme->scheme_name = $request['scheme_name'];
            $scheme->directive_sr_no = $request['directive_sr_no'];
            $scheme->identified_by_id = $request['identified_by_id'];
            $scheme->recommended_by_id = $request['recommended_by_id'];
            $scheme->program_id = $request['program_id'];
            
            //Area Details
            $scheme->province_id = $request['province_id'];
            $scheme->zone_id = $request['zone_id'];
            $scheme->division_id = $request['division_id'];
            $scheme->district_id = $request['district_id'];
            $scheme->tehsil_id = $request['tehsil_id'];
            $scheme->uc_id = $request['uc_id'];
            $scheme->village_locale = $request['village_locale'];

            //Executing Office Details
            $scheme->chief_engineer_id = $request['chief_engineer_id'];
            $scheme->supr_engineer_id = $request['supr_engineer_id'];
            $scheme->executing_eengineer_id = $request['executing_eengineer_id'];
            $scheme->sdo_id = $request['sdo_id'];
            $scheme->sub_engineer_id = $request['sub_engineer_id'];

            //Disposal
            $scheme->disposal_mode = $request['disposal_mode'];
            $scheme->disposal_type = $request['disposal_type'];
            $scheme->ultimate_disposal = $request['ultimate_disposal'];
            
            //Basic Parameters
            $scheme->type_id = $request['type_id'];
            $scheme->tech_id = $request['tech_id'];
            $scheme->new_rehab_id = $request['new_rehab_id'];
            $scheme->ref_scheme_number = $request['ref_scheme_number'];
            $scheme->area_id = $request['area_id'];
            $scheme->spons_id = $request['spons_id'];
            $scheme->exe_id = $request['exe_id'];
            $scheme->oandm_id = $request['oandm_id'];

            //Water Detail
            $scheme->source_id = $request['source_id'];
            $scheme->quality_id = $request['quality_id'];
            $scheme->nature_id = $request['nature_id'];
            $scheme->wc_gpcd = $request['wc_gpcd'];
            $scheme->population_served = $request['population_served'];

            //Block Details
            $scheme->block_desc = $request['block_desc'];
            $scheme->adp_yr_id = $request['adp_yr_id'];
            
            //Cost of Scheme
            $scheme->proposed_cost = $request['proposed_cost'];
            $scheme->approved_cost = $request['approved_cost'];
            $scheme->ts_cost = $request['ts_cost'];
            $scheme->completion_cost = $request['completion_cost'];
            $scheme->rehab_cost = $request['rehab_cost'];
            
            //Constituency Details
            $scheme->na_id = $request['na_id'];
            $scheme->pp_id = $request['pp_id'];

            //Scheme Details
            $scheme->sch_lat = $request['sch_lat'];
            $scheme->sch_long = $request['sch_long'];
            $scheme->dd_code = $request['dd_code'];
            $scheme->proj_code = $request['proj_code'];
            $scheme->object_code = $request['object_code'];
            
            
            //Status of Scheme
            $scheme->approval_forum = $request['approval_forum'];
            $scheme->approval_status = $request['approval_status'];
            $scheme->completion_forum = $request['completion_forum'];
            $scheme->function_status = $request['function_status'];
            $scheme->handing_code = $request['handing_code'];


            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }

    // Saving sub scheme data API Methods
    public function pc_update(Request $request)
    {
        
        if ($request['id']) {
            $scheme = Pc::findOrFail($request['id']);
        } else {
            $scheme = new Pc();
        }
        //$this->validateScheme($request);
        try {
            $scheme->pc_scheme_idFk = $request['scheme_idFk'];
            $scheme->pc_level = $request['pc_level'];
            $scheme->pc_date = $request['pc_date'];
            $scheme->pc_doc_no = $request['pc_doc_no'];
            $scheme->pc_province_idFk = $request['province_idFk'];
            $scheme->pc_status = $request['pc_status'];
            $scheme->pc_app_code = $request['pc_app_code'];
            $scheme->pc_amount = $request['pc_amount'];
            $scheme->pc_auth = $request['pc_auth'];
            $scheme->pc_remarks = $request['pc_remarks'];
            $scheme->pc_insert_term = $request['pc_insert_term'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }

    public function aa_update(Request $request)
    {
        if ($request['id']) {
            $scheme = aa::findOrFail($request['id']);
        } else {
            $scheme = new aa();
        }
        try {
            $scheme->aa_scheme_idFk = $request['scheme_idFk'];
            $scheme->aa_province_idFk = $request['province_idFk'];
            $scheme->aa_forum_code = $request['aa_forum_code'];
            $scheme->aa_date = $request['aa_date'];
            $scheme->aa_doc_no = $request['aa_doc_no'];
            $scheme->aa_status = $request['aa_status'];
            $scheme->aa_app_code = $request['aa_app_code'];
            $scheme->aa_amount = $request['aa_amount'];
            $scheme->aa_auth = $request['aa_auth'];
            $scheme->aa_remarks = $request['aa_remarks'];
            $scheme->aa_insert_term = $request['aa_insert_term'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }

    public function ts_update(Request $request)
    {
        if ($request['id']) {
            $scheme = Ts::findOrFail($request['id']);
        } else {
            $scheme = new Ts();
        }
        try {
            $scheme->ts_scheme_idFk = $request['scheme_idFk'];
            $scheme->ts_province_idFk = $request['province_idFk'];
            $scheme->ts_date = $request['ts_date'];
            $scheme->ts_doc_no = $request['ts_doc_no'];
            $scheme->ts_status = $request['ts_status'];
            $scheme->ts_app_code = $request['ts_app_code'];
            $scheme->ts_amount = $request['ts_amount'];
            $scheme->ts_auth = $request['ts_auth'];
            $scheme->ts_remarks = $request['ts_remarks'];
            $scheme->ts_insert_term = $request['ts_insert_code'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }

    public function cnt_update(Request $request)
    {
        if ($request['id']) {
            $scheme = Contract::findOrFail($request['id']);
        } else {
            $scheme = new Contract();
        }
        try {
            $scheme->cnt_scheme_idFk = $request['scheme_idFk'];
            $scheme->cnt_province_idFk = $request['province_idFk'];
            $scheme->cnt_code = $request['cnt_code'];
            $scheme->cnt_name = $request['cnt_name'];
            $scheme->cnt_date = $request['cnt_date'];
            $scheme->cnt_accept_no = $request['cnt_accept_no'];
            $scheme->cnt_accept_date = $request['cnt_accept_date'];
            $scheme->cnt_amount = $request['cnt_amount'];
            $scheme->cnt_commence_date = $request['cnt_commence_date'];
            $scheme->cnt_compl_code = $request['cnt_compl_code'];
            $scheme->cnt_status = $request['cnt_status'];
            $scheme->cnt_remarks = $request['cnt_remarks'];
            $scheme->act_compl_date = $request['act_compl_date'];
            $scheme->cnt_insert_term = $request['cnt_insert_term'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }


    public function alo_update(Request $request)
    {
        if ($request['id']) {
            $scheme = Allocation::findOrFail($request['id']);
        } else {
            $scheme = new Allocation();
        }
        try {
            $scheme->alo_scheme_idFk = $request['scheme_idFk'];
            $scheme->alo_province_idFk = $request['province_idFk'];
            $scheme->alo_block_code = $request['alo_block_code'];
            $scheme->alo_adp_year_code = $request['alo_adp_yr_code'];
            $scheme->alo_adp_no = $request['alo_adp_no'];
            $scheme->alo_status = $request['alo_status'];
            $scheme->alo_date = $request['alo_date'];
            $scheme->alo_amount = $request['alo_amount'];
            $scheme->alo_capital = $request['alo_capital'];
            $scheme->alo_revenue = $request['alo_revenue'];
            $scheme->alo_foreign_aid = $request['alo_foreign_aid'];
            $scheme->alo_new_ongoing_code = $request['alo_ongoing_code'];
            $scheme->alo_prog_code = $request['alo_prog_code'];
            $scheme->alo_insert_term = $request['alo_insert_item'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }


    public function rpnd_update(Request $request)
    {
        if ($request['id']) {
            $scheme = ReleasePnd::findOrFail($request['id']);
        } else {
            $scheme = new ReleasePnd();
        }
        try {
            $scheme->rel_scheme_idFk = $request['scheme_idFk'];
            $scheme->rel_province_idFk = $request['province_idFk'];
            $scheme->rel_block_code = $request['rpnd_block_code'];
            $scheme->rel_adp_year_code = $request['rpnd_adp_yr_code'];
            $scheme->rel_adp_no = $request['rpnd_adp_no'];
            $scheme->rel_status = $request['rpnd_status'];
            $scheme->rel_date = $request['rpnd_date'];
            $scheme->rel_amount = $request['rpnd_amount'];
            $scheme->rel_capital = $request['rpnd_capital'];
            $scheme->rel_revenue = $request['rpnd_revenue'];
            $scheme->rel_foreign_aid = $request['rpnd_foreign_aid'];
            $scheme->rel_new_ongoing_code = $request['rpnd_ongoing_code'];
            $scheme->rel_prog_code = $request['rpnd_prog_code'];
            $scheme->rel_hist_flag = $request['rpnd_prog_code'];
            $scheme->rel_insert_term = $request['rpnd_insert_item'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }

    public function rfd_update(Request $request)
    {
        if ($request['id']) {
            $scheme = ReleaseFd::findOrFail($request['id']);
        } else {
            $scheme = new ReleaseFd();
        }
        try {
            $scheme->rel_fd_scheme_idFk = $request['scheme_idFk'];
            $scheme->rel_fd_province_idFk = $request['province_idFk'];
            $scheme->rel_fd_block_code = $request['rfd_block_code'];
            $scheme->rel_fd_adp_year_code = $request['rfd_adp_yr_code'];
            $scheme->rel_fd_adp_no = $request['rfd_adp_no'];
            $scheme->rel_fd_status = $request['rfd_status'];
            $scheme->rel_fd_date = $request['rfd_date'];
            $scheme->rel_fd_amount = $request['rfd_amount'];
            $scheme->rel_fd_capital = $request['rfd_capital'];
            $scheme->rel_fd_revenue = $request['rfd_revenue'];
            $scheme->rel_fd_foreign_aid = $request['rfd_foreign_aid'];
            $scheme->rel_fd_last_updated_term = $request['rfd_last_updated_term'];
            $scheme->rel_fd_prog_code = $request['rfd_prog_code'];
            $scheme->rel_fd_hist_flag = $request['rfd_hist_flag'];
            $scheme->rel_fd_mnth_code = $request['rfd_month_code'];
            $scheme->rel_fd_insert_term = $request['rfd_insert_item'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }


    public function mp_update(Request $request)
    {
        if ($request['id']) {
            $scheme = MonthlyProgress::findOrFail($request['id']);
        } else {
            $scheme = new MonthlyProgress();
        }
        try {
            $scheme->mnth_prog_scheme_idFk = $request['scheme_idFk'];
            $scheme->mnth_prog_province_idFk = $request['province_idFk'];
            $scheme->mnth_prog_month_code = $request['mnth_prog_month_code'];
            $scheme->mnth_prog_year_code = $request['mnth_prog_year_code'];
            $scheme->mnth_prog_phhysical_progress = $request['mnth_prog_phhysical_progress'];
            $scheme->mnth_prog_financial_progress = $request['mnth_prog_financial_progress'];
            $scheme->mnth_prog_remarks = $request['mnth_prog_remarks'];
            $scheme->mnth_prog_last_updated_term = $request['mnth_prog_last_updated_term'];
            $scheme->mnth_prog_fin_upto_year = $request['mnth_prog_fin_year'];
            $scheme->mnth_prog_pre_fin_prog = $request['mnth_prog_fin_prog'];
            $scheme->mnth_prog_submit = $request['mnth_prog_submit'];
            $scheme->mnth_prog_financial_prog_upto = $request['mnth_prog_financial_upto'];
            $scheme->mnth_prog_se_ent_by = $request['mnth_prog_se_ent_by'];
            $scheme->mnth_prog_se_ent_date = $request['mnth_prog_se_ent_date'];
            $scheme->mnth_prog_se_ent_term = $request['mnth_prog_se_ent_term'];
            $scheme->mnth_prog_ce_ent_by = $request['mnth_prog_ce_ent_by'];
            $scheme->mnth_prog_ce_ent_date = $request['mnth_prog_ce_ent_date'];
            $scheme->mnth_prog_ce_ent_term = $request['mnth_prog_ce_ent_term'];
            $scheme->mnth_prog_ce_submit = $request['mnth_prog_ce_submit'];
            $scheme->mnth_prog_hist_flag = $request['mnth_prog_hist_flag'];
            $scheme->mnth_prog_insert_term = $request['mnth_prog_insert_term'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }


    public function visit_update(Request $request)
    {
        if ($request['id']) {
            $scheme = Visits::findOrFail($request['id']);
        } else {
            $scheme = new Visits();
        }
        try {
            $scheme->visit_scheme_idFk = $request['scheme_idFk'];
            $scheme->visit_province_idFk = $request['province_idFk'];
            $scheme->visit_date = $request['visit_date'];
            $scheme->visit_name = $request['visit_name'];
            $scheme->visit_designation = $request['visit_designation'];
            $scheme->visit_inspection_code = $request['visit_inspection_code'];
            $scheme->visit_lat = $request['visit_lat'];
            $scheme->visit_long = $request['visit_long'];
            $scheme->visit_status = $request['visit_status'];
            $scheme->visit_inspection_title = $request['visit_inspection_title'];
            $scheme->visit_vsf_id = $request['visit_vsf_id'];
            $scheme->visit_sch_visit_loc = $request['visit_sch_visit_loc'];
            $scheme->visit_insert_term = $request['visit_insert_term'];
            $scheme->visit_updated_term = $request['visit_updated_term'];
            $scheme->visit_imei_no = $request['visit_imei_no'];
            $scheme->visit_result = $request['visit_result'];
            $scheme->visit_vil_ident = $request['visit_vil_ident'];
            $scheme->visit_vis_off = $request['visit_vis_off'];
            $scheme->visit_hp_sr_no = $request['visit_hp_sr_no'];
            $scheme->visit_remarks_se = $request['visit_remarks_se'];
            $scheme->visit_remarks_ce = $request['visit_remarks_ce'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }


    public function en_update(Request $request)
    {
        if ($request['id']) {
            $scheme = Enhancement::findOrFail($request['id']);
        } else {
            $scheme = new Enhancement();
        }
        try {
            $scheme->enhancement_scheme_idFk = $request['scheme_idFk'];
            $scheme->enhancement_province_idFk = $request['province_idFk'];
            $scheme->enhancement_date = $request['enhancement_date'];
            $scheme->enhancement_amount = $request['enhancement_amount'];
            $scheme->enhancement_auth = $request['enhancement_auth'];
            $scheme->enhancement_doc_no = $request['enhancement_doc_no'];
            $scheme->enhancement_remarks = $request['enhancement_remarks'];
            $scheme->enhancement_status = $request['enhancement_status'];
            $scheme->enhancement_app_code = $request['enhancement_app_code'];
            $scheme->enhancement_insert_term = $request['enhancement_insert_term'];
            $scheme->enhancement_updated_term = $request['enhancement_updated_term'];
            $scheme->enhancement_enh_sr_no = $request['enhancement_enh_sr_no'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }


    public function asset_update(Request $request)
    {
        if ($request['id']) {
            $scheme = Assets::findOrFail($request['id']);
        } else {
            $scheme = new Assets();
        }
        try {
            $scheme->asset_scheme_idFk = $request['scheme_idFk'];
            $scheme->assets_type_code = $request['asset_type_code'];
            $scheme->assets_description = $request['asset_description'];
            $scheme->assets_capacity_unit = $request['asset_capacity_unit'];
            $scheme->assets_insert_term = $request['asset_insert_term'];
            $scheme->assets_updated_term = $request['asset_updated_term'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }


    public function cbo_update(Request $request)
    {
        if ($request['id']) {
            $scheme = Cbo::findOrFail($request['id']);
        } else {
            $scheme = new Cbo();
        }
        try {
            $scheme->cbo_scheme_idFk = $request['scheme_idFk'];
            $scheme->cbo_sr_no = $request['cbo_sr_no'];
            $scheme->cbo_name = $request['cbo_name'];
            $scheme->cbo_designation = $request['cbo_designation'];
            $scheme->cbo_contact_no = $request['cbo_contact_no'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }

    public function hh_update(Request $request)
    {
        if ($request['id']) {
            $scheme = HhConnections::findOrFail($request['id']);
        } else {
            $scheme = new HhConnections();
        }
        try {
            $scheme->hh_connections_scheme_idFk = $request['scheme_idFk'];
            $scheme->hh_connections_sr_no = $request['hh_connections_sr_no'];
            $scheme->hh_connections_owner = $request['hh_connections_owner'];
            $scheme->hh_connections_member = $request['hh_connections_member'];
            $scheme->hh_connections_cell_no = $request['hh_connections_cell_no'];
            $scheme->hh_connections_insert_term = $request['hh_connections_insert_term'];
            $scheme->hh_connections_updated_term = $request['hh_connections_updated_term'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }

    public function cs_update(Request $request)
    {
        if ($request['id']) {
            $scheme = CommunityShare::findOrFail($request['id']);
        } else {
            $scheme = new CommunityShare();
        }
        try {
            $scheme->community_shares_scheme_idFk = $request['scheme_idFk'];
            $scheme->community_shares_deposit_date = $request['community_shares_deposit_date'];
            $scheme->community_shares_dd_no = $request['community_shares_dd_no'];
            $scheme->community_shares_amount = $request['community_shares_amount'];
            $scheme->community_shares_remarks = $request['community_shares_remarks'];
            $scheme->community_shares_insert_term = $request['community_shares_insert_term'];
            $scheme->community_shares_updated_term = $request['community_shares_updated_term'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }

    public function vs_update(Request $request)
    {
        if ($request['id']) {
            $scheme = VillageServed::findOrFail($request['id']);
        } else {
            $scheme = new VillageServed();
        }
        try {
            $scheme->village_served_scheme_idFk = $request['scheme_idFk'];
            $scheme->village_served_vcode = $request['village_served_vcode'];
            $scheme->village_served_vname = $request['village_served_vname'];
            $scheme->village_served_population_nintyeigth = $request['village_served_population_nintyeigth'];
            $scheme->village_served_population_twoeight = $request['village_served_population_twoeight'];
            $scheme->village_served_no_of_houses = $request['village_served_no_of_houses'];
            $scheme->village_served_water_source = $request['village_served_water_source'];
            $scheme->village_served_water_zone = $request['village_served_water_zone'];
            $scheme->village_served_barani_area = $request['village_served_barani_area'];
            $scheme->village_served_contamination = $request['village_served_contamination'];
            $scheme->village_served_remarks = $request['village_served_remarks'];
            $scheme->village_served_insert_term = $request['village_served_insert_term'];
            $scheme->village_served_updated_term = $request['village_served_updated_term'];
            $scheme->village_served_loc_type = $request['village_served_loc_type'];
            $scheme->save();
            return $scheme;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }
    }

    private function validateScheme($request, $id = null)
    {
        $customMessage = [
            'required' => 'This is required field',
        ];

        return $this->validate($request, [
            // 'scheme_number' => 'bail|required',
            'scheme_name' => 'bail|required',
            'program_id' => 'bail|required',
            'province_id' => 'bail|required',
            'zone_id' => 'bail|required',
            'division_id' => 'bail|required',
            'district_id' => 'bail|required',
            'tehsil_id' => 'bail|required',

        ], $customMessage);
    }

    // Fetch sub scheme ID details
    public function get_scheme_sub_details($id){
        
        // $data = Pc::with(
        //     'scheme:scheme_name,id',
        //     'status:approval_status_title,id',
        // )->where()get();

        $data = Pc::with('scheme:scheme_name,id')->where('pc_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_aa($id){
        
        $data = Aa::with('scheme:scheme_name,id')->where('aa_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_ts($id){
        
        $data = Ts::with('scheme:scheme_name,id')->where('ts_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_cnt($id){
        
        $data = Contract::with('scheme:scheme_name,id')->where('cnt_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_alo($id){
        
        $data = Allocation::with('scheme:scheme_name,id')->where('alo_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_rpnd($id){
        
        $data = ReleasePnd::with('scheme:scheme_name,id')->where('rel_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_rfd($id){
        
        $data = ReleaseFd::with('scheme:scheme_name,id')->where('rel_fd_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_mp($id){
        
        $data = MonthlyProgress::with('scheme:scheme_name,id')->where('mnth_prog_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_visit($id){
        
        $data = Visits::with('scheme:scheme_name,id')->where('visit_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_en($id){
        
        $data = Enhancement::with('scheme:scheme_name,id')->where('enhancement_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_asset($id){
        
        $data = Assets::with('scheme:scheme_name,id')->where('asset_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_cbo($id){
        
        $data = Cbo::with('scheme:scheme_name,id')->where('cbo_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_hh($id){
        
        $data = HhConnections::with('scheme:scheme_name,id')->where('hh_connections_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_cs($id){
        
        $data = CommunityShare::with('scheme:scheme_name,id')->where('community_shares_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    public function get_scheme_sub_details_vs($id){
        
        $data = VillageServed::with('scheme:scheme_name,id')->where('village_served_scheme_idFk',$id)->get()->toArray();
        return $data;
    }

    //Get APIs for only sub schemes entries - For edit

    public function get_pc_details($id){
        
        $data = Pc::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_aa_details($id){

        $data = Aa::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_ts_details($id){

        $data = Ts::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_contract_details($id){

        $data = Contract::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_alo_details($id){

        $data = Allocation::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_rpnd_details($id){

        $data = ReleasePnd::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_rfd_details($id){

        $data = ReleaseFd::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_mp_details($id){

        $data = MonthlyProgress::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_visits_details($id){

        $data = Visits::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_en_details($id){

        $data = Enhancement::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_cbo_details($id){

        $data = Cbo::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_assets_details($id){

        $data = Assets::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_hh_details($id){

        $data = HhConnections::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_cs_details($id){

        $data = CommunityShare::where('id',$id)->get()->toArray();
        return $data[0];
    }

    public function get_vs_details($id){

        $data = VillageServed::where('id',$id)->get()->toArray();
        return $data[0];
    }

    //Delete APIs of sub schemes

    public function delete_pc_details($id){

        // $data = Pc::where('id',$id)->destroy();
        $data = Pc::destroy($id);
        if($data){
            return response()->json([
                'msg' => 'Record deleted successfully.',
                'Code' => 200
            ], 200);    
        }
        else{
            return response()->json([
                'msg' => 'Unable to delete Record.',
                'Code' => 404
            ], 500);
        }
        
    }

    public function delete_aa_details($id){

        $data = Aa::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_ts_details($id){

        $data = Ts::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_contract_details($id){

        $data = Contract::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_alo_details($id){

        $data = Allocation::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_rpnd_details($id){

        $data = ReleasePnd::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_rfd_details($id){

        $data = ReleaseFd::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_mp_details($id){

        $data = MonthlyProgress::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_visits_details($id){

        $data = Visits::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_en_details($id){

        $data = Enhancement::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_cbo_details($id){

        $data = Cbo::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_assets_details($id){

        $data = Assets::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_hh_details($id){

        $data = HhConnections::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_cs_details($id){

        $data = CommunityShare::where('id',$id)->delete();
        return $data[0];
    }

    public function delete_vs_details($id){

        $data = VillageServed::where('id',$id)->delete();
        return $data[0];
    }

    public function get_all_scheme_pc_data($id){
        
        $PCdata = $this->get_pc_details($id);
        $scheme_data = $this->get_scheme_by_id($PCdata['pc_scheme_idFk'])->toArray();
        $all_data = array_merge($PCdata,$scheme_data);
        return $all_data;
    }

    public function get_all_scheme_ts_data($id){
        
        $TSdata = $this->get_ts_details($id);
        $scheme_data = $this->get_scheme_by_id($TSdata['ts_scheme_idFk'])->toArray();
        $all_data = array_merge($TSdata,$scheme_data);
        return $all_data;
    }

    public function get_all_scheme_mp_data($id){
        
        $MPdata = $this->get_mp_details($id);
        $scheme_data = $this->get_scheme_by_id($MPdata['mnth_prog_scheme_idFk'])->toArray();
        $all_data = array_merge($MPdata,$scheme_data);
        return $all_data;
    }

    // Get All Engineers List

    public function get_chief_engineers(){

        return ChiefEngineer::orderBy('name', 'ASC')->select('id', 'name as text')->get();
        
    }

    public function get_supr_engineers(){

        return SuprEngineer::orderBy('name', 'ASC')->select('id', 'name as text')->get();
        
    }

    public function get_ex_engineers(){

        return ExeEngineer::orderBy('name', 'ASC')->select('id', 'name as text')->get();
        
    }

    public function get_sdos(){

        return Sdo::orderBy('name', 'ASC')->select('id', 'name as text')->get();
        
    }

    public function get_sb_engineers(){

        return SubEngineer::orderBy('name', 'ASC')->select('id', 'name as text')->get();
        
    }
    
    public function get_executed_by(){

        return ExecutedAgency::orderBy('description', 'ASC')->select('id', 'description as text')->get();
        
    }

    public function get_om_by(){

        return OMBy::orderBy('description', 'ASC')->select('id', 'description as text')->get();
        
    }

    public function get_sponsered_by(){

        return SponseredAgency::orderBy('description', 'ASC')->select('id', 'description as text')->get();
        
    }

    // DTL Validate Methods
    private function validateDTLs($request, $id = null)
    {
        $customMessage = [
            'required' => 'This is required field',
        ];

        return $this->validate($request, [
            // 'scheme_number' => 'bail|required',
            'main_head' => 'bail|required',
            // 'sub_head' => 'bail|required',
            // 'detail_head' => 'bail|required',
            'quantity' => 'bail|required',
            'unit' => 'bail|required',
            'cost' => 'bail|required',

        ], $customMessage);
    }

    // DTL Create APIs
    public function pc_dtl_create(Request $request){

        if ($request['id']) {
            $pc_dtl = PcDtl::findOrFail($request['id']);
        } else {
            $pc_dtl = new PcDtl();
        }
        $this->validateDTLs($request);
        try {

            // PC DTL
            $pc_dtl->scheme_idFk = $request['scheme_id'];
            $pc_dtl->pc_idFk = $request['pc_id'];
            $pc_dtl->main_head = $request['main_head'];
            $pc_dtl->sub_head = $request['sub_head'];
            $pc_dtl->detail_head = $request['detail_head'];
            $pc_dtl->quantity = $request['quantity'];
            $pc_dtl->unit = $request['unit'];
            $pc_dtl->cost = $request['cost'];


            $pc_dtl->save();
            return $pc_dtl;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }

    }

    public function ts_dtl_create(Request $request){
        // dd($request->all());
        if ($request['id']) {
            $ts_dtl = TsDtl::findOrFail($request['id']);
        } else {
            $ts_dtl = new TsDtl();
        }
        $this->validateDTLs($request);
        try {

            // PC DTL
            $ts_dtl->scheme_idFk = $request['scheme_id'];
            $ts_dtl->ts_idFk = $request['ts_id'];
            $ts_dtl->main_head = $request['main_head'];
            $ts_dtl->sub_head = $request['sub_head'];
            $ts_dtl->detail_head = $request['detail_head'];
            $ts_dtl->quantity = $request['quantity'];
            $ts_dtl->unit = $request['unit'];
            $ts_dtl->cost = $request['cost'];


            $ts_dtl->save();
            return $ts_dtl;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }

    }

    public function mp_dtl_create(Request $request){
        // dd($request->all());
        if ($request['id']) {
            $mp_dtl = MpDtl::findOrFail($request['id']);
        } else {
            $mp_dtl = new MpDtl();
        }
        $this->validateDTLs($request);
        try {

            // MP DTL
            $mp_dtl->scheme_idFk = $request['scheme_id'];
            $mp_dtl->mp_idFk = $request['mp_id'];
            $mp_dtl->main_head = $request['main_head'];
            $mp_dtl->sub_head = $request['sub_head'];
            $mp_dtl->detail_head = $request['detail_head'];
            $mp_dtl->quantity = $request['quantity'];
            $mp_dtl->unit = $request['unit'];
            $mp_dtl->cost = $request['cost'];


            $mp_dtl->save();
            return $mp_dtl;
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
                'Code' => $e->getCode(),
                'Line' => $e->getLine(),
                'File' => $e->getFile()
            ], 500);
        }

    }


    // DTL Listing APIs
    public function get_pc_dtls(){

        $data = PcDtl::with(
            'main_head:infra_desc,id',
            'sub_head:sub_head_desc,id',
            'detail_head:detail_head_desc,id'
        )->get();
        
        return $data;
    }

    public function get_ts_dtls(){

        $data = TsDtl::with(
            'main_head:infra_desc,id',
            'sub_head:sub_head_desc,id',
            'detail_head:detail_head_desc,id'
        )->get();
        
        return $data;
    }

    public function get_mp_dtls(){

        $data = MpDtl::with(
            'main_head:infra_desc,id',
            'sub_head:sub_head_desc,id',
            'detail_head:detail_head_desc,id'
        )->get();
        
        return $data;
    }
}
