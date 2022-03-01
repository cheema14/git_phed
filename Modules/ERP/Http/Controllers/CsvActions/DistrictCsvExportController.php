<?php

namespace Modules\ERP\Http\Controllers\CsvActions;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ERP\Entities\District;

class DistrictCsvExportController extends Controller
{
    public function __invoke(Request $request)
    {
        
            $query_obj = new District();
            $query_obj = $query_obj->fetch_district_export_data();
        
         
            $all_data = $query_obj;
            
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            // Mention column names of excel sheet

            $columns = array("id","Province Code","Province Name","Zone Code","Zone Name","Division Code","Division Name","District Name");
        
            $callback = function() use ($all_data, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($all_data as $district_data){
                    
                    $district_data->id = $district_data->id;
                    $district_data->province_id = $district_data->province_id;
                    $district_data->province_name = $district_data->province_name;
                    $district_data->zone_id = $district_data->zone_id;
                    $district_data->zone_name = $district_data->zone_name;
                    $district_data->division_id = $district_data->division_id;
                    $district_data->division_name = $district_data->division_name;
                    $district_data->district_name = $district_data->district_name;
                    
                    // record a row in Excel row as per column sequence
                    $rec_row = array($counter,$district_data->province_id,$district_data->province_name,$district_data->zone_id,$district_data->zone_name,$district_data->division_id,$district_data->division_name,$district_data->district_name);

                    fputcsv($file, $rec_row);
                    $counter++;
                }
                fclose($file);
            };
        
            return response()->streamDownload($callback, 'all-district-data' . date('d-m-Y-H:i:s').'.csv', $headers);
    }
}
