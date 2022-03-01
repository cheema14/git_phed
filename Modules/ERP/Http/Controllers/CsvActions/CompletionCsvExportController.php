<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Completion;

class CompletionCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Completion();
            $query_obj = $query_obj->fetch_completion_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Completion Status");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $completion_data){
                    
                    $completion_data->id = $completion_data->id;
                    $completion_data->completion_status = $completion_data->completion_status;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$completion_data->completion_status);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-completion-status-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
