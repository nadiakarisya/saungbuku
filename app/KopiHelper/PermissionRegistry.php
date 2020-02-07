<?php
namespace App\KopiHelper;

/**
 * Membuat entri permission, representasi satu row
 * @param int $id "id" permission
 * @param string $modul label modul
 * @param string $submodul label submodul
 * @param string $item label item, default 'ALL'
 * @return array
 */
function create(int $id, string $modul, string $submodul, string $item = "ALL"){
    return array(
        "id" => $id,
        "modul" => $modul,
        "submodul" => $submodul,
        "item" => $item
    );
}

class PermissionRegistry
{


}
