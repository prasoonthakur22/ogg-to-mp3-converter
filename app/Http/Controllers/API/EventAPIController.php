<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIBaseController;
use Illuminate\Http\Request;

class EventAPIController extends APIBaseController
{

    /**
     * @OA\GET (
     *   path="/event",
     *   summary="Get Events",
     *   tags={"Event"},
     *   @OA\Response(
     *     response=200,
     *     description="Response.",
     *     @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="title",
     *                     description="API title response.",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="descriptione",
     *                     description="API descriptione response.",
     *                     type="string"
     *                 )
     *                 ),
     *             ),
     *         ),
     *   ),
     * ),
     */

    ###########
    public function index(Request $request)
    {
        $re = $request->all();
        return $this->sendResponse(null, 'Success');
    }
}
