<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\SuprEngineer;

class SECsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new SuprEngineer();
            $query_obj = $query_obj->fetch_se_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Province","Zone","Division","Chief Engineer","Supr Engineer Name","Designation");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $se_data){
                    
                    $se_data->id = $se_data->id;
                    $se_data->province_name = $se_data->province_name;
                    $se_data->zone_name = $se_data->zone_name;
                    $se_data->division_name = $se_data->division_name;
                    $se_data->ce_name = $se_data->ce_name;
                    $se_data->name = $se_data->name;
                    $se_data->designation = $se_data->designation;
                     
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$se_data->province_name,$se_data->zone_name,$se_data->division_name,$se_data->ce_name,$se_data->name,$se_data->designation);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-supr-engineer-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
