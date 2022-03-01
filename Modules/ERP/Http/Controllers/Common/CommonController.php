<?php

namespace Modules\ERP\Http\Controllers\Common;

use Modules\ERP\Http\Controllers\Controller;
use Modules\ERP\Entities\ActionBy;
use Modules\ERP\Entities\ApprovalStatus;
use Modules\ERP\Entities\Province;
use Modules\ERP\Entities\Zone;
use Modules\ERP\Entities\Division;
use Modules\ERP\Entities\District;
use Modules\ERP\Entities\Tehsil;
use Modules\ERP\Entities\Program;
use Modules\ERP\Entities\UnionCouncil;
use Modules\ERP\Entities\Village;
use Modules\ERP\Entities\SchemeType;
use Modules\ERP\Entities\Technique;
use Modules\ERP\Entities\NewRehab;
use Modules\ERP\Entities\Area;
use Modules\ERP\Entities\FunctionStatus;
use Modules\ERP\Entities\Na;
use Modules\ERP\Entities\Pp;
use Modules\ERP\Entities\WaterQuality;
use Modules\ERP\Entities\WaterSource;
use Modules\ERP\Entities\SourceNature;
use Modules\ERP\Entities\Year;
use Modules\ERP\Entities\Month;
use Modules\ERP\Entities\Completion;
use Modules\ERP\Entities\Funding;
use Modules\ERP\Entities\Material;
use Modules\ERP\Entities\HandingCode;
use Modules\ERP\Entities\Unit;
use Modules\ERP\Entities\Infrastructure;
use Modules\ERP\Entities\SubHead;
use Modules\ERP\Entities\DetailHead;
use Modules\ERP\Entities\ChiefEngineer;
use Modules\ERP\Entities\ExeEngineer;
use Modules\ERP\Entities\SubEngineer;
use Modules\ERP\Entities\Sdo;
use Modules\ERP\Entities\SuprEngineer;
use Modules\ERP\Entities\SponseredAgency;
use Modules\ERP\Entities\ExecutedAgency;
use Modules\ERP\Entities\OMBy;
use Modules\ERP\Entities\SchemeNature;
use Illuminate\Http\Request;

use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

use Validator;

// Custom Rule
use Modules\ERP\Rules\LimitNACode;

class CommonController extends Controller
{
        public function modules_list()
        {
        }

        public function get_province()
        {       
                return Province::orderBy('id', 'ASC')->select('id', 'province_name as text','no_of_districts','province_desc','dept_name')->get();
        }


        public function get_province_name($province_id)
        {
                return Province::where([
                        'id' => $province_id
                ])->orderBy('province_name', 'ASC')->select('id', 'province_name as name')->get();
        }

        public function get_zone($province_id = null)
        {
                // dd(($province_id));
                if ($province_id) {
                        return Zone::where([
                                'province_id' => $province_id
                        ])->orderBy('zone_name', 'ASC')->select('id', 'zone_name as text')->get();
                } else {
                        return Zone::orderBy('zone_name', 'ASC')->select('id', 'zone_name as text')->get();
                }
        }

        public function get_zone_self_details($zone_id)
        {
                if ($zone_id) {
                        return Zone::where([
                                'id' => $zone_id
                        ])->orderBy('zone_name', 'ASC')->select('id', 'zone_name as text')->get();
                } else {
                        return response()->json([
                                'Error' => 'Request not Found!',
                                'Code' => '404',
                        ], 500);
                }
        }

        public function get_division($zone_id = null)
        {
                if($zone_id){
                       return Division::where([
                        'zone_id' => $zone_id
                ])->orderBy('division_name', 'ASC')->select('id', 'division_name as text')->get();
                }else
                        return Division::orderBy('division_name', 'ASC')->select('id', 'division_name as text')->get();
        }

        public function get_division_self_details($division_id)
        {
                if($division_id){
                       return Division::where([
                        'id' => $division_id
                ])->orderBy('division_name', 'ASC')->select('id', 'division_name as text')->get();
                }else{
                        return response()->json([
                                'Error' => 'Request not Found!',
                                'Code' => '404',
                        ], 500);
                }
        }
        

        public function get_district($division_id = null)
        {
                
                if($division_id)
                return District::where([
                        'division_id' => $division_id
                ])->orderBy('district_name', 'ASC')->select('id', 'district_name as text')->get();
                else
                return District::orderBy('district_name', 'ASC')->select('id', 'district_name as text')->get();
        }

        public function get_district_by_zone($zone_id = null)
        {
                
                if($zone_id)
                return District::where([
                        'zone_id' => $zone_id
                ])->orderBy('district_name', 'ASC')->select('id', 'district_name as text')->get();
                else
                return District::orderBy('district_name', 'ASC')->select('id', 'district_name as text')->get();
        }

        public function get_district_self_details($district_id)
        {
                if($district_id){
                       return District::where([
                        'id' => $district_id
                ])->orderBy('district_name', 'ASC')->select('id', 'district_name as text')->get();
                }else{
                        return response()->json([
                                'Error' => 'Request not Found!',
                                'Code' => '404',
                        ], 500);
                }
        }

        public function get_tehsil($district_id = null)
        {
                if($district_id)
                return Tehsil::where([
                        'district_id' => $district_id
                ])->orderBy('tehsil_name', 'ASC')->select('id', 'tehsil_name as text')->get();
                else
                return Tehsil::orderBy('tehsil_name', 'ASC')->select('id', 'tehsil_name as text')->get();
        }

        public function get_tehsil_self_details($tehsil_id = null)
        {
                if($tehsil_id)
                return Tehsil::where([
                        'id' => $tehsil_id
                ])->orderBy('tehsil_name', 'ASC')->select('id', 'tehsil_name as text')->get();
                else{
                        return response()->json([
                                'Error' => 'Request not Found!',
                                'Code' => '404',
                        ], 500);
                }
        }

        public function get_ucs($uc_id = null)
        {
                if($uc_id)
                return UnionCouncil::where([
                        'id' => $uc_id
                ])->orderBy('uc_name', 'ASC')->select('id', 'uc_name as text')->get();
                else
                return UnionCouncil::orderBy('uc_name', 'ASC')->select('id as uc_id', 'uc_name as text')->get();
        }
        
        public function get_villages($district_id = null)
        {
                if($district_id)
                return Village::where([
                        'district_id' => $district_id
                ])->orderBy('village_name', 'ASC')->select('id', 'village_name as text')->get();
                else
                return Village::orderBy('village_name', 'ASC')->select('id', 'village_name as text')->get();
        }

        public function get_program()
        {
                return Program::orderBy('program_name', 'ASC')->select('id', 'program_name as text')->get();
        }

        public function get_action_by()
        {
                return ActionBy::orderBy('title', 'ASC')->select('id', 'title as text')->get();
        }

        public function get_chief_engineer()
        {
                return ActionBy::orderBy('title', 'ASC')->select('id', 'title as text')->get();
        }

        public function sendError($error, $data = [], $code = 404)
        {
                if(is_array($error)){
                        $error = implode(",", $error);
                }

                if(is_object($error)){
                        $error = implode(",", $error->all());
                }
                
                $response = [
                                'code' => $code,
                'success' => false,
                'error' => $error,
                ];

                if(empty($error)){
                        unset($response['error']);
                }

                if(!empty($data)){
                        $response['data'] = $data;
                }

                return response()->json($response, $code);
        }

        public function sendResponse($message, $result, $custom_param_name = null, $custom_param_value = null)
        {
                if(!empty($custom_param_name)){
                $response = [
                        'code' => 200,
                        'success' => true,
                        'message' => $message,
                        'data'    => $result,
                        $custom_param_name => $custom_param_value
                ];
                } else {
                $response = [
                        'code' => 200,
                        'success' => true,
                        'message' => $message,
                        'data'    => $result,

                ];
                }

                return response()->json($response, 200);
        }

