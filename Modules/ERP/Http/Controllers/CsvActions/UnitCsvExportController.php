<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Unit;

class UnitCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Unit();
            $query_obj = $query_obj->fetch_unit_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("Sr No","Short Description","Unit Description");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $unit_data){
                    
                    $unit_data->id = $unit_data->id;
                    $unit_data->short_desc = $unit_data->short_desc;
                    $unit_data->unit_desc = $unit_data->unit_desc;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$unit_data->short_desc,$unit_data->unit_desc);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-unit-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
