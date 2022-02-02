<?php

use App\Models\Auto;

if (!empty($list)) {

    header("Content-Disposition: attachment; filename=\"export.xls\"");
    header("Content-Type: application/vnd.ms-excel;");
    header("Pragma: no-cache");
    header("Expires: 0");


    $obj = new Auto();
    $fp = fopen("php://output", 'w');

    fputcsv($fp, $obj->sortable, "\t");

    foreach ($list as $asd) {
        $new_data = array();

        // Перебираю всі данні
        foreach ($obj->sortable as $key) {
            $new_data[$key] = $asd->$key;
        }

        fputcsv($fp, $new_data, "\t");
    }

    fclose($fp);
    exit();
}


exit('Помилка. Зайдіть з потрібної сторінки');
