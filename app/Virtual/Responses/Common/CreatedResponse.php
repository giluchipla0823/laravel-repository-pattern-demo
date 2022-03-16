<?php

namespace App\Virtual\Responses\Common;

class CreatedResponse extends BaseResponse
{
    /**
     * @OA\Property(
     *     property="code",
     *     type="integer",
     *     example=201
     * )
     */
    public $code;
}