        public function get_province1111(){

                $response = Province::orderBy('province_name', 'ASC')->select('id', 'province_name as text')->get();
                return $this->sendResponse('Province Data.' , $response);
        }

        public function get_scheme_types(){

                return SchemeType::orderBy('type_title', 'ASC')->select('id', 'type_title as text')->get();
        }
        
        public function get_techniques(){

                return Technique::orderBy('technique_title', 'ASC')->select('id', 'technique_title as text')->get();
        }
        
        public function get_new_rehabs(){

                return NewRehab::orderBy('title', 'ASC')->select('id', 'title as text')->get();
        }
        
        public function get_areas(){

                return Area::orderBy('area_title', 'ASC')->select('id', 'area_title as text')->get();
        }
                
        public function get_approval_status(){

                return ApprovalStatus::orderBy('approval_status_title', 'ASC')->select('id', 'approval_status_title as text')->get();
        }
                
        public function get_function_status(){

                return FunctionStatus::orderBy('function_status_title', 'ASC')->select('id', 'function_status_title as text')->get();
        }

        public function get_na($na_id = null){
                
                if($na_id){
                        return Na::where([
                                'id' => $na_id
                        ])->orderBy('id', 'ASC')->select('id', 'mna_name as text')->get()->toArray();
                }
                return Na::orderBy('id', 'ASC')->select('id','mna_name','na_code','na_name','contact_no', 'short_description as text')->get();
        }

        public function get_pp($pp_id = null){
                
                // $data = Pp::select('id', 'mpa_name as text')->with(
                //         'Na:na_code,na_name,id',
                //     )->where([
                //         'id' => $pp_id
                // ])->get()->toArray();
                // $data = Pp::with(
                //         'Na:na_code,id',
                //     )->get();

                if($pp_id){
                        // return Pp::where([
                        //         'id' => $pp_id
                        // ])->orderBy('mpa_name', 'ASC')->select('id', 'mpa_name as text')->get()->toArray();
                        return Pp::select('id', 'mpa_name as text')->with(
                                'Na:na_code,na_name,id',
                            )->where([
                                'id' => $pp_id
                        ])->orderBy('id', 'ASC')->get()->toArray();
                }
                $data = Pp::with(
                        'Na:short_description,id',
                    )->orderBy('id', 'ASC')->get();
                    return $data;
                // return Pp::select('id','pp_code','pp_name','mpa_name','contact_no', 'short_description as text')->with('Na:na_code,na_name,id')->get();

                // return Pp::orderBy('short_description', 'ASC')->select('id','pp_code','pp_name','mpa_name','contact_no', 'short_description as text')->get();
        }

        public function get_water_source(){

                return WaterSource::orderBy('water_source_title', 'ASC')->select('id', 'water_source_title as text')->get();
        }

        public function get_water_quality(){

                return WaterQuality::orderBy('water_quality_title', 'ASC')->select('id', 'water_quality_title as text')->get();
        }

        public function get_source_nature(){

                return SourceNature::orderBy('source_nature_title', 'ASC')->select('id', 'source_nature_title as text')->get();
        }

        public function get_handing_code(){

                return HandingCode::orderBy('handing_status', 'ASC')->select('id', 'handing_status as text')->get();
        }

        public function get_units(){

                return Unit::orderBy('unit_desc', 'ASC')->select('id', 'unit_desc as text')->get();
        }


        public function get_main_head(){

                return Infrastructure::orderBy('infra_desc', 'ASC')->select('id', 'infra_desc as text')->get();
        }

        public function get_sub_head($main_head_id = null){
                
                if ($main_head_id) {
                        return SubHead::where([
                                'infra_idFk' => $main_head_id
                        ])->orderBy('id', 'ASC')->select('id', 'sub_head_desc as text')->get();
                } else {
                        return SubHead::orderBy('id', 'ASC')->select('id', 'sub_head_desc as text')->get();
                }

        }

        public function get_detail_head($sub_head_id=null){
                // echo $sub_head_id;die;
                if ($sub_head_id) {
                        return DetailHead::where([
                                'sub_head_idFk' => $sub_head_id
                        ])->orderBy('created_at', 'DESC')->select('id', 'detail_head_desc as text')->get();
                } else {
                        return DetailHead::orderBy('created_at', 'DESC')->select('id', 'detail_head_desc as text')->get();
                }


        }

        /* 
            Calls for saving CRUs (Create,Read,Update)
            for system
            
            Location,Constituency,Executing Office,Period Codes,
            Status,Infrastructure Codes,General Codes
        
        */

        // All validation calls are listed below

        private function validateProvince($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                'digits_between' => 'This field requires only 2 digit number or 1 digit at least',
                ];

