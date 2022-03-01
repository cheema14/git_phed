<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Pp;

class PPCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Pp();
            $query_obj = $query_obj->fetch_pp_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","MPA Name","PP Code","PP Name","Contact No","Short Description");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $pp_data){
                    
                    $pp_data->id = $pp_data->id;
                    $pp_data->mpa_name = $pp_data->mpa_name;
                    $pp_data->pp_code = $pp_data->pp_code;
                    $pp_data->pp_name = $pp_data->pp_name;
                    $pp_data->contact_no = $pp_data->contact_no;
                    $pp_data->short_description = $pp_data->short_description;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$pp_data->mpa_name,$pp_data->pp_code,$pp_data->pp_name,$pp_data->contact_no,$pp_data->short_description);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-pp-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
