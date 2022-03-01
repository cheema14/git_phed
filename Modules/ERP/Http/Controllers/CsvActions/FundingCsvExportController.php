<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Funding;

class FundingCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Funding();
            $query_obj = $query_obj->fetch_funding_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Funding Status");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $funding_data){
                    
                    $funding_data->id = $funding_data->id;
                    $funding_data->funding_status = $funding_data->funding_status;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$funding_data->funding_status);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-funding-status-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
