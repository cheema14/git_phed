<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\UnionCouncil;

class UnionCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new UnionCouncil();
            $query_obj = $query_obj->fetch_union_export_data();
        
            // dd($query_obj);
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Province Code","Province Name","Zone Code","Zone Name",
                             "Division Code","Division Name","District Code","District Name",
                             "Tehsil Code","Tehsil Name","UC No","UC Name",
                             "Population(1998)","Population(2008)");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $uc_data){
                    
                    $uc_data->id = $uc_data->id;
                    $uc_data->province_id = $uc_data->province_id;
                    $uc_data->province_name = $uc_data->province_name;
                    $uc_data->zone_id = $uc_data->zone_id;
                    $uc_data->zone_name = $uc_data->zone_name;
                    $uc_data->division_id = $uc_data->division_id;
                    $uc_data->division_name = $uc_data->division_name;
                    $uc_data->district_id = $uc_data->district_id;
                    $uc_data->district_name = $uc_data->district_name;
                    $uc_data->tehsil_id = $uc_data->tehsil_id;
                    $uc_data->tehsil_name = $uc_data->tehsil_name;
                    $uc_data->uc_no = $uc_data->uc_no;
                    $uc_data->uc_name = $uc_data->uc_name;
                    $uc_data->population_nigthy_eigth = $uc_data->population_nigthy_eigth;
                    $uc_data->population_zero_eigth = $uc_data->population_zero_eigth;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$uc_data->province_id,$uc_data->province_name,
                                    $uc_data->zone_id,$uc_data->zone_name,$uc_data->division_id,
                                    $uc_data->division_name,$uc_data->district_id,$uc_data->district_name,
                                    $uc_data->tehsil_id,$uc_data->tehsil_name,$uc_data->uc_no,$uc_data->uc_name,
                                    $uc_data->population_nigthy_eigth,$uc_data->population_zero_eigth );

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-union-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}

