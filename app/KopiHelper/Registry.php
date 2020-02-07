<?php
namespace App\KopiHelper;

class Registry
{
    const UPLOAD_FOLDER_KEDAI = "public/kedai/";

    const TABLE_KEDAI = "kedai";

    const ROASTING = array(
        "light" => "LIGHT ROAST",
        "medium" => "MEDIUM ROAST",
        "mediumdark" => "MEDIUM DARK ROAST",
        "dark" => "DARK ROAST"
    );

    const THEME_PARTS = array(
        "box" => array("box", "panel panel-dark"),
        "head" => array("box-header", "panel-heading"),
        "body" => array("box-body", "panel-body"),
    );

    const UPLOAD_SIZE_2MB = 2097152;
    const UPLOAD_SIZE_4MB = 4097152;

    const APP_MODE_DEV = "DEV";
    const APP_MODE_PROD = "PROD";

    const MONTHS = [
        1 => "Januari",
        2 => "Februari",
        3 => "Maret",
        4 => "April",
        5 => "Mei",
        6 => "Juni",
        7 => "Juli",
        8 => "Agustus",
        9 => "September",
        10 => "Oktober",
        11 => "November",
        12 => "Desember"
    ];
}
