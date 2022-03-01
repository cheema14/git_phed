<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Division;

class DivisionCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Division();
            $query_obj = $query_obj->fetch_division_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Province Code","Province Name","Zone Code","Zone Name","Division Name");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $division_data){
                    
                    $division_data->id = $division_data->id;
                    $division_data->province_id = $division_data->province_id;
                    $division_data->province_name = $division_data->province_name;
                    $division_data->zone_id = $division_data->zone_id;
                    $division_data->zone_name = $division_data->zone_name;
                    $division_data->division_name = $division_data->division_name;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$division_data->province_id,$division_data->province_name,$division_data->zone_id,$division_data->zone_name,$division_data->division_name);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-division-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
