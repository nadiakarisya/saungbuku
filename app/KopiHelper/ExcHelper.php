<?php
namespace App\KopiHelper;

use App\Exceptions as Exc;
use Illuminate\Database\QueryException;

class ExcHelper {
    static $db_connection = 'pgsql';  // add detection later

    static function throwDetails(QueryException $queryException) {
        switch (self::$db_connection) {
            case 'pgsql' : // https://www.postgresql.org/docs/10/errcodes-appendix.html
            default:
                switch ($queryException->getCode()) {
                    case 23505:  // unique constraint violation
                        throw new Exc\DoubleDataException();
                        break;
                    case 23502:  // not_null_violation
                        throw new Exc\NotNullDataException();
                        break;
                    case 22001:  //value too long violation
                        throw new Exc\ValueNotValidException();
                        break;
                    case 23514: // constraint fail exception
                        throw new Exc\FailConstraintException();
                        break;
                    case 42883: // function fail exception (biasanya pada trigger)
                        throw new Exc\DatabaseFunctionException();
                        break;
                    default:
                        throw $queryException; // if anything goes here, check if need to make new custom Exception
                        break;
                }
                break;
        }
    }

    static function msgFromMap(\Exception $e, $errMsgMap = []) {
        $excClass = get_class($e);
        $errMsg = $errMsgMap[$excClass] ?? "{$excClass} {$e->getMessage()}";
        return $errMsg;
    }

    static function genericMsg(\Exception $e){
        $excClass = get_class($e);
        return "todo : handle and define user friendly message: {$excClass} {$e->getCode()} {$e->getMessage()}";
    }

}
