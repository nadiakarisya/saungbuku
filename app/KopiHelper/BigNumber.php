<?php

namespace App\KopiHelper;

use Litipk\BigNumbers\Decimal;

class BigNumber {

    /**
     * get decimal bigNumber from $val
     * @param $val
     * @return Decimal
     */
    public static function from($val)
    {
        $res = Decimal::fromString("0");
        if (is_string($val))
            $res = Decimal::fromString($val);
        if (is_float($val))
            $res =  Decimal::fromFloat($val);
        if (is_double($val))
            $res =  Decimal::fromFloat($val);
        if (is_integer($val))
            $res =  Decimal::fromInteger($val);
        if (is_null($val) || $val == "")
            $res = Decimal::fromString("0");

        return $res;
    }

    /**
     * @param $arrData array associative of data
     * @param array $arrFieldNames array of string fieldNames to format
     * @return mixed
     */
    public static function format($arrData, $arrFieldNames = [])
    {
        foreach ($arrFieldNames as $fieldName) {
            $val = $arrData[$fieldName] ?? 0;
            $arrData[$fieldName] = Decimal::fromString($val)->innerValue();
        }
        return $arrData;
    }

    public static function add($a, $b)
    {
        $a = BigNumber::from($a);
        $b = BigNumber::from($b);
        return $a->add($b)->innerValue();
    }

    public static function sub($a, $b)
    {
        $a = BigNumber::from($a);
        $b = BigNumber::from($b);
        return $a->sub($b)->innerValue();
    }

    public static function div($a, $b)
    {
        $a = BigNumber::from($a);
        $b = BigNumber::from($b);
        return $a->div($b)->innerValue();
    }

    public static function mul($a, $b)
    {
        $a = BigNumber::from($a);
        $b = BigNumber::from($b);
        return $a->mul($b)->innerValue();
    }

    public static function isLessThan($a, $b)
    {
        $a = BigNumber::from($a);
        $b = BigNumber::from($b);
        return $a->isLessThan($b);
    }

    public static function equals($a, $b)
    {
        $a = BigNumber::from($a);
        $b = BigNumber::from($b);
        return $a->equals($b);
    }

    public static function calc($a, $operator, $b) {
        $def = [
            "+"  => self::add($a, $b) ,
            "-"  => self::sub($a, $b) ,
            "/"  => self::div($a, $b) ,
            "*"  => self::mul($a, $b) ,
            "="  => self::equals($a, $b),
            "<"  => self::isLessThan($a, $b),
        ];
        $res = $def[$operator] ?? null;
        if (!$res)
            throw new \Exception("BigNumber::calc : Unknown operator $operator, pls implement");

        return $res;
    }

    public static function isDeltaSignificant($a, $b, $limit){
        $delta = abs(self::sub($a, $b));
        return $delta > $limit;
    }


}
