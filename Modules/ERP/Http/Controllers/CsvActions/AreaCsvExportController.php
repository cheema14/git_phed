<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Area;

class AreaCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Area();
            $query_obj = $query_obj->fetch_area_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("Sr No","Title");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $area_data){
                    
                    $area_data->id = $area_data->id;
                    $area_data->area_title = $area_data->area_title;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$area_data->area_title);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-area-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
