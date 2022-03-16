<?php

namespace App\Virtual\Responses\Common;

/**
 * @OA\Schema(
 *     title="UnauthorizedResponse",
 *     description="Unauthorized response",
 *     @OA\Xml(
 *         name="UnauthorizedResponse"
 *     )
 * )
 */
class UnauthorizedResponse extends BaseResponse
{


    /**
     * @OA\Property(
     *      property="code",
     *      type="integer",
     *      example="401"
     * )
     */
    public $code;

    /**
     * @OA\Property(
     *      property="message",
     *      type="string",
     *      example="Unauthorized."
     * )
     */
    public $message;
}
