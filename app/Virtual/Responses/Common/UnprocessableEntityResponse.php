<?php

namespace App\Virtual\Responses\Common;

/**
 * @OA\Schema(
 *     title="UnprocessableEntityResponse",
 *     description="UnprocessableEntityResponse",
 *     @OA\Xml(
 *         name="UnprocessableEntityResponse"
 *     )
 * )
 */
class UnprocessableEntityResponse extends BaseResponse
{
    /**
     * @OA\Property(
     *      type="integer",
     *      example="422"
     * )
     */
    public $code;

    /**
     * @OA\Property(
     *      type="string",
     *      example="Validation failed."
     * )
     */
    public $message;
}
