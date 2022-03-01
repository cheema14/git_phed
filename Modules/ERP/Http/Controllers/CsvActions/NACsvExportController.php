<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Na;

class NACsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new Na();
            $query_obj = $query_obj->fetch_na_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","MNA Name","NA Code","NA Name","Contact No","Short Description");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $na_data){
                    
                    $na_data->id = $na_data->id;
                    $na_data->mna_name = $na_data->mna_name;
                    $na_data->na_code = $na_data->na_code;
                    $na_data->na_name = $na_data->na_name;
                    $na_data->contact_no = $na_data->contact_no;
                    $na_data->short_description = $na_data->short_description;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$na_data->mna_name,$na_data->na_code,$na_data->na_name,$na_data->contact_no,$na_data->short_description);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-na-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
