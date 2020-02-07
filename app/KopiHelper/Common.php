<?php

namespace App\KopiHelper;

use App\Exceptions\FileSizeTooBigException;
use App\Models\Master\Periode;
use App\Tooltip;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Litipk\BigNumbers\Decimal;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Common {

    /**
     * menyalin sebagian isi array ke array lain, otomatis mengisikan null jika tidak menemukan $key ybs dari $srcArr
     * @param $srcArr array yang akan dicopy
     * @param $arrKeysToCopy array nama key yg akan dicopy dari $srcArr
     * @return array
     */
    static function copyFrom($srcArr, $arrKeysToCopy = null){
        $filtered = [];
        $keysToInclude = $arrKeysToCopy ?? [];
        if (count($keysToInclude) == 0) return $srcArr;
        foreach ($keysToInclude as $k) {
            $filtered[$k] = $srcArr[$k] ?? null;
        }
        return $filtered;
    }

    static function clearFormatDecimal($data){

        $val = 0;

        if (is_string($data)) {
            if ($data == '') return 0;

            $delimiter = [".",","];
            $replace = ["","."];
            //TODO @arief: periksa lagi currency format yang belum memakai '.' sebagai thousand delimiter, dan ',' sebagai decimal delimiter

            $val = str_replace($delimiter, $replace, $data);
        }
        else if(is_numeric($data))
            $val = $data;

        return $val;
    }

    /**
     * mendapatkan decode dt0 dari request _GET, return -1 jika null dan string kosong
     * @return bool|int|string
     */
    static function dt0FromGET(){
        return self::idFromArray('dt0', $_GET);
    }

    static function dt1FromGET(){
        return self::idFromArray('dt1', $_GET);
    }

    /**
     * mendapatkan decode prk dari request _GET, return -1 jika null dan string kosong
     * @return bool|int|string
     */
    static function prkFromGET(){
        return self::idFromArray('prk', $_GET);
    }

    /**
     * mendapatkan decode prk dari request _GET, return -1 jika null dan string kosong
     * @return bool|int|string
     */
    static function idFromGET(){
        return self::idFromArray('id', $_GET);
    }

    /**
     * mendapatkan decode id dari array, return -1 jika null dan string kosong
     * @param $idKeyName
     * @param $srcArray
     * @return bool|int|string
     */
    static function idFromArray($idKeyName, $srcArray){
        $encodedId = $srcArray[$idKeyName] ?? -1; // handle null atau tidak diset
        $encodedId = ($encodedId != '') ? $encodedId : -1; // handle string kosong
        if ($encodedId == -1) return -1;

        return base64_decode($encodedId);
    }

		/**
		* format to indonesia
		* @param <type> $month_code 01-12
		* @return string Januari-Desember
		*/
    static function indonesian_month($month) {
        $defs = [
            "01" => "Januari"   , "02" => "Februari"  ,
            "03" => "Maret"     , "04" => "April"     ,
            "05" => "Mei"       , "06" => "Juni"      ,
            "07" => "Juli"      , "08" => "Agustus"   ,
            "09" => "September" , "10" => "Oktober"   ,
            "11" => "November"  , "12" => "Desember"  ,
        ];
        return $defs[$month] ?? "-";
	}

    static function arrayMonth() {
        $arr = [
            "1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April"  ,"5" => "Mei" , "6" => "Juni",
            "7" => "Juli", "8" => "Agustus", "9" => "September" , "10" => "Oktober", "11" => "November", "12" => "Desember" ,
        ];
        return $arr;
	}


		/**
		* change date format to indonesia
		* @param <type> $month
		* @return string
		*/
		static function indonesian_date($yyyymmdd) {
			if(! $yyyymmdd) return "";
            list($year, $month, $day) = explode('-', $yyyymmdd);
            $new_date = $day ." ". self::indonesian_month($month) . " ". $year;
            return $new_date;
		}

    /**
     * change date format to indonesia
     * @param <type> $month
     * @return string
     */
    static function indonesian_month_year($yyyymm) {
        if(! $yyyymm) return "";
        list($year, $month) = explode('-', $yyyymm);
        $new_date = self::indonesian_month($month) . " ". $year;
        return $new_date;
    }


		/**
		 * mengambil int tahun dan bulan + 1, 3 digit nama bulan,
         * @return array
		 * */
    static function getTahunBulanPlus1(){
        $tahun = date('Y');
        $intBulan = date('m');
        $intBulan = $intBulan + 1;
        if($intBulan > 12){
            $tahun = $tahun + 1;
            $intBulan = 1;
        }

        $bulan = date("M", mktime(0, 0, 0, $intBulan, 10));


        return array($tahun, $bulan, (int)$intBulan, 1);
    }

    static function getNextPeriode(){
        $periode = Common::getPeriodeByExistingDate();
        $periode = $periode + 1;
        $tahun = date("Y");
        $intBulan = date("m");

        try{
            $pid = Common::getPidByPeriod($tahun,$intBulan,$periode);
            $bulan = date("M", mktime(0, 0, 0, $intBulan, 10));
        }catch (\Exception $e){
            list($tahun, $bulan, $intBulan) = Common::getTahunBulanPlus1();
            $periode = 1;
        }

        return array($tahun, $bulan, (int)$intBulan, $periode);
    }


    // todo : pls discuss nama fungsi dan behaviour, karena apabila 1024 bytes, 1048576 dan
    // todo : 1073741824, hasilnya semua sama2  return = 1 (MB ?)
    static function convertToMb($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 0);
        }
        elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 0);
        }
        elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 0);
        }
        elseif ($bytes >= 1) {
            return $bytes;
        }
        // TODO : remove duplicates
