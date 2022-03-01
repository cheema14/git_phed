<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\DetailHead;

class DHeadCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new DetailHead();
            $query_obj = $query_obj->fetch_dhead_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Main Head","Sub Head Title","Detail Head Description");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $detail_head_data){
                    
                    $detail_head_data->id = $detail_head_data->id;
                    $detail_head_data->infra_desc = $detail_head_data->infra_desc;
                    $detail_head_data->sub_head_desc = $detail_head_data->sub_head_desc;
                    $detail_head_data->detail_head_desc = $detail_head_data->detail_head_desc;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$detail_head_data->infra_desc,$detail_head_data->sub_head_desc,$detail_head_data->detail_head_desc);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-detail-head-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
