<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\SubEngineer;

class SubCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new SubEngineer();
            $query_obj = $query_obj->fetch_sub_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Province","Zone","Division","District","Tehsil","Chief Engineer","Supr Engineer Name","EE Engineer Name","SDO Name","Designation");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $sdo_data){
                    
                    $sdo_data->id = $sdo_data->id;
                    $sdo_data->province_name = $sdo_data->province_name;
                    $sdo_data->zone_name = $sdo_data->zone_name;
                    $sdo_data->division_name = $sdo_data->division_name;
                    $sdo_data->district_name = $sdo_data->district_name;
                    $sdo_data->tehsil_name = $sdo_data->tehsil_name;
                    $sdo_data->ce_name = $sdo_data->ce_name;
                    $sdo_data->se_name = $sdo_data->se_name;
                    $sdo_data->ee_name = $sdo_data->ee_name;
                    $sdo_data->name = $sdo_data->name;
                    $sdo_data->designation = $sdo_data->designation;
                     
                    // record a row in Excel row as per column sequence
                    $rec_row =  array($counter,$sdo_data->province_name,$sdo_data->zone_name,$sdo_data->division_name,
                                    $sdo_data->district_name,
                                    $sdo_data->tehsil_name,
                                    $sdo_data->ce_name,
                                    $sdo_data->se_name,
                                    $sdo_data->ee_name,
                                    $sdo_data->name,
                                    $sdo_data->designation
                                );

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-sdo-engineer-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
