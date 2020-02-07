<?php

function coloringCell($persen){
    // Beri warna pada cell sesuai kondisi
    if ($persen < 49) {
        $color = "#FF0000";
    }else if ($persen >= 50 and $persen <= 84){
        $color = "#DDDF0D";
    } else {
        $color = "#55BF3B";
    }
    return $color;
}

function coloringCellForExcel($persen){
    // Beri warna pada cell sesuai kondisi
    if ($persen < 49) {
        $color = "00FF0000";
    }else if ($persen >= 50 and $persen <= 84){
        $color = "00DDDF0D";
    } else {
        $color = "0055BF3B";
    }
    return $color;
}

function coloringTextInCell($persen){
    // Beri warna text pada cell sesuai kondisi
    if ($persen >= 50 and $persen <= 84){
        $color = "color:black;";
    } else {
        $color = "color:white;";
    }
    return $color;
}

function coloringTextInCellForExcel($persen){
    // Beri warna text pada cell sesuai kondisi
    if ($persen >= 50 and $persen <= 84){
        $color = \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK;
    } else {
        $color = \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE;
    }
    return $color;
}

function priceFormat($number){
    return number_format($number, 0, ',', '.');
}

function changeDateFormat($date){
    return date('d-m-Y', strtotime($date));
}

function changeDateFormatYmd($date){
    $tanggal = str_replace('/', '-', $date);
    return date('Y-m-d', strtotime($tanggal));
}

function stringToTimeWithReplace($date){
    $tanggal = str_replace('/', '-', $date);
    return strtotime($tanggal);
}

function changeDateTimeFormat($date){
    return date('d-m-Y H:i:s', strtotime($date));
}

function getMonthName($dateNumber){
    switch ($dateNumber) {
        case '1':
            $month = "JANUARI";
            break;
        case '2':
            $month = "FEBRUARI";
            break;
        case '3':
            $month = "MARET";
            break;
        case '4':
            $month = "APRIL";
            break;
        case '5':
            $month = "MEI";
            break;
        case '6':
            $month = "JUNI";
            break;
        case '7':
            $month = "JULI";
            break;
        case '8':
            $month = "AGUSTUS";
            break;
        case '9':
            $month = "SEPTEMBER";
            break;
        case '10':
            $month = "OKTOBER";
            break;
        case '11':
            $month = "NOVEMBER";
            break;
        case '12':
            $month = "DESEMBER";
            break;
        default:
            # code...
            break;
    }

    return $month;
}
