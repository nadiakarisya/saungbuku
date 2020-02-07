<?php
if (!function_exists('sipat_base64_encode')) {
    function sipat_base64_encode($x) {
        return env("ENCODE_URL") === TRUE ? base64_encode($x) : $x;
    }
}

if (!function_exists('sipat_base64_decode')) {
    function sipat_base64_decode($x) {
        return env("ENCODE_URL") === TRUE ? base64_decode($x) : $x;
    }
}

if (!function_exists('indonesian_date')) {
    function indonesian_date(string $date) {
        setlocale(LC_TIME, 'id_ID', 'id', 'indonesia_Indonesia', 'indonesia');
        return strftime("%d %B %Y", strtotime($date));
    }
}

if (!function_exists('indonesian_date_month_year')) {
    function indonesian_date_month_year(string $date) {
        setlocale(LC_TIME, 'id_ID', 'id', 'indonesia_Indonesia', 'indonesia');
        return strftime("%B %Y", strtotime($date));
    }
}

if (!function_exists('indonesian_date_date')) {
    function indonesian_date_date(string $date) {
        setlocale(LC_TIME, 'id_ID', 'id', 'indonesia_Indonesia', 'indonesia');
        return strftime("%d", strtotime($date));
    }
}

if (!function_exists('indonesian_date_day')) {
    function indonesian_date_day(string $date) {
        setlocale(LC_TIME, 'id_ID', 'id', 'indonesia_Indonesia', 'indonesia');
        return strftime("%A", strtotime($date));
    }
}

if (!function_exists('indonesian_date_month')) {
    function indonesian_date_month(string $date) {
        setlocale(LC_TIME, 'id_ID', 'id', 'indonesia_Indonesia', 'indonesia');
        return strftime("%B", strtotime($date));
    }
}

if (!function_exists('indonesian_date_year')) {
    function indonesian_date_year(string $date) {
        setlocale(LC_TIME, 'id_ID', 'id', 'indonesia_Indonesia', 'indonesia');
        return strftime("%Y", strtotime($date));
    }
}

if (!function_exists('container')) {
    function container(string $part) {
        $index = config("view.theme") ? 0 : 1;

        return \App\KopiHelper\Registry::THEME_PARTS[$part][$index];
    }
}

if (!function_exists('authz_string')) {
    /**
     * @deprecated Tidak usah pakai fungsi ini
     * @param string $module
     * @param string $submodule
     * @param string $item
     * @return string
     */
    function authz_string(string $module, string $submodule, string $item = "ALL") {
        return $module . "_" . $submodule . "_" . $item;
    }
}

if (!function_exists('authz')) {
    /**
     * Membungkus id-id permission yang dikirimkan akan dibungkus otomatis terbungkus array dan dijadikan string json
     * @param int ...$arr
     * @return false|string
     */
    function authz(int ...$arr){
        return json_encode($arr);
    }
}
