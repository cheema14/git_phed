<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth::routes();




// Route::group(
//     ['middleware' => 'guest', 'namespace' => 'Schemes'],
//     function () {
        

//         // Route::get('schemes-list', 'SchemeController@schemes_list');
//         Route::post('schemes-create', 'SchemeController@schemes_update');

//         //Sub scheme saving APIs
//         Route::post('schemes-create-pc', 'SchemeController@pc_update');
//         Route::post('schemes-create-aa', 'SchemeController@aa_update');
//         Route::post('schemes-create-ts', 'SchemeController@ts_update');
//         Route::post('schemes-create-cnt', 'SchemeController@cnt_update');
//         Route::post('schemes-create-alo', 'SchemeController@alo_update');
//         Route::post('schemes-create-rpnd', 'SchemeController@rpnd_update');
//         Route::post('schemes-create-rfd', 'SchemeController@rfd_update');
//         Route::post('schemes-create-mp', 'SchemeController@mp_update');
//         Route::post('schemes-create-visit', 'SchemeController@visit_update');
//         Route::post('schemes-create-en', 'SchemeController@en_update');
//         Route::post('schemes-create-asset', 'SchemeController@asset_update');
//         Route::post('schemes-create-cbo', 'SchemeController@cbo_update');
//         Route::post('schemes-create-hh', 'SchemeController@hh_update');
//         Route::post('schemes-create-cs', 'SchemeController@cs_update');
//         Route::post('schemes-create-vs', 'SchemeController@vs_update');
//         //Sub scheme saving APIs


//         Route::get('get-scheme-detail/{id}', 'SchemeController@get_scheme_by_id')->name('edit-scheme-details');

//         // Sub Scheme details APIs
//         Route::get('get-scheme-sub-details/{id}', 'SchemeController@get_scheme_sub_details');
//         Route::get('get-scheme-sub-details-aa/{id}', 'SchemeController@get_scheme_sub_details_aa');
//         Route::get('get-scheme-sub-details-ts/{id}', 'SchemeController@get_scheme_sub_details_ts');
//         Route::get('get-scheme-sub-details-cnt/{id}', 'SchemeController@get_scheme_sub_details_cnt');
//         Route::get('get-scheme-sub-details-alo/{id}', 'SchemeController@get_scheme_sub_details_alo');
//         Route::get('get-scheme-sub-details-rpnd/{id}', 'SchemeController@get_scheme_sub_details_rpnd');
//         Route::get('get-scheme-sub-details-rfd/{id}', 'SchemeController@get_scheme_sub_details_rfd');
//         Route::get('get-scheme-sub-details-mp/{id}', 'SchemeController@get_scheme_sub_details_mp');
//         Route::get('get-scheme-sub-details-visit/{id}', 'SchemeController@get_scheme_sub_details_visit');
//         Route::get('get-scheme-sub-details-en/{id}', 'SchemeController@get_scheme_sub_details_en');
//         Route::get('get-scheme-sub-details-asset/{id}', 'SchemeController@get_scheme_sub_details_asset');
//         Route::get('get-scheme-sub-details-cbo/{id}', 'SchemeController@get_scheme_sub_details_cbo');
//         Route::get('get-scheme-sub-details-hh/{id}', 'SchemeController@get_scheme_sub_details_hh');
//         Route::get('get-scheme-sub-details-cs/{id}', 'SchemeController@get_scheme_sub_details_cs');
//         Route::get('get-scheme-sub-details-vs/{id}', 'SchemeController@get_scheme_sub_details_vs');


//         //Get APIs for only sub schemes entries - For edit
//         Route::get('get-pc-details/{id}', 'SchemeController@get_pc_details');
//         Route::get('get-aa-details/{id}', 'SchemeController@get_aa_details');
//         Route::get('get-ts-details/{id}', 'SchemeController@get_ts_details');
//         Route::get('get-contract-details/{id}', 'SchemeController@get_contract_details');
//         Route::get('get-alo-details/{id}', 'SchemeController@get_alo_details');
//         Route::get('get-rpnd-details/{id}', 'SchemeController@get_rpnd_details');
//         Route::get('get-rfd-details/{id}', 'SchemeController@get_rfd_details');
//         Route::get('get-mp-details/{id}', 'SchemeController@get_mp_details');
//         Route::get('get-visits-details/{id}', 'SchemeController@get_visits_details');
//         Route::get('get-en-details/{id}', 'SchemeController@get_en_details');
//         Route::get('get-cbo-details/{id}', 'SchemeController@get_cbo_details');
//         Route::get('get-assets-details/{id}', 'SchemeController@get_assets_details');
//         Route::get('get-hh-details/{id}', 'SchemeController@get_hh_details');
//         Route::get('get-cs-details/{id}', 'SchemeController@get_cs_details');
//         Route::get('get-vs-details/{id}', 'SchemeController@get_vs_details');


