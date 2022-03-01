<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\ChiefEngineer;

class CECsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new ChiefEngineer();
            $query_obj = $query_obj->fetch_ce_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Province","Zone","Name","Designation");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $ce_data){
                    
                    $ce_data->id = $ce_data->id;
                    $ce_data->province_name = $ce_data->province_name;
                    $ce_data->zone_name = $ce_data->zone_name;
                    $ce_data->name = $ce_data->name;
                    $ce_data->designation = $ce_data->designation;
                     
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$ce_data->province_name,$ce_data->zone_name,$ce_data->name,$ce_data->designation);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-chief-engineer-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
