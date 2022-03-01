<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\Province;



class ProvinceCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        $query_obj = Province::where("id", "!=",0);

        $total_rows = $query_obj->count();
                //Processing orderBy cases
                
                $all_data = $query_obj->orderBy('id', 'ASC')
                ->get(['province.*']); 
                // return json_encode($all_data);
                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=file.csv",
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );
                $columns = array("Sr No","Province Code","Province Name","No of Districts","Department Name","Province Description");
                
                $callback = function() use ($all_data, $columns)
                {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
                    $counter = 1;
                    foreach($all_data as $province_data){
                        $province_data->province_name = $province_data->province_name;
                        $province_data->no_of_districts = $province_data->no_of_districts;
                        $province_data->dept_name = $province_data->dept_name;
                        $province_data->province_desc = $province_data->province_desc;
                        
                        $rec_row = array($counter,$province_data->id,$province_data->province_name, $province_data->no_of_districts, $province_data->dept_name,
                                        $province_data->province_desc);

                        fputcsv($file, $rec_row);
                        $counter++;
                    }
                    fclose($file);
                };
               
                return response()->streamDownload($callback, 'all-province-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
