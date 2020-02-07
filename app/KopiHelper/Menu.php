<?php

namespace App\KopiHelper;

/**
 * Membuat array untuk entri menu
 * @param string $label String yang akan muncul di menu
 * @param string|null $uri url menu
 * @param null $permission "id" permission yang disesuaikan dari PermissionRegistry.php
 * @param array|null $children submenu/subsubmenu
 * @return array
 */
function cr(string $label, string $uri = null, $permission = null, array $children = null){
    return array(
        "nama" => $label,
        "permission" => $permission == null ? array(null) : (is_array($permission) ? $permission : array($permission)),
        "uri" => $uri,
        "child" => $children
    );
}

/**
 * Mengambil url dari named route
 * @param string $routeName nama routing di web.php (->name('nameroute')
 * @return string
 */
function path(string $routeName){
    return route($routeName, [], false);
}

class Menu
{
    public static function getStructure()
    {
        //array berikut merupakan struktur menu yang akan tampil di aplikasi sipat.
        return array(
            cr("SEURAMOE", "", null),
            cr("IMPREST", "", range(71,93), array(
                cr("ALOKASI", "", range(71,73), array(
                    cr("INVESTASI", url("anggaran/dropping/investasi"), [71]),
                    cr("INVESTASI PER PRK", url("anggaran/dropping/prk"), [72]),
                    cr("OPERASI", url("anggaran/dropping/operasi"), [73]),
                )),
                cr("PERMINTAAN PLAFON", "", range(74,78), array(
                    cr("INVESTASI IDR", url("anggaran/permintaanplafon/prkperperiode"), [74]),
                    cr("INVESTASI VALAS", url("anggaran/permintaanplafon/valasperperiode"), [75]),
                    cr("OPERASI", url("anggaran/permintaanplafon/operasiperperiode"), [76]),
                    cr("SISA PERMINTAAN INVESTASI", url("anggaran/permintaanplafon/sisaperiodeinvestasi"), [77]),
                    cr("SISA PERMINTAAN OPERASI", url("anggaran/permintaanplafon/sisaperiodeoperasi"), [78]),
                )),
                cr("PENETAPAN PLAFON", "", range(79,82), array(
                    cr("INVESTASI IDR", url("anggaran/penetapanplafon/investasiidrperperiode"), [79]),
                    cr("INVESTASI VALAS", url("anggaran/penetapanplafon/investasivalasperperiode"), [80]),
                    cr("OPERASI", url("anggaran/penetapanplafon/operasiperperiode"), [81]),
                    cr("SURAT PENETAPAN", url("anggaran/penetapanplafon/suratpenetapan"), [82]),
                )),
                cr("PENGALIHAN", "", range(83,92), array(
                    cr("INVESTASI MOU", url("anggaran/pengalihandana/investasimouperperiode"), [83]),
                    cr("INVESTASI NON MOU", url("anggaran/pengalihandana/investasinonmouperperiode"), [84]),
                    cr("OPERASI MOU", url("anggaran/pengalihandana/operasimouperperiode"), [85]),
                    cr("OPERASI NON MOU", url("anggaran/pengalihandana/operasinonmouperperiode"), [86]),
                    cr("APPROVAL AI MOU", url("anggaran/pengalihandana/approveinvestasimouperperiode"), [87]),
                    cr("APPROVAL AO MOU", url("anggaran/pengalihandana/approveoperasimouperperiode"), [88]),
                    cr("APPROVAL AI NON MOU", url("anggaran/pengalihandana/approveinvestasinonmouperperiode"), [89]),
                    cr("APPROVAL AO NON MOU", url("anggaran/pengalihandana/approveoperasinonmouperperiode"), [90]),
                    cr("LAPORAN PROGRESS", url("anggaran/pengalihandana/laporanprogress"), [91]),
                    cr("APPROVAL REALISASI", url("anggaran/pengalihandana/approvalrealisasi"), [92]),
                )),
                cr("TRANSFER", url("anggaran/pengalihandana/transfer"), [93]),
            )),
            cr("PENGADAAN", "", array_merge([14,15,16], range(25,29), range(31,46), range(57,60), range(62,69)), array(
                cr("EXECUTION", "", array_merge([14,15,16,68,69], range(25,28), range(31,42)), array(
                    cr("DISPOSISI", path("anggaranmsk"), [14]),
                    cr("ANGGARAN MASUK", path("anggaranmsk"), [15]),
                    cr("NOTA DINAS", path("tbh_kontrak"), [16]),
                    cr("INPUT RKS", url("pengadaan/rks"),[26,27]),
                    cr("INPUT VFM", url("pengadaan/vfm"), [31,32,35,36]),
                    cr("INPUT SPK/KONTRAK", url("pengadaan/spk"), [37,38]),
                    cr("REVISI KONTRAK", path("index.revisikontrak"), [68,69]),
                    cr("INPUT SPB", url("pengadaan/spb"), [39,40]),
                    cr("INPUT INTEGRASI", url("pengadaan/integrasi"), [33,34]),
                    /*cr("INPUT LUNCURAN"),
                    cr("INPUT MULTI YEARS"),*/
                    cr("CLEARING PRK", url("pengadaan/clearing_prk"), [14,16]),
                    //cr("PEMBATALAN ND", url("pengadaan/del_notadinas")),
//                    cr("BATAL KONTRAK/PEMBATALAN", url("pengadaan/del_kontrak"),null),
                    cr("APPROVAL (RKS)", path("approval_mb.index"), [29]),
                    cr("APPROVAL (MA)", path("approval_ma.index"), [25]),
                    cr("APPROVAL (RKS AREA)", url("pengadaan/approverksarea"), [28]),
//                    cr("AKTIVASI KONTRAK"),
                    cr("LAPORAN PEKERJAAN", url("pengadaan/laporankerja"), [41,42]),
                )),
                cr("PENILAIAN", "", [43,44], array(
//                    cr("ADD RAPORT", url("penilaian"), [43,44]),
                    cr("INPUT RAPORT", url("penilaian/history"), [43,44])
                )),
                cr("PENAGIHAN", "", range(57,60), array(
                    cr("KONTRAK", url("penagihan/tagihan"), [57]),
                    cr("PPFA", url("penagihan/list_ppfa"), [58]),
                    cr("PPJ", url("penagihan/ppj"), [59,60]),
                )),
                cr("PERUBAHAN", "", array_merge(range(62,67), [30,31]), array(
                    cr("KOREKSI NOTA DINAS", url("kontrak-revisi"), range(62,67)),
                    cr("PEMBATALAN NOTA DINAS", url("pengadaan/notadinas"), [30,31]),
                    cr("KOREKSI KHS", url("khs-revisi"), range(62,67)),
                    cr("ADDENDUM KONTRAK", url("kontrakAddendum-revisi"), range(62,67)),
                    cr("ALIH ANGGARAN", url("kontrak-alih"), range(62,67)),
                )),
                cr("MOU", "", [45,46], array(
                    cr("INVESTASI", url("pengalihan/mou/jenis/investasi"), [45,46]),
                    cr("OPERASI", url("pengalihan/mou/jenis/operasi"), [45,46]),
                )),
            )),
            cr("VERIFIKASI", "", [17,18], array(
                cr("KONTRAK", url("verifikasi/siap_bayar"),[17]),
                cr("PPFA", url("verifikasi/ver_ppfa"),[18]),
            )),
            cr("ANGGARAN", "", range(1,12), array(
                cr("PRK", "", [1,2,3], array(
                    cr("AI", path("prkaiEbudgetIndex"), 1),
                    cr("AO NON PEMELIHARAAN", path("prkaoIndex"), 2),
                    cr("AO PEMELIHARAAN", path("prkao"), 2),
                    cr("CLEARING", path("clearing_prk_angg"), 3),
                )),
                cr("INPUT AI/AO", "", [4,5], array(
                    cr("INVESTASI", path("introai"), 4),
                    cr("OPERASI", path("introao"), 5)
                )),
                cr("PENERBITAN", "", [6,7], array(
                    cr("INVESTASI", path("penerbitanSKKI"), 6),
                    cr("OPERASI", path("penerbitanSKKO"), 7)
                )),
                cr("SUDAH TERBIT", "", [8,9], array(
                    cr("INVESTASI", path("anggterbitSKKI"), 8),
                    cr("OPERASI", path("anggterbitSKKO"), 9)
                )),
                cr("REVISI", null, [10,11], array(
                    cr("INVESTASI", path("revisiSKKI"), 10),
                    cr("OPERASI", path("revisiSKKO"), 11)
                )),
                cr("APPROVAL ANGGARAN", path("approvalAngg"), 12),
            )),
            cr("CASHCARD", "", array_merge(range(48,51),[32]), array(
                cr("SETTING LIMIT", url("cashcard/pagu"), 48),
                cr("TRANSAKSI", url("cashcard/transaksi"), 49),
                cr("REKONSILIASI", url("cashcard/rekon"), 50),
                cr("APPROVAL", url("cashcard/approval"), 32),
                cr("REPORT", url("cashcard/report"), 51),
            )),
            cr("PERSEKOT", "", [54,55,56], array(
                cr("PENGAJUAN", url("keuangan/persekot/pengajuan"), 54),
                cr("PERPANJANGAN", url("keuangan/persekot/perpanjangan"), 55),
                cr("LPJ PENGAJUAN", url("keuangan/persekot/lpj"), 56),
            )),
            cr("PROGRESS", "", null, array(
                cr("SKKI", url("progress/ai")),
                cr("SKKO", url("progress/ao"))
            )),
            cr("KEUANGAN", "", [19,20,21,22,52,53,61], array(
                cr("AGENDA TAGIHAN", url("keuangan/agenda"), 61),
                cr("VERIFIKASI", "", range(19,22), array(
                    cr("TAG KONTRAK", url("keuangan/ver_tagihan"), [19]),
                    cr("TAG PPFA", url("keuangan/ver_ppfawil"), [20]),
                    cr("PAJAK", url("keuangan/pajak-pembayaran"), [21]),
                    cr("PEMBAYARAN", url("keuangan/ver_bayar"), [22])
                )),
                /*cr("KOREKSI", url("keuangan/koreksi_bayar")),
                cr("RENCANA BAYAR", url("keuangan/m_rencanabyr")),*/
                cr("CEK PEMBAYARAN", path("listpembayarantagihan"), 52),
                cr("SURAT PEMBAYARAN", path("listsuratpembayaran"), 53),
            )),
            /*cr("SIP", "", null, array(
                cr("UPLOAD DATA", url("")),
                cr("BELUM TERKIRIM", url("")),
                cr("TERKIRIM", url("")),
            )),*/
            cr("MONITORING", "", null, array(
                cr("SKKI", "", null, array(
                    cr("SKKI", url("monitoring/monskki/detskki")),
                    cr("PER NO SKKI", url("monitoring/monskki/pernoskki")),
                    cr("PRK INVESTASI", url("monitoring/monskki/prkskki")),
                )),
                cr("SKKO", "", null, array(
                    cr("SKKO", url("monitoring/monskko/detskko")),
                    cr("PER NO SKKO", url("monitoring/monskko/pernoskko")),
                    cr("PRK OPERASI", url("monitoring/monskko/prkskko")),
                )),
                cr("ANGGARAN ALL", url("monitoring/monangg")),
                cr("KONTRAK", url("monitoring/monkontrak")),
                cr("TAGIHAN", url("monitoring/montagihan")),
                cr("PEMBAYARAN", url("monitoring/monpembayaran")),
//                cr("KONTRAK > SLA", url("monitoring/monkontraksla")),
                cr("STATUS KONTRAK", url("monitoring/monstatuskontrak")),
                cr("TIMEKEEPER", url("monitoring/timekeeper")),
                cr("INTEGRASI SAP", url("monitoring/monintegrasi")),
                cr("CARI REGISTER", url("monitoring/monregister")),
            )),
            cr("REPORT", "", null, array(
                cr("LRAI", url("report/lrai")),
                cr("LRAO", url("report/lrao")),
                cr("AI PER FUNGSI", url("report/aifungsi")),
                cr("AO PER FUNGSI", url("report/aofungsi")),
                cr("REPORT MURNI", url("report/murni")),
                cr("REPORT LUNCURAN", url("report/luncuran")),
//                cr("EXPORT A2K", url("report/a2k")),
                cr("JATUH TEMPO", url("report/jatuhtempo")),
            )),
            cr("ADMINISTRATOR", "", range(101,107), array(
                cr("GRUP PENGGUNA", path("group.index"), 101),
                cr("DAFTAR USER", path("user.index"), 102),
                cr("LIST UNIT", path("unit.index"), 103),
                cr("TOOLTIPS", url("administrator/tooltips"), 104),
                cr("BIDANG", url("administrator/bidang"), 103),
                //cr("SETTING", url("setting_datas"), 105),
                cr("ADMIN WILAYAH", path("settingadminwilayah"), 106),
                cr("VENDOR", url("vendor/vendor"), 107),
            )),
            cr("ADMINISTRATOR", "", Registry::SETTING_KEY_ADMIN_WILAYAH, array( //special case
                cr("DAFTAR USER", path("user.index"), Registry::SETTING_KEY_ADMIN_WILAYAH),
                cr("SETTING", url("setting_datas"), Registry::SETTING_KEY_ADMIN_WILAYAH),
                cr("BIDANG", url("master/sla"), Registry::SETTING_KEY_ADMIN_WILAYAH),
                cr("SLA", url("master/sla"), Registry::SETTING_KEY_ADMIN_WILAYAH),
            )),
            /*cr("SETTING", "", null, array(
                cr("SET ANGGARAN", url("setting/opencontract")),
                cr("OPEN KONTRAK", url("setting/penetapan")),
            )),
            cr("UPLOAD", "", null, array(
                cr("USER", url("uuser")),
                cr("VENDOR", url("uvendor")),
                cr("KONTRAK", url("")),
                cr("PRK", url("uprk")),
                cr("UPDATE PRK", url("update_prk")),
                cr("SKKI/SKKO", url("uskk")),
                cr("PMBY KONTRAK", url("")),
                cr("PMBY PPFA", url("")),
                cr("TEMPLATE", url("")),
            )),*/
            cr("ABOUT", "", null, array(
                cr("ABOUT SIPAT", url("about")),
                cr("LOG VERSION", url("log")),
                cr("KONTAK", url("contact")),
            ))
        );
    }

}