                return $this->validate($request, [
                'province_name' => 'bail|required',
                'province_description' => 'string',
                'department_name' => 'string',
                'no_of_districts' => 'digits_between:1,2',

                ], $customMessage);
        }

        private function validateZone($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                ];

                return $this->validate($request, [
                'province_id' => 'bail|required',
                'zone_name' => 'string',

                ], $customMessage);
        }

        private function validateDivision($request,$id=null){
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                ];

                return $this->validate($request, [
                'province_id' => 'bail|required|numeric|gt:0',
                'zone_id' => 'required|numeric|gt:0',
                'division_name' => 'required|string',
                'division_description' => 'string',

                ], $customMessage);  
        }

        private function validateDistrict($request,$id=null){
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                ];

                return $this->validate($request, [
                'province_id' => 'bail|required|numeric|gt:0',
                'zone_id' => 'required|numeric|gt:0',
                'division_id' => 'required|numeric|gt:0',
                'district_name' => 'required|string',
                'population_nighty_eight' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'population_zero_eight' => 'required|regex:/^\d+(\.\d{1,2})?$/',

                ], $customMessage);  
        }

        private function validateTehsil($request,$id=null){
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                ];

                return $this->validate($request, [
                'province_id' => 'bail|required|numeric|gt:0',
                'zone_id' => 'required|numeric|gt:0',
                'division_id' => 'required|numeric|gt:0',
                'district_id' => 'required|numeric|gt:0',
                'tehsil_name' => 'required|string',
                'population_nighty_eight' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'annual_growth' => 'required|regex:/^\d+(\.\d{1,2})?$/',

                ], $customMessage);  
        }

        private function validateUnion($request,$id=null){
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                ];

                return $this->validate($request, [
                'province_id' => 'bail|required|numeric|gt:0',
                'zone_id' => 'required|numeric|gt:0',
                'division_id' => 'required|numeric|gt:0',
                'district_id' => 'required|numeric|gt:0',
                'tehsil_id' => 'required|numeric|gt:0',
                'uc_name' => 'required|string',
                'uc_no' => 'numeric|gt:0',
                'population_nighty_eight' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'population_zero_eight' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                ], $customMessage);  
        }

        private function validateNA($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                'digits_between' => 'This field requires only 2 digit number or 1 digit at least',
                ];

                return $this->validate($request, [
                'na_name' => 'bail|required|string',
                'mna_name' => 'string',
                'contact_no' => 'string',
                'na_code' => 'string',

                ], $customMessage);
        }
        
        private function validatePP($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                'digits_between' => 'This field requires only 2 digit number or 1 digit at least',
                ];

                return $this->validate($request, [
                'pp_name' => 'bail|required|string',
                'mpa_name' => 'string',
                'contact_no' => 'string',
                'pp_code' => 'string',
                'zone_id' => 'required|numeric|gt:0',
                'district_id' => 'required|numeric|gt:0',
                'na_id' => ['required','numeric',new LimitNACode],

                ], $customMessage);
        }

        private function validateCE($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                'integer' => 'This field requires integer only',
                ];

                return $this->validate($request, [
                'province_idFk' => 'bail|required|integer',
                'zone_idFk' => 'required|integer',
                'name' => 'required|string',
                'designation' => 'required|string',

                ], $customMessage);
        }

        private function validateSE($request, $id = null)
        {
                $customMessage = [
                        'required' => 'This is required field',
                        'string' => 'This field requires string only',
                        'integer' => 'This field requires integer only',
                        ];
        
                        return $this->validate($request, [
                        'province_idFk' => 'bail|required|integer',
                        'zone_idFk' => 'required|integer',
                        'division_idFk' => 'required|integer',
                        'ce_idFk' => 'required|integer',
                        'name' => 'bail|required|string',
                        'designation' => 'string',
        
                        ], $customMessage);
        }

        private function validateEE($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                'integer' => 'This field requires integer only',
                ];

                return $this->validate($request, [
                'province_idFk' => 'bail|required|integer',
                'zone_idFk' => 'required|integer',
                'division_idFk' => 'required|integer',
                'district_idFk' => 'required|integer',
                'chief_engineer_idFk' => 'required|integer',
                'supr_engineer_idFk' => 'required|integer',
                'name' => 'bail|required|string',
                'designation' => 'string',

                ], $customMessage);
        }

        private function validateSub($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                'integer' => 'This field requires integer only',
                ];

                return $this->validate($request, [
                'province_idFk' => 'bail|required|integer',
                'zone_idFk' => 'required|integer',
                'division_idFk' => 'required|integer',
                'district_idFk' => 'required|integer',
                'tehsil_idFk' => 'required|integer',
                'ce_idFk' => 'required|integer',
                'se_idFk' => 'required|integer',
                'ee_idFk' => 'required|integer',
                'sdo_idFk' => 'required|integer',
                'name' => 'bail|required|string',
                'designation' => 'string',

                ], $customMessage);
        }

        private function validateSDO($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                'integer' => 'This field requires integer only',
                ];

                return $this->validate($request, [
                'province_idFk' => 'bail|required|integer',
                'zone_idFk' => 'required|integer',
                'division_idFk' => 'required|integer',
                'district_idFk' => 'required|integer',
                'tehsil_idFk' => 'required|integer',
                'ce_idFk' => 'required|integer',
                'se_idFk' => 'required|integer',
                'ee_idFk' => 'required|integer',
                'name' => 'bail|required|string',
                'designation' => 'string',

                ], $customMessage);
        }

        private function validateYear($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'code' => 'bail|required|max:4',
                'description' => 'string',
                ], $customMessage);
        }

        private function validateMonth($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'code' => 'bail|required|max:2|between:1,12',
                'description' => 'string',
                'short_description' => 'string',
                ], $customMessage);
        }

        private function validateApprovalStatus($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'approval_status_title' => 'required|string',
                ], $customMessage);
        }

        private function validateFundingStatus($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'funding_status' => 'required|string',
                ], $customMessage);
        }

        private function validateCompletionStatus($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'completion_status' => 'required|string',
                ], $customMessage);
        }

        private function validateFunctionalStatus($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'function_status_title' => 'required|string',
                ], $customMessage);
        }

        private function validateMainHead($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'infra_desc' => 'required|string',
                ], $customMessage);
        }

        private function validateSubHead($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'sub_head_desc' => 'required|string',
                'infra_idFk' => 'required|numeric|gt:0',
                ], $customMessage);
        }

        private function validateDetailHead($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'detail_head_desc' => 'required|string',
                'sub_head_idFk' => 'required|numeric|gt:0',
                ], $customMessage);
        }

        private function validateMaterial($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'material_desc' => 'required|string',
                ], $customMessage);
        }

        private function validateUnit($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'short_desc' => 'required|string',
                'unit_desc' => 'required|string',
                ], $customMessage);
        }

        private function validatSAgency($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'short_description' => 'required|string',
                'description' => 'required|string',
                ], $customMessage);
        }

        private function validatEAgency($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'short_description' => 'required|string',
                'description' => 'required|string',
                ], $customMessage);
        }

        private function validatWQuality($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'water_quality_title' => 'required|string',
                ], $customMessage);
        }

        private function validatTechnical($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'technique_title' => 'required|string',
                ], $customMessage);
        }

        private function validatSNature($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'description' => 'required|string',
                ], $customMessage);
        }

        private function validatOM($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'description' => 'required|string',
                ], $customMessage);
        }

        private function validatWSource($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'water_source_title' => 'required|string',
                ], $customMessage);
        }

        private function validatArea($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'area_title' => 'required|string',
                ], $customMessage);
        }

        private function validatSType($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                ];

                return $this->validate($request, [
                'short_desc' => 'required|string',
                'type_title' => 'required|string',
                ], $customMessage);
        }

        // Calls for storing Location Codes
        public function create_province(Request $request){

                if ($request['id']) {
                        $province_dtl = Province::findOrFail($request['id']);
                    } else {
                        $province_dtl = new Province();
                    }
                    $this->validateProvince($request);
                    try {
            
                        // PC DTL
                        $province_dtl->province_name = $request['province_name'];
                        $province_dtl->province_desc = $request['province_desc'];
                        $province_dtl->dept_name = $request['dept_name'];
                        $province_dtl->no_of_districts = $request['no_of_districts'];
                        
                        $province_dtl->save();
                        return $province_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function create_zone(Request $request){

                if ($request['id']) {
                        $zone_dtl = Zone::findOrFail($request['id']);
                    } else {
                        $zone_dtl = new Zone();
                    }
                    $this->validateZone($request);
                    try {
            
                        // PC DTL
                        $zone_dtl->province_id = $request['province_id'];
                        $zone_dtl->zone_name = $request['zone_name'];
                        
                        $zone_dtl->save();
                        return $zone_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function create_division(Request $request){

                if ($request['id']) {
                        $division_dtl = Division::findOrFail($request['id']);
                    } else {
                        $division_dtl = new Division();
                    }
                    $this->validateDivision($request);
                    try {
            
                        // PC DTL
                        $division_dtl->province_id = $request['province_id'];
                        $division_dtl->zone_id = $request['zone_id'];
                        $division_dtl->division_name = $request['division_name'];
                        $division_dtl->division_description = $request['division_description'];
                        
                        $division_dtl->save();
                        return $division_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function create_district(Request $request){

                if ($request['id']) {
                        $district_dtl = District::findOrFail($request['id']);
                    } else {
                        $district_dtl = new District();
                    }
                    $this->validateDistrict($request);
                    try {
            
                        // PC DTL
                        $district_dtl->province_id = $request['province_id'];
                        $district_dtl->zone_id = $request['zone_id'];
                        $district_dtl->division_id = $request['division_id'];
                        $district_dtl->district_name = $request['district_name'];
                        $district_dtl->population_nighty_eight = $request['population_nighty_eight'];
                        $district_dtl->population_zero_eight = $request['population_zero_eight'];
                        
                        $district_dtl->save();
                        return $district_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function create_tehsil(Request $request){

                if ($request['id']) {
                        $tehsil_dtl = Tehsil::findOrFail($request['id']);
                    } else {
                        $tehsil_dtl = new Tehsil();
                    }
                    $this->validateTehsil($request);
                    try {
            
                        $tehsil_dtl->province_id = $request['province_id'];
                        $tehsil_dtl->zone_id = $request['zone_id'];
                        $tehsil_dtl->division_id = $request['division_id'];
                        $tehsil_dtl->district_id = $request['district_id'];
                        $tehsil_dtl->tehsil_name = $request['tehsil_name'];
                        $tehsil_dtl->population_nighty_eight = $request['population_nighty_eight'];
                        $tehsil_dtl->annual_growth = $request['annual_growth'];
                        
                        $tehsil_dtl->save();
                        return $tehsil_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function create_union(Request $request){

                if ($request['id']) {
                        $union_dtl = UnionCouncil::findOrFail($request['id']);
                    } else {
                        $union_dtl = new UnionCouncil();
                    }
                    $this->validateUnion($request);
                    try {
            
                        $union_dtl->province_id = $request['province_id'];
                        $union_dtl->zone_id = $request['zone_id'];
                        $union_dtl->division_id = $request['division_id'];
                        $union_dtl->district_id = $request['district_id'];
                        $union_dtl->tehsil_id = $request['tehsil_id'];
                        $union_dtl->uc_no = $request['uc_no'];
                        $union_dtl->uc_name = $request['uc_name'];
                        $union_dtl->population_nighty_eight = $request['population_nighty_eight'];
                        $union_dtl->population_zero_eight = $request['population_zero_eight'];
                        
                        $union_dtl->save();
                        return $union_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        // Calls for fetching Location Codes
        public function get_province_details($province_id){
                                
                $data = Province::where('id',$province_id)->get()->toArray();
                return $data[0];
        }
        
        public function get_zone_list(){
                $data = Zone::with(
                        'province:province_name,id',
                    )->orderBy('province_id', 'ASC')->orderBy('id', 'ASC')->get();
                    return $data;
                // return Zone::orderBy('created_at', 'DESC')->select('id', 'zone_name as text','province_id')->get();
                  
        }


        public function get_zone_details($zone_id){

                $data = Zone::where('id',$zone_id)->get()->toArray();
                return $data[0];
        }

        public function get_division_list(){

                $data = Division::with(
                        'province:province_name,id',
                        'zone:zone_name,id',
                    )->orderBy('province_id', 'ASC')->orderBy('zone_id', 'ASC')->orderBy('id', 'ASC')->get();
                return $data;
                // return Division::orderBy('created_at', 'DESC')->select('id', 'division_name','province_id','zone_id','division_description')->get();
                  
        }

        public function get_division_details($division_id){

                // if($division_id)
                // return Division::where([
                //         'id' => $division_id
                // ])->orderBy('division_name', 'ASC')->select('id', 'division_name as text')->get();
                // else
                // return Division::orderBy('division_name', 'ASC')->select('id', 'division_name as text')->get();

                $data = Division::where('id',$division_id)->get()->toArray();
                return $data[0];
                
        }

        public function get_district_list(){
                $data = District::with(
                        'province:province_name,id',
                        'zone:zone_name,id',
                        'division:division_name,id',
                    )->orderBy('id', 'ASC')->get();
                return $data;
                // return District::orderBy('created_at', 'DESC')->select('id', 'district_name','province_id','zone_id','division_id','population_nighty_eight','population_zero_eight')->get();
                  
        }

        public function get_district_details($district_id){

                $data = District::where('id',$district_id)->get()->toArray();
                return $data[0];
        }

        public function get_tehsil_list(){

                $data = Tehsil::with(
                        'province:province_name,id',
                        'zone:zone_name,id',
                        'division:division_name,id',
                        'district:district_name,id',
                    )->orderBy('id', 'ASC')->get();
                return $data;

                // return Tehsil::orderBy('created_at', 'DESC')->select('id', 'tehsil_name','province_id','zone_id','division_id','district_id','population_nighty_eight','annual_growth')->get();
                  
        }

        public function get_tehsil_details($tehsil_id){

                $data = Tehsil::where('id',$tehsil_id)->get()->toArray();
                return $data[0];
        }
        
        public function get_union_list(){

                $data = UnionCouncil::with(
                        'province:province_name,id',
                        'zone:zone_name,id',
                        'division:division_name,id',
                        'district:district_name,id',
                        'tehsil:tehsil_name,id',
                    )->orderBy('province_id', 'ASC')->orderBy('zone_id', 'ASC')->orderBy('division_id', 'ASC')->orderBy('district_id', 'ASC')->orderBy('tehsil_id', 'ASC')->get();
                return $data;

                return UnionCouncil::orderBy('id', 'ASC')->select('id', 'uc_name','province_id','zone_id','division_id','district_id','tehsil_id','population_nighty_eight','population_zero_eight')->get();
                  
        }

        public function get_union_details($union_id){

                $data = UnionCouncil::where('id',$union_id)->get()->toArray();
                return $data[0];
        }


        // Calls for fetching Constituency
        
        public function create_na(Request $request){

                if ($request['id']) {
                        $na_dtl = Na::findOrFail($request['id']);
                    } else {
                        $na_dtl = new Na();
                    }
                    $this->validateNA($request);
                    try {
            
                        $na_dtl->na_name = $request['na_name'];
                        $na_dtl->na_code = $request['na_code'];
                        $na_dtl->mna_name = $request['mna_name'];
                        $na_dtl->contact_no = $request['contact_no'];
                        
                        $na_dtl->save();
                        return $na_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }
        public function get_na_details($na_id){

                $data = Na::where('id',$na_id)->get()->toArray();
                return $data[0];
        }

        public function create_pp(Request $request){
                
                
                if ($request['id']) {
                        $pp_dtl = Pp::findOrFail($request['id']);
                    } else {
                        $pp_dtl = new Pp();
                    }
                    $this->validatePP($request);
                    
                    try {
                        
                        $pp_dtl->pp_name = $request['pp_name'];
                        $pp_dtl->pp_code = $request['pp_code'];
                        $pp_dtl->mpa_name = $request['mpa_name'];
                        $pp_dtl->contact_no = $request['contact_no'];
                        $pp_dtl->zone_id = $request['zone_id'];
                        $pp_dtl->district_id = $request['district_id'];
                        $pp_dtl->na_id = $request['na_id'];
                        
                        // Check if PP registered against the posted NA ID are greater than 2
                        
                        $pp_dtl->save();
                        return $pp_dtl;
                        // $check = $this->check_total_pp_against_na($request['na_id']);
                        // if($check < 2){
                        // }
                        // return response()->json([
                        //         'Error' => 'This NA has already 2 PP constituency registered against it.',
                        //         'Code' => '404',
                        // ], 500);
                        
                    } catch (\Exception $e) {
                        
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
                
        }

        public function get_pp_details($pp_id){

                $data = Pp::where('id',$pp_id)->get()->toArray();
                return $data[0];
        }

        public function check_total_pp_against_na($na_id){

                $data = Pp::where('na_id',$na_id)->get()->count();
                if($data > 2){
                        return false;
                }
                return true;
        }


        // Calls for Executing Office Details

        public function create_ce(Request $request){
                if ($request['id']) {
                        $ce_dtl = ChiefEngineer::findOrFail($request['id']);
                    } else {
                        $ce_dtl = new ChiefEngineer();
                    }
                    $this->validateCE($request);
                    try {
            
                        $ce_dtl->name = $request['name'];
                        $ce_dtl->designation = $request['designation'];
                        $ce_dtl->province_idFk = $request['province_idFk'];
                        $ce_dtl->zone_idFk = $request['zone_idFk'];
                        
                        $ce_dtl->save();
                        return $ce_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500); 
        }

        public function create_se(Request $request){
                if ($request['id']) {
                        $se_dtl = SuprEngineer::findOrFail($request['id']);
                    } else {
                        $se_dtl = new SuprEngineer();
                    }
                    $this->validateSE($request);
                    try {
                        // dd($request);
                        $se_dtl->name = $request['name'];
                        $se_dtl->ce_idFk = $request['ce_idFk'];
                        $se_dtl->province_idFk = $request['province_idFk'];
                        $se_dtl->zone_idFk = $request['zone_idFk'];
                        $se_dtl->division_idFk = $request['division_idFk'];
                        
                        $se_dtl->save();
                        return $se_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500); 
        }

        public function create_ee(Request $request){
                if ($request['id']) {
                        $ee_dtl = ExeEngineer::findOrFail($request['id']);
                    } else {
                        $ee_dtl = new ExeEngineer();
                    }
                    $this->validateEE($request);
                    try {
            
                        $ee_dtl->name = $request['name'];
                        $ee_dtl->designation = $request['designation'];
                        $ee_dtl->province_idFk = $request['province_idFk'];
                        $ee_dtl->zone_idFk = $request['zone_idFk'];
                        $ee_dtl->division_idFk = $request['division_idFk'];
                        $ee_dtl->district_idFk = $request['district_idFk'];
                        $ee_dtl->chief_engineer_idFk = $request['chief_engineer_idFk'];
                        $ee_dtl->supr_engineer_idFk = $request['supr_engineer_idFk'];
                                                
                        $ee_dtl->save();
                        return $ee_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500); 
        }

        public function create_sdo(Request $request){
                if ($request['id']) {
                        $sdo_dtl = Sdo::findOrFail($request['id']);
                    } else {
                        $sdo_dtl = new Sdo();
                    }
                    $this->validateSDO($request);
                    try {
            
                        $sdo_dtl->name = $request['name'];
                        $sdo_dtl->designation = $request['designation'];
                        $sdo_dtl->ce_idFk = $request['ce_idFk'];
                        $sdo_dtl->se_idFk = $request['se_idFk'];
                        $sdo_dtl->ee_idFk = $request['ee_idFk'];
                        $sdo_dtl->province_idFk = $request['province_idFk'];
                        $sdo_dtl->zone_idFk = $request['zone_idFk'];
                        $sdo_dtl->division_idFk = $request['division_idFk'];
                        $sdo_dtl->district_idFk = $request['district_idFk'];
                        $sdo_dtl->tehsil_idFk = $request['tehsil_idFk'];
                        
                        $sdo_dtl->save();
                        return $sdo_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500); 
        }

        public function create_sub(Request $request){
                if ($request['id']) {
                        $sub_dtl = SubEngineer::findOrFail($request['id']);
                    } else {
                        $sub_dtl = new SubEngineer();
                    }
                    $this->validateSub($request);
                    try {
            
                        $sub_dtl->name = $request['name'];
                        $sub_dtl->designation = $request['designation'];
                        $sub_dtl->province_idFk = $request['province_idFk'];
                        $sub_dtl->zone_idFk = $request['zone_idFk'];
                        $sub_dtl->division_idFk = $request['division_idFk'];
                        $sub_dtl->district_idFk = $request['district_idFk'];
                        $sub_dtl->tehsil_idFk = $request['tehsil_idFk'];
                        $sub_dtl->ce_idFk = $request['ce_idFk'];
                        $sub_dtl->se_idFk = $request['se_idFk'];
                        $sub_dtl->ee_idFk = $request['ee_idFk'];
                        $sub_dtl->sdo_idFk = $request['sdo_idFk'];
                        

                        $sub_dtl->save();
                        return $sub_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500); 
        }

        public function get_ce_list(Request $request){
                

                if($request['zone_id']){
                        return ChiefEngineer::where([
                                'zone_idFk' => $request['zone_id']
                        ])->orderBy('id', 'ASC')->select('id', 'name as text')->get();    
                }
                // dd("not inside if");
                return ChiefEngineer::with('province:province_name,id',
                'zone:zone_name,id')->orderBy('id', 'ASC')->get();
                // return ChiefEngineer::orderBy('created_at', 'DESC')->select('id', 'name','designation')->get();
                  
        }

        public function get_se_list(Request $request){

                if($request['division_id']){
                        return SuprEngineer::where([
                                'division_idFk' => $request['division_id']
                        ])->orderBy('id', 'ASC')->select('id', 'name as text')->get();    
                }

                return SuprEngineer::with('province:province_name,id',
                'zone:zone_name,id','division:division_name,id','chiefEngineer:name,id')->orderBy('ce_idFk', 'ASC')->orderBy('id', 'ASC')->get();
                // return SuprEngineer::orderBy('created_at', 'DESC')->select('id', 'name','designation')->get();
                  
        }

        public function get_ee_list(Request $request){
                
                if($request['district_id']){
                        return ExeEngineer::where([
                                'district_idFk' => $request['district_id']
                        ])->orderBy('id', 'ASC')->select('id', 'name as text')->get();    
                }

                return ExeEngineer::with('province:province_name,id',
                'zone:zone_name,id','division:division_name,id','district:district_name,id','chiefEngineer:name,id','suprEngineer:name,id')->orderBy('chief_engineer_idFk', 'ASC')->orderBy('supr_engineer_idFk', 'ASC')->orderBy('id', 'ASC')->get();
                // return ExeEngineer::orderBy('created_at', 'DESC')->select('id', 'name','designation')->get();
                  
        }

        public function get_sdo_list(Request $request){

                if($request['tehsil_id']){
                        return Sdo::where([
                                'tehsil_idFk' => $request['tehsil_id']
                        ])->orderBy('id', 'ASC')->select('id', 'name as text')->get();    
                }

                return Sdo::with('province:province_name,id',
                'zone:zone_name,id','division:division_name,id','district:district_name,id',
                'tehsil:tehsil_name,id','chiefEngineer:name,id','suprEngineer:name,id','exeEngineer:name,id')
                ->orderBy('ce_idFk', 'ASC')->orderBy('se_idFk', 'ASC')->orderBy('ee_idFk', 'ASC')->orderBy('id', 'ASC')->get();
                // return Sdo::orderBy('created_at', 'DESC')->select('id', 'name','designation')->get();
                  
        }

        public function get_sub_list(Request $request){

                if($request['tehsil_id']){
                        return SubEngineer::where([
                                'tehsil_idFk' => $request['tehsil_id']
                        ])->orderBy('ce_idFk', 'ASC')->orderBy('se_idFk', 'ASC')->orderBy('ee_idFk', 'ASC')->orderBy('sdo_idFk', 'ASC')->orderBy('id', 'ASC')->select('id', 'name as text')->get();    
                }

                return SubEngineer::with('province:province_name,id',
                'zone:zone_name,id','division:division_name,id',
                'district:district_name,id','tehsil:tehsil_name,id','chiefEngineer:name,id',
                'suprEngineer:name,id','exeEngineer:name,id','sdoEngineer:name,id')->orderBy('id', 'ASC')->get();
                // return SubEngineer::orderBy('created_at', 'DESC')->select('id', 'name','designation')->get();
                  
        }

        public function get_ce_details($ce_id){

                $data = ChiefEngineer::where('id',$ce_id)->get()->toArray();
                return $data[0];
        }

        public function get_se_details($se_id){

                $data = SuprEngineer::where('id',$se_id)->get()->toArray();
                return $data[0];
        }

        public function get_ee_details($ee_id){

                $data = ExeEngineer::where('id',$ee_id)->get()->toArray();
                return $data[0];
        }

        public function get_sdo_details($sdo_id){

                $data = Sdo::where('id',$sdo_id)->get()->toArray();
                return $data[0];
        }

        public function get_sub_details($sub_id){

                $data = SubEngineer::where('id',$sub_id)->get()->toArray();
                return $data[0];
        }

        // Period Codes

        public function create_year(Request $request){
                if ($request['id']) {
                        $year_dtl = Year::findOrFail($request['id']);
                    } else {
                        $year_dtl = new Year();
                    }
                    $this->validateYear($request);
                    try {
            
                        $year_dtl->code = $request['code'];
                        $year_dtl->description = $request['description'];
                        
                        $year_dtl->save();
                        return $year_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_year_list(){

                return Year::orderBy('id', 'ASC')->select('id', 'code','description')->get();
                  
        }

        public function get_year_details($year_id){

                $data = Year::where('id',$year_id)->get()->toArray();
                return $data[0];
        }

        public function create_month(Request $request){
                if ($request['id']) {
                        $month_dtl = Month::findOrFail($request['id']);
                    } else {
                        $month_dtl = new Month();
                    }
                    $this->validateMonth($request);
                    try {
            
                        $month_dtl->code = $request['code'];
                        $month_dtl->description = $request['description'];
                        $month_dtl->short_description = $request['short_description'];
                        
                        $month_dtl->save();
                        return $month_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_month_list(){

                return Month::orderBy('id', 'ASC')->select('id', 'code','description','short_description')->get();
                  
        }

        public function get_month_details($month_id){

                $data = Month::where('id',$month_id)->get()->toArray();
                return $data[0];
        }

        // Status APIs

        public function create_approval(Request $request){
                if ($request['id']) {
                        $approval_dtl = ApprovalStatus::findOrFail($request['id']);
                    } else {
                        $approval_dtl = new ApprovalStatus();
                    }
                    $this->validateApprovalStatus($request);
                    try {
            
                        $approval_dtl->approval_status_title = $request['approval_status_title'];
                                                
                        $approval_dtl->save();
                        return $approval_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_approval_list(){

                return ApprovalStatus::orderBy('id', 'ASC')->select('id', 'approval_status_title')->get();
        }

        public function get_approval_details($approval_id){

                $data = ApprovalStatus::where('id',$approval_id)->get()->toArray();
                return $data[0];
        }


        public function create_funding(Request $request){
                
                if ($request['id']) {
                        $funding_dtl = Funding::findOrFail($request['id']);
                    } else {
                        $funding_dtl = new Funding();
                    }
                    $this->validateFundingStatus($request);
                    try {
            
                        $funding_dtl->funding_status = $request['funding_status'];
                        
                        $funding_dtl->save();
                        return $funding_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_funding_list(){

                return Funding::orderBy('id', 'ASC')->select('id', 'funding_status')->get();
        }

        public function get_funding_details($funding_id){

                $data = Funding::where('id',$funding_id)->get()->toArray();
                return $data[0];
        }


        public function create_completion(Request $request){

                if ($request['id']) {
                        $completion_dtl = Completion::findOrFail($request['id']);
                    } else {
                        $completion_dtl = new Completion();
                    }
                    $this->validateCompletionStatus($request);
                    try {
            
                        $completion_dtl->completion_status = $request['completion_status'];
                        
                        $completion_dtl->save();
                        return $completion_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_completion_list(){

                return Completion::orderBy('id', 'ASC')->select('id', 'completion_status')->get();
        }

        public function get_completion_details($completion_id){

                $data = Completion::where('id',$completion_id)->get()->toArray();
                return $data[0];
        }

        public function create_functional(Request $request){

                if ($request['id']) {
                        $functional_dtl = FunctionStatus::findOrFail($request['id']);
                    } else {
                        $functional_dtl = new FunctionStatus();
                    }
                    $this->validateFunctionalStatus($request);
                    try {
            
                        $functional_dtl->function_status_title = $request['function_status_title'];
                        
                        $functional_dtl->save();
                        return $functional_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_functional_list(){

                return FunctionStatus::orderBy('id', 'ASC')->select('id', 'function_status_title')->get();
        }

        public function get_functional_details($functional_id){

                $data = FunctionStatus::where('id',$functional_id)->get()->toArray();
                return $data[0];
        }
        
        // Infrastructure APIs
        public function create_main_head(Request $request){
                if ($request['id']) {
                        $main_head_dtl = Infrastructure::findOrFail($request['id']);
                    } else {
                        $main_head_dtl = new Infrastructure();
                    }
                    $this->validateMainHead($request);
                    try {
            
                        $main_head_dtl->infra_desc = $request['infra_desc'];
                        
                        $main_head_dtl->save();
                        return $main_head_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function create_sub_head(Request $request){
                if ($request['id']) {
                        $sub_head_dtl = SubHead::findOrFail($request['id']);
                    } else {
                        $sub_head_dtl = new SubHead();
                    }
                    $this->validateSubHead($request);
                    try {
            
                        $sub_head_dtl->sub_head_desc = $request['sub_head_desc'];
                        $sub_head_dtl->infra_idFk = $request['infra_idFk'];
                        
                        $sub_head_dtl->save();
                        return $sub_head_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function create_detail_head(Request $request){
                if ($request['id']) {
                        $detail_head_dtl = DetailHead::findOrFail($request['id']);
                    } else {
                        $detail_head_dtl = new DetailHead();
                    }
                    $this->validateDetailHead($request);
                    try {
            
                        $detail_head_dtl->detail_head_desc = $request['detail_head_desc'];
                        $detail_head_dtl->sub_head_idFk = $request['sub_head_idFk'];
                        $detail_head_dtl->main_head_idFk = $request['infra_idFk'];
                        
                        $detail_head_dtl->save();
                        return $detail_head_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function create_material_type(Request $request){
                if ($request['id']) {
                        $material_dtl = Material::findOrFail($request['id']);
                    } else {
                        $material_dtl = new Material();
                    }
                    $this->validateMaterial($request);
                    try {
            
                        $material_dtl->material_desc = $request['material_desc'];
                        
                        $material_dtl->save();
                        return $material_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_material_list(){

                return Material::orderBy('id', 'ASC')->select('id', 'material_desc')->get();
        }

        public function get_sub_head_list(Request $request){

                if($request['main_id']){
                        return SubHead::where([
                                'infra_idFk' => $request['main_id']
                        ])->orderBy('id', 'ASC')->select('id', 'sub_head_desc as text')->get();    
                }

                return SubHead::with(
                        'MainHead:infra_desc,id',
                    )->orderBy('id', 'ASC')->get();

                // return SubHead::orderBy('created_at', 'DESC')->select('id', 'sub_head_desc')->get();
        }

        public function get_detail_head_list(){

                return DetailHead::with(
                        'SubHead:sub_head_desc,id',
                        'MainHead:infra_desc,id'
                    )->orderBy('id', 'ASC')->get();

                // return DetailHead::orderBy('created_at', 'DESC')->select('id', 'detail_head_desc')->get();
        }

        public function get_material_details($material_id){

                $data = Material::where('id',$material_id)->get()->toArray();
                return $data[0];
        }

        public function get_main_head_details($main_id){

                $data = Infrastructure::where('id',$main_id)->get()->toArray();
                return $data[0];
        }

        public function get_sub_head_details($sub_id){

                $data = SubHead::where('id',$sub_id)->get()->toArray();
                return $data[0];
        }

        public function get_detail_head_details($detail_id){

                $data = DetailHead::where('id',$detail_id)->get()->toArray();
                return $data[0];
        }

        // General Codes APIs
        public function create_unit(Request $request){
                if ($request['id']) {
                        $unit_dtl = Unit::findOrFail($request['id']);
                    } else {
                        $unit_dtl = new Unit();
                    }
                    $this->validateUnit($request);
                    try {
            
                        $unit_dtl->short_desc = $request['short_desc'];
                        $unit_dtl->unit_desc = $request['unit_desc'];
                        
                        $unit_dtl->save();
                        return $unit_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_unit(){

                return Unit::orderBy('id', 'ASC')->select('id', 'short_desc','unit_desc')->get();
        }

        public function get_unit_details($unit_id){

                $data = Unit::where('id',$unit_id)->get()->toArray();
                return $data[0];
        }

        public function create_sagency(Request $request){
                if ($request['id']) {
                        $sagency_dtl = SponseredAgency::findOrFail($request['id']);
                    } else {
                        $sagency_dtl = new SponseredAgency();
                    }
                    $this->validatSAgency($request);
                    try {
            
                        $sagency_dtl->short_description = $request['short_description'];
                        $sagency_dtl->description = $request['description'];
                        
                        $sagency_dtl->save();
                        return $sagency_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_sagency(){

                return SponseredAgency::orderBy('id', 'ASC')->select('id', 'description','short_description')->get();
        }

        public function get_sagency_details($sagency_id){

                $data = SponseredAgency::where('id',$sagency_id)->get()->toArray();
                return $data[0];
        }

        public function create_eagency(Request $request){
                if ($request['id']) {
                        $eagency_dtl = ExecutedAgency::findOrFail($request['id']);
                    } else {
                        $eagency_dtl = new ExecutedAgency();
                    }
                    $this->validatEAgency($request);
                    try {
            
                        $eagency_dtl->description = $request['description'];
                        $eagency_dtl->short_description = $request['short_description'];
                        
                        $eagency_dtl->save();
                        return $eagency_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_eagency(){

                return ExecutedAgency::orderBy('id', 'ASC')->select('id', 'description','short_description')->get();
        }

        public function get_eagency_details($eagency_id){

                $data = ExecutedAgency::where('id',$eagency_id)->get()->toArray();
                return $data[0];
        }

        public function create_wquality(Request $request){
                if ($request['id']) {
                        $wquality_dtl = WaterQuality::findOrFail($request['id']);
                    } else {
                        $wquality_dtl = new WaterQuality();
                    }
                    $this->validatWQuality($request);
                    try {
            
                        $wquality_dtl->water_quality_title = $request['water_quality_title'];
                        
                        $wquality_dtl->save();
                        return $wquality_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_wquality(){

                return WaterQuality::orderBy('id', 'ASC')->select('id', 'water_quality_title')->get();
        }

        public function get_wquality_details($wquality_id){

                $data = WaterQuality::where('id',$wquality_id)->get()->toArray();
                return $data[0];
        }

        public function create_technical(Request $request){
                if ($request['id']) {
                        $technical_dtl = Technique::findOrFail($request['id']);
                    } else {
                        $technical_dtl = new Technique();
                    }
                    $this->validatTechnical($request);
                    try {
            
                        $technical_dtl->technique_title = $request['technique_title'];
                        
                        $technical_dtl->save();
                        return $technical_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_technical(){

                return Technique::orderBy('id', 'ASC')->select('id', 'technique_title')->get();
        }

        public function get_technical_details($technical_id){

                $data = Technique::where('id',$technical_id)->get()->toArray();
                return $data[0];
        }

        public function create_snature(Request $request){
                if ($request['id']) {
                        $snature_dtl = SchemeNature::findOrFail($request['id']);
                    } else {
                        $snature_dtl = new SchemeNature();
                    }
                    $this->validatSNature($request);
                    try {
            
                        $snature_dtl->description = $request['description'];
                        
                        $snature_dtl->save();
                        return $snature_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_snature(){

                return SchemeNature::orderBy('id', 'ASC')->select('id', 'description')->get();
        }

        public function get_snature_details($snature_id){

                $data = SchemeNature::where('id',$snature_id)->get()->toArray();
                return $data[0];
        }

        public function create_om(Request $request){
                if ($request['id']) {
                        $om_dtl = OMBy::findOrFail($request['id']);
                    } else {
                        $om_dtl = new OMBy();
                    }
                    $this->validatOM($request);
                    try {
            
                        $om_dtl->description = $request['description'];
                        
                        $om_dtl->save();
                        return $om_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_om(){

                return OMBy::orderBy('id', 'ASC')->select('id', 'description')->get();
        }

        public function get_om_details($om_id){

                $data = OMBy::where('id',$om_id)->get()->toArray();
                return $data[0];
        }

        public function create_wsource(Request $request){
                if ($request['id']) {
                        $wsource_dtl = WaterSource::findOrFail($request['id']);
                    } else {
                        $wsource_dtl = new WaterSource();
                    }
                    $this->validatWSource($request);
                    try {
            
                        $wsource_dtl->water_source_title = $request['water_source_title'];
                        
                        $wsource_dtl->save();
                        return $wsource_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_wsource(){

                return WaterSource::orderBy('id', 'ASC')->select('id', 'water_source_title')->get();
        }

        public function get_wsource_details($wsource_id){

                $data = WaterSource::where('id',$wsource_id)->get()->toArray();
                return $data[0];
        }

        public function create_area(Request $request){
                if ($request['id']) {
                        $area_dtl = Area::findOrFail($request['id']);
                    } else {
                        $area_dtl = new Area();
                    }
                    $this->validatArea($request);
                    try {
            
                        $area_dtl->area_title = $request['area_title'];
                        
                        $area_dtl->save();
                        return $area_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_area(){

                return Area::orderBy('id', 'ASC')->select('id', 'area_title')->get();
        }

        public function get_area_details($area_id){

                $data = Area::where('id',$area_id)->get()->toArray();
                return $data[0];
        }

        public function create_stype(Request $request){
                if ($request['id']) {
                        $stype_dtl = SchemeType::findOrFail($request['id']);
                    } else {
                        $stype_dtl = new SchemeType();
                    }
                    $this->validatSType($request);
                    try {
            
                        $stype_dtl->type_title = $request['type_title'];
                        $stype_dtl->short_desc = $request['short_desc'];
                        
                        $stype_dtl->save();
                        return $stype_dtl;
                    } catch (\Exception $e) {
                        return response()->json([
                            'Error' => $e->getMessage(),
                            'Code' => $e->getCode(),
                            'Line' => $e->getLine(),
                            'File' => $e->getFile()
                        ], 500);
                }

                return response()->json([
                        'Error' => 'Request not Found!',
                        'Code' => '404',
                    ], 500);
        }

        public function get_stype(){

                return SchemeType::orderBy('id', 'ASC')->select('id', 'type_title','short_desc')->get();
        }

        public function get_stype_details($stype_id){

                $data = SchemeType::where('id',$stype_id)->get()->toArray();
                return $data[0];
        }

        // Download CSV for every listing,component and module

        public function download_province_data11(Request $request){ 
                
                
                // $order_by_name = $request->has("order_by_name")?$request->order_by_name:"crs_complaint_register.id";
                // $order_by_type = $request->has("order_by_type")?$request->order_by_type:"desc";        
                
                 $query_obj = Province::where("id", "!=",0);
                    
                    
                // $query_obj->when(($request->has('division') && (!empty($request->division)) && $request->division !="all"), function ($q) {
                //     return $q->where('division',request('division'));
                // });
                // $query_obj->when(($request->has('district') && (!empty($request->district)) && $request->district !="all"), function ($q) {
                //     return $q->where('district',request('district'));
                // });
                
                // $query_obj->when(($request->has('office_posting') && (!empty($request->office_posting)) && $request->office_posting !="all"), function ($q) {
                //     return $q->where('office_posting',request('office_posting'));
                // });
                
                // $query_obj->when(($request->has('status') && (!empty($request->status)) && $request->status !="all"), function ($q) {
                //     return $q->where('complaint_status',request('status'));
                // });
                
                
                $total_rows = $query_obj->count();
                //Processing orderBy cases
                
                $all_data = $query_obj->orderBy('id', 'desc')
                ->get(['province.*']); 
                // return json_encode($all_data);
                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=file.csv",
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );
                $columns = array("id","Province Name","No of Districts","Department Name","Province Description");
                
                $callback = function() use ($all_data, $columns)
                {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
                    $counter = 1;
                    foreach($all_data as $province_data){
                        $province_data->province_name = $province_data->province_name;
                        $province_data->no_of_districts = $province_data->no_of_districts;
                        $province_data->dept_name = $province_data->dept_name;
                        $province_data->province_desc = $province_data->province_desc;
                        
                        $rec_row = array($counter,$province_data->province_name, $province_data->no_of_districts, $province_data->dept_name,
                                        $province_data->province_desc);

                        fputcsv($file, $rec_row);
                        $counter++;
                    }
                    fclose($file);
                };
               
                return response()->streamDownload($callback, 'all-province-data' . date('d-m-Y-H:i:s').'.csv', $headers);
        
        } // Ends download_province_data listing()

        public function download_zone_data(Request $request){ 
                
                $query_obj = Zone::where("id", "!=",0);
 
                $total_rows = $query_obj->count();
                //Processing orderBy cases
                
                $all_data = $query_obj->orderBy('id', 'desc')
                ->get(['province.*']); 
                
                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=file.csv",
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );
                $columns = array("id","Province Name","No of Districts","Department Name","Province Description");
                
                $callback = function() use ($all_data, $columns)
                {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
                    $counter = 1;
                    foreach($all_data as $province_data){
                        $province_data->province_name = $province_data->province_name;
                        $province_data->no_of_districts = $province_data->no_of_districts;
                        $province_data->dept_name = $province_data->dept_name;
                        $province_data->province_desc = $province_data->province_desc;
                        
                        $rec_row = array($counter,$province_data->province_name, $province_data->no_of_districts, $province_data->dept_name,
                                        $province_data->province_desc);

                        fputcsv($file, $rec_row);
                        $counter++;
                    }
                    fclose($file);
                };
               
                return response()->streamDownload($callback, 'all-province-data' . date('d-m-Y-H:i:s').'.csv', $headers);
        
        } // Ends download_zone_data listing()

        public function download_division_data(Request $request){ 
                
                $query_obj = Zone::where("id", "!=",0);
 
                $total_rows = $query_obj->count();
                //Processing orderBy cases
                
                $all_data = $query_obj->orderBy('id', 'desc')
                ->get(['province.*']); 
                
                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=file.csv",
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );
                $columns = array("id","Province Name","No of Districts","Department Name","Province Description");
                
                $callback = function() use ($all_data, $columns)
                {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
                    $counter = 1;
                    foreach($all_data as $province_data){
                        $province_data->province_name = $province_data->province_name;
                        $province_data->no_of_districts = $province_data->no_of_districts;
                        $province_data->dept_name = $province_data->dept_name;
                        $province_data->province_desc = $province_data->province_desc;
                        
                        $rec_row = array($counter,$province_data->province_name, $province_data->no_of_districts, $province_data->dept_name,
                                        $province_data->province_desc);

                        fputcsv($file, $rec_row);
                        $counter++;
                    }
                    fclose($file);
                };
               
                return response()->streamDownload($callback, 'all-province-data' . date('d-m-Y-H:i:s').'.csv', $headers);
        
        } // Ends download_division_data listing()

        public function download_district_data(Request $request){ 
                
                $query_obj = Zone::where("id", "!=",0);
 
                $total_rows = $query_obj->count();
                //Processing orderBy cases
                
                $all_data = $query_obj->orderBy('id', 'desc')
                ->get(['province.*']); 
                
                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=file.csv",
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );
                $columns = array("id","Province Name","No of Districts","Department Name","Province Description");
                
                $callback = function() use ($all_data, $columns)
                {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
                    $counter = 1;
                    foreach($all_data as $province_data){
                        $province_data->province_name = $province_data->province_name;
                        $province_data->no_of_districts = $province_data->no_of_districts;
                        $province_data->dept_name = $province_data->dept_name;
                        $province_data->province_desc = $province_data->province_desc;
                        
                        $rec_row = array($counter,$province_data->province_name, $province_data->no_of_districts, $province_data->dept_name,
                                        $province_data->province_desc);

                        fputcsv($file, $rec_row);
                        $counter++;
                    }
                    fclose($file);
                };
               
                return response()->streamDownload($callback, 'all-province-data' . date('d-m-Y-H:i:s').'.csv', $headers);
        
        } // Ends download_district_data listing()

        public function download_tehsil_data(Request $request){ 
                
                $query_obj = Zone::where("id", "!=",0);
 
                $total_rows = $query_obj->count();
                //Processing orderBy cases
                
                $all_data = $query_obj->orderBy('id', 'desc')
                ->get(['province.*']); 
                
                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=file.csv",
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );
                $columns = array("id","Province Name","No of Districts","Department Name","Province Description");
                
                $callback = function() use ($all_data, $columns)
                {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
                    $counter = 1;
                    foreach($all_data as $province_data){
                        $province_data->province_name = $province_data->province_name;
                        $province_data->no_of_districts = $province_data->no_of_districts;
                        $province_data->dept_name = $province_data->dept_name;
                        $province_data->province_desc = $province_data->province_desc;
                        
                        $rec_row = array($counter,$province_data->province_name, $province_data->no_of_districts, $province_data->dept_name,
                                        $province_data->province_desc);

                        fputcsv($file, $rec_row);
                        $counter++;
                    }
                    fclose($file);
                };
               
                return response()->streamDownload($callback, 'all-province-data' . date('d-m-Y-H:i:s').'.csv', $headers);
        
        } // Ends download_tehsil_data listing()

        public function download_union_council_data(Request $request){ 
                
                $query_obj = Zone::where("id", "!=",0);
 
                $total_rows = $query_obj->count();
                //Processing orderBy cases
                
                $all_data = $query_obj->orderBy('id', 'desc')
                ->get(['province.*']); 
                
                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=file.csv",
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );
                $columns = array("id","Province Name","No of Districts","Department Name","Province Description");
                
                $callback = function() use ($all_data, $columns)
                {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
                    $counter = 1;
                    foreach($all_data as $province_data){
                        $province_data->province_name = $province_data->province_name;
                        $province_data->no_of_districts = $province_data->no_of_districts;
                        $province_data->dept_name = $province_data->dept_name;
                        $province_data->province_desc = $province_data->province_desc;
                        
                        $rec_row = array($counter,$province_data->province_name, $province_data->no_of_districts, $province_data->dept_name,
                                        $province_data->province_desc);

                        fputcsv($file, $rec_row);
                        $counter++;
                    }
                    fclose($file);
                };
               
                return response()->streamDownload($callback, 'all-province-data' . date('d-m-Y-H:i:s').'.csv', $headers);
        
        } // Ends download_union_council_data listing()


        // Methods for Listings implemented using Data tables

        public function get_provinces_list(Request $request){

                $data = Province::whereNotNull("id");

                $data = $data->paginate($request->length);

                if ($data->count()) {
                foreach ($data as $iKey => $item) {
                        $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
                }
                }

                return new DataTableCollectionResource($data);

        }

        public function get_zones_list(Request $request){

                $data = Zone::with(
                        'province:province_name,id',
                    )->orderBy('id', 'ASC');

                // to make paginate work on collections, do not add get() or all(). because this only works on Query
                $data = $data->paginate($request->length);

                if ($data->count()) {
                foreach ($data as $iKey => $item) {
                        $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
                }
                }

                return new DataTableCollectionResource($data);

        }

        public function get_division_list_dt(Request $request){

                
                $data = Division::with(
                        'province:province_name,id',
                        'zone:zone_name,id',
                    )->orderBy('id', 'ASC');

                $data = $data->paginate($request->length);

                if ($data->count()) {
                foreach ($data as $iKey => $item) {
                        $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
                }
                }

                return new DataTableCollectionResource($data);

                
        }

        public function get_district_list_dt(Request $request){

                
                $data = District::with(
                        'province:province_name,id',
                        'zone:zone_name,id',
                        'division:division_name,id',
                    )->orderBy('id', 'ASC');

                $data = $data->paginate($request->length);

                if ($data->count()) {
                foreach ($data as $iKey => $item) {
                        $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
                }
                }

                return new DataTableCollectionResource($data);

                
        }

        public function get_tehsil_list_dt(Request $request){

                
                $data = Tehsil::with(
                        'province:province_name,id',
                        'zone:zone_name,id',
                        'division:division_name,id',
                        'district:district_name,id',
                    )->orderBy('id', 'ASC')->get();

                $data = $data->paginate($request->length);

                if ($data->count()) {
                foreach ($data as $iKey => $item) {
                        $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
                }
                }

                return new DataTableCollectionResource($data);

                
        }

        public function get_union_list_dt(Request $request){

                
                $data = UnionCouncil::with(
                        'province:province_name,id',
                        'zone:zone_name,id',
                        'division:division_name,id',
                        'district:district_name,id',
                        'tehsil:tehsil_name,id',
                    )->orderBy('id', 'ASC')->get();

                $data = $data->paginate($request->length);

                if ($data->count()) {
                foreach ($data as $iKey => $item) {
                        $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
                }
                }

                return new DataTableCollectionResource($data);

                
        }


}
