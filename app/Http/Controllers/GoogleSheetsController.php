<?php

namespace App\Http\Controllers;

use Google\Service\Sheets;
use Illuminate\Http\Request;
use App\Http\Services\GoogleSheetsServices;

class GoogleSheetsController extends Controller {

    public function rawArraySheet(Request $request) {
        $data = (new GoogleSheetsServices())->readSheet();
        return response()->json($data);
    }

    public function previewSheet() {
        $data = (new GoogleSheetsServices())->readSheet();
        return view('sheetview')->with('sheet_array', $data);
    }

    public function genrateReport(Request $request) {
        $fileName = 'report-genrate-client.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        $columns = array('No', 'Company', 'Contact Person', 'Client Name', 'Country');
        $tasks = (new GoogleSheetsServices())->readSheet()->values;
        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach (array_slice($tasks, 1) as $task) {
                $row['No'] = $task[0];
                $row['Company'] = $task[1];
                $row['Contact Person'] = $task[2];
                $row['Client Name'] = $task[3];
                $row['Country'] = $task[4];
                fputcsv($file, array($row['No'], $row['Company'], $row['Contact Person'], $row['Client Name'], $row['Country']));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

}
?>