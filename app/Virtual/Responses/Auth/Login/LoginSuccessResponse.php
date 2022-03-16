<?php

namespace App\Virtual\Responses\Auth\Login;

use App\Virtual\Responses\Common\OkResponse;

/**
 * @OA\Schema(
 *     title="LoginSuccessResponse",
 *     description="LoginSuccessResponse",
 *     @OA\Xml(
 *         name="LoginSuccessResponse"
 *     )
 * )
 */
class LoginSuccessResponse extends OkResponse
{
    /**
     * @OA\Property(
     *     property="data",
     *     type="object",
     *     example={
     *       "id": 1,
     *       "name": "Test",
     *       "email": "example@gmail.com",
     *       "token": "11|5q36HxnTRbxPLIROxnB7oxK0xMSrhmHw32g9jeem"
     *     }
     * )
     */
    public $data;
}
