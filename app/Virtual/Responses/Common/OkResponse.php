<?php

namespace App\Virtual\Responses\Common;

class OkResponse extends BaseResponse
{
    /**
     * @OA\Property(
     *     property="code",
     *     type="integer",
     *     example=200
     * )
     */
    public $code;

    /**
     * @OA\Property(
     *     property="message",
     *     type="string",
     *     example="Successful operation."
     * )
     */
    public $message;
}
