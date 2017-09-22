<?php
    header("Content-type:text/html;charset=utf-8");
    import("Org.PHPExcel.Classes.PHPExcel");
    import("Think.Image");
    import("Think.Upload");
/**
 * 读取excel的数据
 * @param  string $filename Excel表的位置
 * @param  string $encode 编码
 * @return $excelData       数组
 */
    function ImportExcel($filename,$encode='utf-8'){

        $objReader = PHPExcel_IOFactory::createReader('Excel5');

        $objReader->setReadDataOnly(true);

        $objPHPExcel = $objReader->load($filename);

        $objWorksheet = $objPHPExcel->getActiveSheet();

        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $excelData = array();
        for ($row = 1; $row <= $highestRow; $row++) {
            for ($col = 0; $col < $highestColumnIndex; $col++) {
                $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            }
        }
        return $excelData;
    }
//图片上传




