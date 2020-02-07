<?php

use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * @OA\Get(path="/prk-investasi/{year}/{kode_wilayah_ebudget}",
 *   operationId="prkInvestasiByWilayah",
 *   @OA\Parameter(name="year",
 *     in="path",
 *     required=true,
 *     @OA\Schema(type="int")
 *   ),
 *   @OA\Response(response="200",
 *     description="list prk investasi sesuai parameter ybs"
 *   )
 * )
 */


/**
 * @OA\Get(path="/prk-investasi/{prk_no}",
 *   operationId="prkInvestasiByWilayah",
 *   @OA\Parameter(name="prk_no",
 *     in="path",
 *     required=true,
 *     @OA\Schema(type="string")
 *   ),
 *   @OA\Response(response="200",
 *     description="prk investasi single"
 *   )
 * )
 */