//         // Delete APIs of sub schemes
//         Route::get('delete-pc-details/{id}', 'SchemeController@delete_pc_details');
//         Route::get('delete-aa-details/{id}', 'SchemeController@delete_aa_details');
//         Route::get('delete-ts-details/{id}', 'SchemeController@delete_ts_details');
//         Route::get('delete-contract-details/{id}', 'SchemeController@delete_contract_details');
//         Route::get('delete-alo-details/{id}', 'SchemeController@delete_alo_details');
//         Route::get('delete-rpnd-details/{id}', 'SchemeController@delete_rpnd_details');
//         Route::get('delete-rfd-details/{id}', 'SchemeController@delete_rfd_details');
//         Route::get('delete-mp-details/{id}', 'SchemeController@delete_mp_details');
//         Route::get('delete-visits-details/{id}', 'SchemeController@delete_visits_details');
//         Route::get('delete-en-details/{id}', 'SchemeController@delete_en_details');
//         Route::get('delete-cbo-details/{id}', 'SchemeController@delete_cbo_details');
//         Route::get('delete-assets-details/{id}', 'SchemeController@delete_assets_details');
//         Route::get('delete-hh-details/{id}', 'SchemeController@delete_hh_details');
//         Route::get('delete-cs-details/{id}', 'SchemeController@delete_cs_details');
//         Route::get('delete-vs-details/{id}', 'SchemeController@delete_vs_details');

//         // Get all scheme data and PC data for adding PC DTL modal
//         Route::get('get-all-scheme-pc-data/{id}', 'SchemeController@get_all_scheme_pc_data');
//         Route::get('get-all-scheme-ts-data/{id}', 'SchemeController@get_all_scheme_ts_data');
//         Route::get('get-all-scheme-mp-data/{id}', 'SchemeController@get_all_scheme_mp_data');


//         // Get lists for all Engineers, sub Engineers etc
//         Route::get('get-chief-engineers/', 'SchemeController@get_chief_engineers');
//         Route::get('get-supr-engineers/', 'SchemeController@get_supr_engineers');
//         Route::get('get-ex-engineers/', 'SchemeController@get_ex_engineers');
//         Route::get('get-sdos/', 'SchemeController@get_sdos');
//         Route::get('get-sb-engineers/', 'SchemeController@get_sb_engineers');


//         // Scheme form some dropdowns data fetching APIs
//         Route::get('get-executed-by/', 'SchemeController@get_executed_by');
//         Route::get('get-om-by/', 'SchemeController@get_om_by');
//         Route::get('get-sponsered-by/', 'SchemeController@get_sponsered_by');


//         // Create DTL APIs
//         Route::post('pc-dtl-create', 'SchemeController@pc_dtl_create')->name('pc-dtl-create');
//         Route::post('ts-dtl-create', 'SchemeController@ts_dtl_create')->name('ts-dtl-create');
//         Route::post('mp-dtl-create', 'SchemeController@mp_dtl_create')->name('mp-dtl-create');


//         // DTL Details listing APIs
//         Route::get('get-pc-dtls/', 'SchemeController@get_pc_dtls')->name('get-pc-dtls');
//         Route::get('get-ts-dtls/', 'SchemeController@get_ts_dtls')->name('get-ts-dtls/');
//         Route::get('get-mp-dtls/', 'SchemeController@get_mp_dtls')->name('get-mp-dtls/');
//     }
// );

