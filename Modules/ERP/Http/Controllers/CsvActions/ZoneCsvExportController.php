<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Zone;

class ZoneCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Zone();
            $query_obj = $query_obj->fetch_zone_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Province Code","Province Name","Zone Name");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $zone_data){
                    
                    $zone_data->id = $zone_data->id;
                    $zone_data->province_id = $zone_data->province_id;
                    $zone_data->province_name = $zone_data->province_name;
                    $zone_data->zone_name = $zone_data->zone_name;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$zone_data->province_id,$zone_data->province_name,$zone_data->zone_name);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-zone-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
