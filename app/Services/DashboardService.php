<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 10-May-19
 * Time: 13:03
 */

namespace App\Services;


use App\KopiHelper\Common;
use App\KopiHelper\Registry;
use Illuminate\Support\Facades\DB;

class DashboardService
{

    private $user;
    private $unitap;
    private $unitLike;

    public function __construct($user)
    {
        $this->user = $user;
    }

}