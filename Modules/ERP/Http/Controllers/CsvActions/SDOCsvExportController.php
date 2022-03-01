<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Sdo;

class SDOCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Sdo();
            $query_obj = $query_obj->fetch_sdo_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Province","Zone","Division","District","Tehsil","Chief Engineer","Supr Engineer Name",
                             "EE Engineer Name","SDO Name","Sub Engineer Name","Designation");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $sub_data){
                    
                    $sub_data->id = $sub_data->id;
                    $sub_data->province_name = $sub_data->province_name;
                    $sub_data->zone_name = $sub_data->zone_name;
                    $sub_data->division_name = $sub_data->division_name;
                    $sub_data->district_name = $sub_data->district_name;
                    $sub_data->tehsil_name = $sub_data->tehsil_name;
                    $sub_data->ce_name = $sub_data->ce_name;
                    $sub_data->se_name = $sub_data->se_name;
                    $sub_data->ee_name = $sub_data->ee_name;
                    $sub_data->sdo_name = $sub_data->sdo_name;
                    $sub_data->name = $sub_data->name;
                    $sub_data->designation = $sub_data->designation;
                     
                    // record a row in Excel row as per column sequence
                    $rec_row =  array($counter,$sub_data->province_name,$sub_data->zone_name,$sub_data->division_name,
                                    $sub_data->district_name,
                                    $sub_data->tehsil_name,
                                    $sub_data->ce_name,
                                    $sub_data->se_name,
                                    $sub_data->ee_name,
                                    $sub_data->sdo_name,
                                    $sub_data->name,
                                    $sub_data->designation
                                );

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-sub-engineer-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
