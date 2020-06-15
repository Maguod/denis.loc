<?php


namespace App\UseCases\ExcelToBd;

use App\Entity\Excel\Excel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;


class ExcelBd extends Model
{
    public $cells = [
        'A' => 'seller',
        'B' => 'type',
        'C' => 'code',
        'E'  => 'price',
        'G' => 'note'
    ] ;
//    public $catCells = [
//        'A' => 'seller',
//        'B' => 'original',
//    ] ;

    public $aliace_cells = [
        'seller' =>  'ПРОИЗВОДИТЕЛЬ',
        'type' => 'Тип запчасти',
        'code' =>  'номерexist',
        'price' => 'цена',
        'note' =>  'примечания',
    ];



    /**
     * @param Request $request
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */

    /*store переименовал в get*/
    public function getData($id)
    {

        $file = Excel::findOrFail($id);

        $excel = new ExcelBd();
//        $fileName = Storage::get($file->uploadIn);
        $spreadsheet = IOFactory::load('excel/'. $file->name);

        $spreadsheet->setActiveSheetIndex(0); /*Указываем активный лист документа*/
        $sheet = $spreadsheet->getActiveSheet();/*и получаем его*/
        $rowIterator = $sheet->getRowIterator();
        $arr = [];
        foreach($rowIterator as $row) {
            if($row->getRowIndex() !== 1) {
                $cellIterator = $row->getCellIterator();

                foreach($cellIterator as $cell) {

                    $cellPath = $cell->getColumn();

                    if(isset($excel->cells[$cellPath])) {
                        if($cellPath === "E") {
                            $value = (float) str_replace (',', '.', $cell->getCalculatedValue());
                            $arr[$row->getRowIndex() - 1][$excel->cells[$cellPath]] = $value;
                        }else {
                            $arr[$row->getRowIndex() - 1][$excel->cells[$cellPath]] = $cell->getCalculatedValue();
                        }

                    }

                }
            }
        }
        unset($excel);unset($file);
        return $arr;
    }

}