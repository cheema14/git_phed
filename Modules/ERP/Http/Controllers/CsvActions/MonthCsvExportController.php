<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Month;

class MonthCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Month();
            $query_obj = $query_obj->fetch_month_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Month Code","Description","Short Description");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $month_data){
                    
                    $month_data->id = $month_data->id;
                    $month_data->code = $month_data->code;
                    $month_data->description = $month_data->description;
                    $month_data->short_description = $month_data->short_description;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$month_data->code,$month_data->description,$month_data->short_description);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-month-codes-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
