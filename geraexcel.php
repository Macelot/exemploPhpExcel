<?php 
//gerar xlsx
    require './vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\IOFactory;
	
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    
	date_default_timezone_set("America/Sao_Paulo");
    $myExcelFile = date("H_i_s_d-m-Y")."_.xlsx";
    mb_internal_encoding('UTF-8');
	//$fileType = 'Excel5';//excel e writer < 2007
        	
	$spreadsheet = new Spreadsheet();
	$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'Domain')
		->setCellValue('B1', 'Category')
		->setCellValue('C1', 'Nr. Pages');
 
	$spreadsheet->setActiveSheetIndex(0)
		 ->setCellValue('A2', 'CoursesWeb.net')
		 ->setCellValue('B2', 'Web Development')
		 ->setCellValue('C2', '4000');

		$spreadsheet->setActiveSheetIndex(0)
		 ->setCellValue('A3', 'MarPlo.net')
		 ->setCellValue('B3', 'Courses & Games')
		 ->setCellValue('C3', '15000');

		//set style for A1,B1,C1 cells
		$cell_st =[
		 'font' =>['bold' => true],
		 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
		 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
		];
		$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($cell_st);

		//set columns width
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);

		$spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet

		//make object of the Xlsx class to save the excel file
		$writer = new Xlsx($spreadsheet);
		$fxls ='excel-file_1.xlsx';
		$writer->save($fxls);
?>