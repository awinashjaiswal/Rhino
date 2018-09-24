<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$from = "A1"; // or any value
$to = "E1"; // or any value
$spreadsheet->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold( true );
$sheet->setCellValue('A1', 'Id');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'caste');
$sheet->setCellValue('D1', 'Board');
$sheet->setCellValue('E1', 'Percent');



$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
?>