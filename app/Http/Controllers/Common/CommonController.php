<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\ActionBy;
use App\Models\ApprovalStatus;
use App\Models\District;
use App\Models\Division;
use App\Models\Program;
use App\Models\Province;
use App\Models\Tehsil;
use App\Models\UnionCouncil;
use App\Models\Village;
use App\Models\Zone;
use App\Models\SchemeType;
use App\Models\Technique;
use App\Models\NewRehab;
use App\Models\Area;
use App\Models\FunctionStatus;
use App\Models\Na;
use App\Models\Pp;
use App\Models\WaterQuality;
use App\Models\WaterSource;
use App\Models\SourceNature;
use App\Models\Year;
use App\Models\Month;
use App\Models\Completion;
use App\Models\Funding;
use App\Models\Material;
use App\HandingCode;
use App\Unit;
use App\Infrastructure;
use App\SubHead;
use App\DetailHead;
use App\ChiefEngineer;
use App\ExeEngineer;
use App\SubEngineer;
use App\Sdo;
use App\SuprEngineer;
use App\SponseredAgency;
use App\ExecutedAgency;
use App\OMBy;
use App\Models\SchemeNature;
use Illuminate\Http\Request;

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
                        ])->orderBy('id', 'ASC')->select('id', 'zone_name as text')->get();
                } else {
                        return Zone::orderBy('id', 'ASC')->select('id', 'zone_name as text')->get();
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
                        ])->orderBy('mna_name', 'ASC')->select('id', 'mna_name as text')->get()->toArray();
                }
                return Na::orderBy('short_description', 'ASC')->select('id','mna_name','na_code','na_name','contact_no', 'short_description as text')->get();
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
                        ])->get()->toArray();
                }
                $data = Pp::with(
                        'Na:short_description,id',
                    )->get();
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

                ], $customMessage);
        }

        private function validateCE($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                ];

                return $this->validate($request, [
                'name' => 'bail|required|string',
                'designation' => 'string',

                ], $customMessage);
        }

        private function validateSE($request, $id = null)
        {
                $customMessage = [
                        'required' => 'This is required field',
                        'string' => 'This field requires string only',
                        ];
        
                        return $this->validate($request, [
                        'name' => 'bail|required|string',
                        'designation' => 'string',
        
                        ], $customMessage);
        }

        private function validateEE($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                ];

                return $this->validate($request, [
                'name' => 'bail|required|string',
                'designation' => 'string',

                ], $customMessage);
        }

        private function validateSub($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                ];

                return $this->validate($request, [
                'name' => 'bail|required|string',
                'designation' => 'string',

                ], $customMessage);
        }

        private function validateSDO($request, $id = null)
        {
                $customMessage = [
                'required' => 'This is required field',
                'string' => 'This field requires string only',
                ];

                return $this->validate($request, [
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
                    )->get();
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
                    )->get();
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
                    )->get();
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
                    )->get();
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
                    )->get();
                return $data;

                return UnionCouncil::orderBy('created_at', 'DESC')->select('id', 'uc_name','province_id','zone_id','division_id','district_id','tehsil_id','population_nighty_eight','population_zero_eight')->get();
                  
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
                        
                        $pp_dtl->save();
                        return $pp_dtl;
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
            
                        $se_dtl->name = $request['name'];
                        $se_dtl->designation = $request['designation'];
                        
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
                        $ce_dtl = ExeEngineer::findOrFail($request['id']);
                    } else {
                        $ce_dtl = new ExeEngineer();
                    }
                    $this->validateEE($request);
                    try {
            
                        $ce_dtl->name = $request['name'];
                        $ce_dtl->designation = $request['designation'];
                                                
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

        public function create_sdo(Request $request){
                if ($request['id']) {
                        $ce_dtl = Sdo::findOrFail($request['id']);
                    } else {
                        $ce_dtl = new Sdo();
                    }
                    $this->validateSDO($request);
                    try {
            
                        $ce_dtl->name = $request['name'];
                        $ce_dtl->designation = $request['designation'];
                        // $ce_dtl->zone_idFk = $request['zone_idFk'];
                        
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

        public function create_sub(Request $request){
                if ($request['id']) {
                        $ce_dtl = SubEngineer::findOrFail($request['id']);
                    } else {
                        $ce_dtl = new SubEngineer();
                    }
                    $this->validateSub($request);
                    try {
            
                        $ce_dtl->name = $request['name'];
                        $ce_dtl->designation = $request['designation'];
                        // $ce_dtl->zone_idFk = $request['zone_idFk'];
                        
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

        public function get_ce_list(){

                return ChiefEngineer::orderBy('created_at', 'DESC')->select('id', 'name','designation')->get();
                  
        }

        public function get_se_list(){

                return SuprEngineer::orderBy('created_at', 'DESC')->select('id', 'name','designation')->get();
                  
        }

        public function get_ee_list(){

                return ExeEngineer::orderBy('created_at', 'DESC')->select('id', 'name','designation')->get();
                  
        }

        public function get_sdo_list(){

                return Sdo::orderBy('created_at', 'DESC')->select('id', 'name','designation')->get();
                  
        }

        public function get_sub_list(){

                return SubEngineer::orderBy('created_at', 'DESC')->select('id', 'name','designation')->get();
                  
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

                return Year::orderBy('created_at', 'DESC')->select('id', 'code','description')->get();
                  
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

                return Month::orderBy('created_at', 'DESC')->select('id', 'code','description','short_description')->get();
                  
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

                return ApprovalStatus::orderBy('created_at', 'DESC')->select('id', 'approval_status_title')->get();
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

                return Funding::orderBy('created_at', 'DESC')->select('id', 'funding_status')->get();
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

                return Completion::orderBy('created_at', 'DESC')->select('id', 'completion_status')->get();
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

                return FunctionStatus::orderBy('created_at', 'DESC')->select('id', 'function_status_title')->get();
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

                return Material::orderBy('created_at', 'DESC')->select('id', 'material_desc')->get();
        }

        public function get_sub_head_list(){

                return SubHead::with(
                        'MainHead:infra_desc,id',
                    )->get();

                // return SubHead::orderBy('created_at', 'DESC')->select('id', 'sub_head_desc')->get();
        }

        public function get_detail_head_list(){

                return DetailHead::with(
                        'SubHead:sub_head_desc,id',
                    )->get();

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

                return Unit::orderBy('created_at', 'DESC')->select('id', 'short_desc','unit_desc')->get();
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

                return SponseredAgency::orderBy('created_at', 'DESC')->select('id', 'description','short_description')->get();
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

                return ExecutedAgency::orderBy('created_at', 'DESC')->select('id', 'description','short_description')->get();
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

                return WaterQuality::orderBy('created_at', 'DESC')->select('id', 'water_quality_title')->get();
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

                return Technique::orderBy('created_at', 'DESC')->select('id', 'technique_title')->get();
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

                return SchemeNature::orderBy('created_at', 'DESC')->select('id', 'description')->get();
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

                return OMBy::orderBy('created_at', 'DESC')->select('id', 'description')->get();
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

                return WaterSource::orderBy('created_at', 'DESC')->select('id', 'water_source_title')->get();
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

                return Area::orderBy('created_at', 'DESC')->select('id', 'area_title')->get();
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

                return SchemeType::orderBy('created_at', 'DESC')->select('id', 'type_title','short_desc')->get();
        }

        public function get_stype_details($stype_id){

                $data = SchemeType::where('id',$stype_id)->get()->toArray();
                return $data[0];
        }
}
