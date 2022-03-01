<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\ExeEngineer;

class EECsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new ExeEngineer();
            $query_obj = $query_obj->fetch_ee_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Province","Zone","Division","District","Chief Engineer","Supr Engineer Name","EE Engineer Name","Designation");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $ee_data){
                    
                    $ee_data->id = $ee_data->id;
                    $ee_data->province_name = $ee_data->province_name;
                    $ee_data->zone_name = $ee_data->zone_name;
                    $ee_data->division_name = $ee_data->division_name;
                    $ee_data->district_name = $ee_data->district_name;
                    $ee_data->ce_name = $ee_data->ce_name;
                    $ee_data->se_name = $ee_data->se_name;
                    $ee_data->name = $ee_data->name;
                    $ee_data->designation = $ee_data->designation;
                     
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$ee_data->province_name,$ee_data->zone_name,$ee_data->division_name,$ee_data->district_name,$ee_data->ce_name,$ee_data->se_name,$ee_data->name,$ee_data->designation);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-exe-engineer-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
