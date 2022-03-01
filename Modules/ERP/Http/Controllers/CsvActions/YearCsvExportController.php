<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Year;

class YearCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Year();
            $query_obj = $query_obj->fetch_year_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Year Code","Description");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $year_data){
                    
                    $year_data->id = $year_data->id;
                    $year_data->code = $year_data->code;
                    $year_data->description = $year_data->description;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$year_data->code,$year_data->description);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-year-codes-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