// Route::group(
//     ['middleware' => 'guest', 'namespace' => 'Common'],
//     function () {
//         Route::get('/', function () {
//             return view('index');
//         });
//         Route::get('modules-list', 'CommonController@modules_list');
//         Route::get('get-province', 'CommonController@get_province');
//         Route::get('get-province-name/{province_id}', 'CommonController@get_province_name');
//         Route::get('get-zone/{province_id}', 'CommonController@get_zone');
//         Route::get('get-self-zone/{zone_id}', 'CommonController@get_zone_self_details');
//         Route::get('get-division/{zone_id}', 'CommonController@get_division');
//         Route::get('get-self-division/{division_id}', 'CommonController@get_division_self_details');
//         Route::get('get-district/{division_id}', 'CommonController@get_district');
//         Route::get('get-district-by-zone/{zone_id}', 'CommonController@get_district_by_zone');
//         Route::get('get-self-district/{district_id}', 'CommonController@get_district_self_details');
//         Route::get('get-tehsil/{district_id}', 'CommonController@get_tehsil');
//         Route::get('get-self-tehsil/{district_id}', 'CommonController@get_tehsil_self_details');
//         Route::get('get-ucs/{district_id}', 'CommonController@get_ucs');
//         Route::get('get-villages/{district_id}', 'CommonController@get_villages');
//         Route::get('get-program', 'CommonController@get_program');
//         Route::get('get-action-by', 'CommonController@get_action_by');
//         Route::get('get-scheme-types', 'CommonController@get_scheme_types');
//         Route::get('get-techniques', 'CommonController@get_techniques');
//         Route::get('get-new-rehabs', 'CommonController@get_new_rehabs');
//         Route::get('get-areas', 'CommonController@get_areas');
//         Route::get('get-approval-status', 'CommonController@get_approval_status');
//         Route::get('get-function-status', 'CommonController@get_function_status');
//         Route::get('get-na/{na_id?}', 'CommonController@get_na');
//         Route::get('get-pp/{pp_id?}', 'CommonController@get_pp');
//         Route::get('get-water-source', 'CommonController@get_water_source');
//         Route::get('get-water-quality', 'CommonController@get_water_quality');
//         Route::get('get-source-nature', 'CommonController@get_source_nature')->name('get-source-nature');
//         Route::get('get-handing-code', 'CommonController@get_handing_code')->name('get-handing-code');
//         Route::get('get-units', 'CommonController@get_units')->name('get-units');
        
//         // DTL methods
//         Route::get('get-main-head', 'CommonController@get_main_head')->name('get-main-head');
//         Route::get('get-sub-head/{main_head_id}', 'CommonController@get_sub_head')->name('get-sub-head');
//         Route::get('get-detail-head/{sub_head_id}', 'CommonController@get_detail_head')->name('get-detail-head');
        
        
//         /* 
//         Calls for saving CRUs (Create,Read,Update)
//         for system
        
//         Location,Constituency,Executing Office,Period Codes,
//         Status,Infrastructure Codes,General Codes
        
//         */
        
//         // Calls for storing,editting and listing Location Codes

//         Route::post('create-province', 'CommonController@create_province')->name('create-province');
//         Route::get('get-province-details/{province_id}', 'CommonController@get_province_details')->name('get-province-details');
        
        
//         Route::post('create-zone', 'CommonController@create_zone')->name('create-zone');
//         Route::get('get-zone-list', 'CommonController@get_zone_list')->name('get-zone-list');
//         Route::get('get-zone-details/{zone_id}', 'CommonController@get_zone_details')->name('get-zone-details');
        
        
        
//         Route::post('create-division', 'CommonController@create_division')->name('create-division');
//         Route::get('get-division-list', 'CommonController@get_division_list')->name('get-division-list');
//         Route::get('get-division-details/{division_id}', 'CommonController@get_division_details')->name('get-division-details');
        
        
//         Route::post('create-district', 'CommonController@create_district')->name('create-district');
//         Route::get('get-district-list', 'CommonController@get_district_list')->name('get-district-list');
//         Route::get('get-district-details/{district_id}', 'CommonController@get_district_details')->name('get-district-details');
        
        
//         Route::post('create-tehsil', 'CommonController@create_tehsil')->name('create-tehsil');
//         Route::get('get-tehsil-list', 'CommonController@get_tehsil_list')->name('get-tehsil-list');
//         Route::get('get-tehsil-details/{tehsil_id}', 'CommonController@get_tehsil_details')->name('get-tehsil-details');

