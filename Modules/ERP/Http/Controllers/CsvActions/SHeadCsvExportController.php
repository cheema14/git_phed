<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\SubHead;

class SHeadCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Subhead();
            $query_obj = $query_obj->fetch_shead_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Main Head","Sub Head Title");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $sub_head_data){
                    
                    $sub_head_data->id = $sub_head_data->id;
                    $sub_head_data->infra_desc = $sub_head_data->infra_desc;
                    $sub_head_data->sub_head_desc = $sub_head_data->sub_head_desc;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$sub_head_data->infra_desc,$sub_head_data->sub_head_desc);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-sub-head-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
