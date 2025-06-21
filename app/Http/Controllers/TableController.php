<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $table1 = $this->generateSampleTable1();
        $table2 = $this->processTable2($table1);

        return view('index', compact('table1', 'table2'));
    }

    private function generateSampleTable1()
    {
        // Data from the assessment image
        $data = [41, 18, 21, 63, 2, 53, 5, 57, 60, 93, 28, 3, 90, 39, 80, 88, 49, 60, 26, 28];
        $table = [];
        foreach ($data as $index => $value) {
            $table[] = [
                'cell' => 'A' . ($index + 1),
                'value' => $value
            ];
        }
        return $table;
    }

    private function processTable2($table1)
    {
        $cellValues = array_column($table1, 'value', 'cell');

        // Calculate Table 2 values based on the formulas
        $alpha = ($cellValues['A5'] ?? 0) + ($cellValues['A20'] ?? 0);
        $beta = ($cellValues['A7'] ?? 0) !== 0 ? ($cellValues['A15'] ?? 0) / $cellValues['A7'] : 0;
        $charlie = ($cellValues['A13'] ?? 0) * ($cellValues['A12'] ?? 0);

        return [
            'Alpha' => $alpha,
            'Beta' => $beta,
            'Charlie' => $charlie,
        ];
    }
}