//         Route::post('create-union', 'CommonController@create_union')->name('create-union');
//         Route::get('get-union-list', 'CommonController@get_union_list')->name('get-union-list');
//         Route::get('get-union-details/{union_id}', 'CommonController@get_union_details')->name('get-union-details');

//         // Calls for storing,editting and listing Constituency Codes (Details)

//         Route::post('create-na', 'CommonController@create_na')->name('create-na');
//         Route::get('get-na-list', 'CommonController@get_na')->name('get-na-list');
//         Route::get('get-na-details/{na_id}', 'CommonController@get_na_details')->name('get-na-details');
        
//         Route::post('create-pp', 'CommonController@create_pp')->name('create-pp');
//         Route::get('get-pp-list', 'CommonController@get_pp')->name('get-pp-list');
//         Route::get('get-pp-details/{pp_id}', 'CommonController@get_pp_details')->name('get-pp-details');
        

//         // Calls for storing,editting and listing Executing office details
//         Route::post('create-ce', 'CommonController@create_ce')->name('create-ce');
//         Route::get('get-ce-list', 'CommonController@get_ce_list')->name('get-ce-list');
//         Route::get('get-ce-details/{ce_id}', 'CommonController@get_ce_details')->name('get-ce-details');

//         Route::post('create-se', 'CommonController@create_se')->name('create-se');
//         Route::get('get-se-list', 'CommonController@get_se_list')->name('get-se-list');
//         Route::get('get-se-details/{se_id}', 'CommonController@get_se_details')->name('get-se-details');

//         Route::post('create-ee', 'CommonController@create_ee')->name('create-ee');
//         Route::get('get-ee-list', 'CommonController@get_ee_list')->name('get-ee-list');
//         Route::get('get-ee-details/{ee_id}', 'CommonController@get_ee_details')->name('get-ee-details');

//         Route::post('create-sub', 'CommonController@create_sub')->name('create-sub');
//         Route::get('get-sub-list', 'CommonController@get_sub_list')->name('get-sub-list');
//         Route::get('get-sub-details/{sub_id}', 'CommonController@get_sub_details')->name('get-sub-details');

//         Route::post('create-sdo', 'CommonController@create_sdo')->name('create-sdo');
//         Route::get('get-sdo-list', 'CommonController@get_sdo_list')->name('get-sdo-list');
//         Route::get('get-sdo-details/{sdo_id}', 'CommonController@get_sdo_details')->name('get-sdo-details');

//         // Period Codes
//         Route::post('create-year', 'CommonController@create_year')->name('create-year');
//         Route::get('get-year-list', 'CommonController@get_year_list')->name('get-year-list');
//         Route::get('get-year-details/{year_id}', 'CommonController@get_year_details')->name('get-year-details');

//         Route::post('create-month', 'CommonController@create_month')->name('create-month');
//         Route::get('get-month-list', 'CommonController@get_month_list')->name('get-month-list');
//         Route::get('get-month-details/{month_id}', 'CommonController@get_month_details')->name('get-month-details');

//         // Status APIs
//         Route::post('create-approval', 'CommonController@create_approval')->name('create-approval');
//         Route::get('get-approval-list', 'CommonController@get_approval_list')->name('get-approval-list');
//         Route::get('get-approval-details/{approval_id}', 'CommonController@get_approval_details')->name('get-approval-details');

//         Route::post('create-funding', 'CommonController@create_funding')->name('create-funding');
//         Route::get('get-funding-list', 'CommonController@get_funding_list')->name('get-funding-list');
//         Route::get('get-funding-details/{funding_id}', 'CommonController@get_funding_details')->name('get-funding-details');

//         Route::post('create-completion', 'CommonController@create_completion')->name('create-completion');
//         Route::get('get-completion-list', 'CommonController@get_completion_list')->name('get-completion-list');
//         Route::get('get-completion-details/{completion_id}', 'CommonController@get_completion_details')->name('get-completion-details');

//         Route::post('create-functional', 'CommonController@create_functional')->name('create-functional');
//         Route::get('get-functional-list', 'CommonController@get_functional_list')->name('get-functional-list');
//         Route::get('get-functional-details/{functional_id}', 'CommonController@get_functional_details')->name('get-functional-details');