//        elseif ($bytes > 1) {
//            $bytes = $bytes; // left and right part of assignment are equal
//        }
//        elseif ($bytes == 1) {
//            $bytes = $bytes; // left and right part of assignment are equal
//        }
        else {
            return '0';
        }

        return $bytes;
    }

    /**
     * A version of in_array() that does a sub string match on $needle
     *
     * @param  mixed   $needle    The searched value
     * @param  array   $haystack  The array to search in
     * @return boolean
     */
    static function substr_in_array($needle, array $haystack)
    {
        return array_reduce($haystack, function ($inArray, $item) use ($needle) {
            return $inArray || false !== strpos($item, $needle);
        }, false);
    }

    static function isMultiyears($tanggalawal, $tanggalakhir)
    {
        if(date('Y', strtotime($tanggalawal)) != date('Y', strtotime($tanggalakhir) )) return true;

        return false;
    }

    static function explodeHeaderBukopin($data, $index)
    {
        $res = explode(' : ', $data[$index]);
        return $res[1];
    }

    static public function matchCurrentUrlWithPattern(){
        try {
            $routes = self::getRoutesByMethod("GET");

            $similars = array();

            //todo aria->self, cari cara lebih baik?
            foreach ($routes as $key => $value) {
                $replacedKey = preg_replace('/[{].*[}]/U', '*', $key);
                if (Request::is($replacedKey)) {
                    $pattern = $key;
                    $similars[$pattern] = levenshtein($replacedKey, Request::decodedPath());
                }
            }
            asort($similars);
            reset($similars);
            $tooltips = Tooltip::where("url", key($similars))->first();

            $text = $tooltips != null ? ("$tooltips->url:<br>$tooltips->text") : '';
            return $text;
        } catch (\Exception $e) {
            return "Gagal mengambil tooltip!";
        }
    }

    static function getRoutesByMethod(string $method){
        $routes = Route::getRoutes()->getRoutesByMethod();
        return $routes[$method];
    }

    static function generatePeriod($tahun,$bulan){
        $period = Periode::select("pid")
            ->where("bulan","=",$bulan)
            ->where("tahun","=",$tahun)
            ->orderBy("startdate","asc")
            ->get();
        $pid = array();
        foreach ($period as $itemPeriod){
            $pid[] = $itemPeriod['pid'];
        }
        $data = str_replace("[","{",json_encode($pid));
        $data = str_replace("]","}",$data);
        return $data;
    }

    static function getPidByPeriod($tahun,$bulan,$periode){
        $period = Periode::select("pid")
            ->where("bulan","=",$bulan)
            ->where("tahun","=",$tahun)
            ->orderBy("startdate","asc")
            ->get();
        return $period[$periode-1]['pid'];
    }

    static function getDetailPeriode($tahun,$bulan,$periode){
        $pid = Common::getPidByPeriod($tahun,$bulan,$periode);
        $period = Periode::where("pid","=",$pid)
            ->first();
        return $period;
    }


    static function getTahunBulanPeriode(){
        $tahun = date('Y');
        $intBulan = date('m');
        $bulan = date("M", mktime(0, 0, 0, $intBulan, 10));
        $periode = Common::getPeriodeByExistingDate();
        return array($tahun, $bulan, (int)$intBulan,$periode);
    }

    static function getTahunBulanPeriodeMin1(){
        $periode = Common::getPeriodeByExistingDate();
        $tahun = date('Y');
        $intBulan = date('m');
        if($periode == 1){
            $intBulan = $intBulan - 1;
            if($intBulan < 1){
                $tahun = $tahun - 1;
                $intBulan = 12;
            }
            $listPeriode = Periode::select("pid")
                ->where("bulan","=",$intBulan)
                ->where("tahun","=",$tahun)
                ->get();
            $periode = count($listPeriode);
        }else{
            $periode = $periode - 1;
        }
        $bulan = date("M", mktime(0, 0, 0, $intBulan, 10));
        return array($tahun, $bulan, (int)$intBulan, $periode);
    }

    static function getTahunBulanPeriodeMin1Before($tahun,$bulan,$periode){
        $tahun = $tahun;
        $intBulan = $bulan;
        if($periode == 1){
            $intBulan = $intBulan - 1;
            if($intBulan < 1){
                $tahun = $tahun - 1;
                $intBulan = 12;
            }
            $listPeriode = Periode::select("pid")
                ->where("bulan","=",$intBulan)
                ->where("tahun","=",$tahun)
                ->get();
            $periode = count($listPeriode);
        }else{
            $periode = $periode - 1;
        }
        $bulan = date("M", mktime(0, 0, 0, $intBulan, 10));
        return array($tahun, $bulan, (int)$intBulan, $periode);
    }

    static function getPeriodeByExistingDate(){
        $tahun = date("Y");
        $bulan = date("m");
        $dateNow = date("Y-m-d");
        $pidNow = Periode::select("pid")
            ->where("bulan","=",$bulan)
            ->where("tahun","=",$tahun)
            ->where("startdate","<=",$dateNow)
            ->where("enddate",">=",$dateNow)
            ->first();
        $periode = Periode::select("pid")
            ->where("bulan","=",$bulan)
            ->where("tahun","=",$tahun)
            ->orderBy("startdate","asc")
            ->get();
        foreach ($periode as $index => $item){
            if($pidNow['pid'] == $item['pid']){
                return $index + 1;
            }
        }
        return 0;
    }

    static function numberToRomawi($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
    static function weekOfMonth($date) {
        //Get the first day of the month.
        $firstOfMonth = strtotime(date("Y-m-01", $date));
        //Apply above formula.
        return intval(date("W", $date)) - intval(date("W", $firstOfMonth)) + 1;
    }

    static function uploadFile($file, $storage, $filename) {

        if($file->getSize() > floatval(Registry::UPLOAD_SIZE_2MB))
            throw new FileSizeTooBigException();


        try {
            $file->storeAs($storage, $filename);
        }
        catch (Exception $exception) {
            //throw new Exc\FileUploadFailException();
        }

        return $filename;
    }
}
