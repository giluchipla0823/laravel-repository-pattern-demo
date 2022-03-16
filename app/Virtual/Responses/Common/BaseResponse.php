<?php

namespace App\Virtual\Responses\Common;

class BaseResponse
{
    /**
     * @OA\Property(
     *     property="jsonapi",
     *     type="object",
     *     ref="#/components/schemas/JsonApiDefinition"
     * )
     */
    public $jsonapi;
}