//         // Infrastructure Codes
//         Route::post('create-main-head', 'CommonController@create_main_head')->name('create-main-head');
//         Route::post('create-sub-head', 'CommonController@create_sub_head')->name('create-sub-head');
//         Route::post('create-detail-head', 'CommonController@create_detail_head')->name('create-detail-head');
//         Route::post('create-material-type', 'CommonController@create_material_type')->name('create-material-type');

//         Route::get('get-main-head-details/{main_id}', 'CommonController@get_main_head_details')->name('get-main-head-details');
//         Route::get('get-sub-head-details/{sub_id}', 'CommonController@get_sub_head_details')->name('get-sub-head-details');
//         Route::get('get-detail-head-details/{detail_id}', 'CommonController@get_detail_head_details')->name('get-detail-head-details');
//         Route::get('get-material-details/{material_id}', 'CommonController@get_material_details')->name('get-material-details');
//         Route::get('get-material-list', 'CommonController@get_material_list')->name('get-material-list');
//         Route::get('get-sub-head-list', 'CommonController@get_sub_head_list')->name('get-sub-head-list');
//         Route::get('get-detail-head-list', 'CommonController@get_detail_head_list')->name('get-detail-head-list');

//         // General Codes APIs
//         Route::post('create-unit', 'CommonController@create_unit')->name('create-unit');
//         Route::get('get-unit', 'CommonController@get_unit')->name('get-unit');
//         Route::get('get-unit-details/{unit_id}', 'CommonController@get_unit_details')->name('get-unit-details');

//         Route::post('create-sagency', 'CommonController@create_sagency')->name('create-sagency');
//         Route::get('get-sagency', 'CommonController@get_sagency')->name('get-sagency');
//         Route::get('get-sagency-details/{sagency_id}', 'CommonController@get_sagency_details')->name('get-sagency-details');

//         Route::post('create-eagency', 'CommonController@create_eagency')->name('create-eagency');
//         Route::get('get-eagency', 'CommonController@get_eagency')->name('get-eagency');
//         Route::get('get-eagency-details/{eagency_id}', 'CommonController@get_eagency_details')->name('get-eagency-details');

//         Route::post('create-wquality', 'CommonController@create_wquality')->name('create-wquality');
//         Route::get('get-wquality', 'CommonController@get_wquality')->name('get-wquality');
//         Route::get('get-wquality-details/{wquality_id}', 'CommonController@get_wquality_details')->name('get-wquality-details');

//         Route::post('create-technical', 'CommonController@create_technical')->name('create-technical');
//         Route::get('get-technical', 'CommonController@get_technical')->name('get-technical');
//         Route::get('get-technical-details/{technical_id}', 'CommonController@get_technical_details')->name('get-technical-details');

//         Route::post('create-snature', 'CommonController@create_snature')->name('create-snature');
//         Route::get('get-snature', 'CommonController@get_snature')->name('get-snature');
//         Route::get('get-snature-details/{snature_id}', 'CommonController@get_snature_details')->name('get-snature-details');

//         Route::post('create-om', 'CommonController@create_om')->name('create-om');
//         Route::get('get-om', 'CommonController@get_om')->name('get-om');
//         Route::get('get-om-details/{om_id}', 'CommonController@get_om_details')->name('get-om-details');
        
//         Route::post('create-wsource', 'CommonController@create_wsource')->name('create-wsource');
//         Route::get('get-wsource', 'CommonController@get_wsource')->name('get-wsource');
//         Route::get('get-wsource-details/{wsource_id}', 'CommonController@get_wsource_details')->name('get-wsource-details');

//         Route::post('create-area', 'CommonController@create_area')->name('create-area');
//         Route::get('get-area', 'CommonController@get_area')->name('get-area');
//         Route::get('get-area-details/{area_id}', 'CommonController@get_area_details')->name('get-area-details');

//         Route::post('create-stype', 'CommonController@create_stype')->name('create-stype');
//         Route::get('get-stype', 'CommonController@get_stype')->name('get-stype');
//         Route::get('get-stype-details/{stype_id}', 'CommonController@get_stype_details')->name('get-stype-details');
        
//     }
// );

// Route::get('login', function () {
//     return json_encode([
//         'status' => false,
//         'data' => 'Login failed!',
//     ]);
// })->name('login');
