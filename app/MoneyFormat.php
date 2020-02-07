<?php

namespace App;

class MoneyFormat
{
    public function rupiah ($angka, $decimal = 2) {
        $rupiah = number_format($angka , $decimal, ',' , '.' );
        return $rupiah;
    }

    public function terbilang ($angka,$setsatuan = false) {

        $angka = (float)$angka;

        $satuan = $setsatuan == true ?  " Rupiah" : "";

        $bilangan = array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas');

        if ($angka < 12) {
            $res = $bilangan[$angka]. $satuan;
        } else if ($angka < 20) {
            $res = $bilangan[$angka - 10] . ' Belas' . $satuan;
        } else if ($angka < 100) {
            $hasil_bagi = (int)($angka / 10);
            $hasil_mod = $angka % 10;
            $res = trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod])) . $satuan;
        } else if ($angka < 200) {
            $res = sprintf('Seratus %s', $this->terbilang($angka - 100)) . $satuan;
        } else if ($angka < 1000) {
            $hasil_bagi = (int)($angka / 100);
            $hasil_mod = $angka % 100;
            $res = trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], $this->terbilang($hasil_mod))) . $satuan;
        } else if ($angka < 2000) {
            $res = trim(sprintf('Seribu %s', $this->terbilang($angka - 1000))) . $satuan;
        } else if ($angka < 1000000) {
            $hasil_bagi = (int)($angka / 1000);
            $hasil_mod = $angka % 1000;
            $res = sprintf('%s Ribu %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)). $satuan;
        } else if ($angka < 1000000000) {
            $hasil_bagi = (int)($angka / 1000000);
            $hasil_mod = $angka % 1000000;
            $res = trim(sprintf('%s Juta %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod))). $satuan;
        } else if ($angka < 1000000000000) {
            $hasil_bagi = (int)($angka / 1000000000);
            $hasil_mod = fmod($angka, 1000000000);
            $res = trim(sprintf('%s Milyar %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod))). $satuan;
        } else if ($angka < 1000000000000000) {
            $hasil_bagi = $angka / 1000000000000;
            $hasil_mod = fmod($angka, 1000000000000);
            $res = trim(sprintf('%s Triliun %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod))). $satuan;
        }

        return $res . $satuan;
    }
}
