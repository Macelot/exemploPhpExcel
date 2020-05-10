<?php 
//ler xlsx
echo "<br>Xls<br>";

require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$inputFileName = './alunos.xlsx';
echo $inputFileName;

try {
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
	\PhpOffice\PhpSpreadsheet\Shared\File::setUseUploadTempDirectory(true);
	$worksheet = $spreadsheet->getActiveSheet();
	
	//  Get worksheet dimensions
	$highestColumn = $worksheet->getHighestColumn();
	$highestRow = $worksheet->getHighestRow();
	echo "<br>..quantidade de linhas ".$highestRow;
	//  Loop through each row of the worksheet in turn
	$linha=1;
	foreach ($worksheet->getRowIterator() as $row) {
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
														   //    even if a cell value is not set.
														   // By default, only cells that have a value
														   //    set will be iterated.
		echo "<br>".$worksheet->getCell('B'.$linha)->getValue();
		$linha++;
		//all cells
		//foreach ($cellIterator as $cell) {
			//echo $cell->getValue() . PHP_EOL;		
		//}
	}
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	echo "Erro";
}
echo "<br>Fim";
?>