<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\SchemeType;

class STypeCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new SchemeType();
            $query_obj = $query_obj->fetch_stype_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("Sr No","Type","Short Description");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $stype_data){
                    
                    $stype_data->id = $stype_data->id;
                    $stype_data->type_title = $stype_data->type_title;
                    $stype_data->short_desc = $stype_data->short_desc;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$stype_data->type_title,$stype_data->short_desc);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-stype-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
