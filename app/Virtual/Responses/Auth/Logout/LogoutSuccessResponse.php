<?php

namespace App\Virtual\Responses\Auth\Logout;

use App\Virtual\Responses\Common\BaseResponse;
use App\Virtual\Responses\Common\OkResponse;

/**
 * @OA\Schema(
 *     title="LogoutSuccessResponse",
 *     description="LogoutSuccessResponse",
 *     @OA\Xml(
 *         name="LogoutSuccessResponse"
 *     )
 * )
 */
class LogoutSuccessResponse extends BaseResponse
{
    /**
     * @OA\Property(
     *     property="message",
     *     type="string",
     *     example="Se ha cerrado la sesión del usuario."
     * )
     */
    public $message;
}
