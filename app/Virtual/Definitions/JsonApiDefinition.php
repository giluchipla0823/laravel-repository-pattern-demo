<?php

namespace App\Virtual\Definitions;

/**
 * @OA\Schema(
 *     title="JsonApiDefinition",
 *     description="JsonApiDefinition",
 *     @OA\Xml(
 *         name="JsonApiDefinition"
 *     )
 * )
 */
class JsonApiDefinition
{
    /**
     * @OA\Property(
     *      type="string",
     *      example="local"
     * )
     */
    public $environment;

    /**
     * @OA\Property(
     *      type="string",
     *      example="1.0.0"
     * )
     */
    public $version;

    /**
     * @OA\Property(
     *      type="string",
     *      example="Bookstore Api"
     * )
     */
    public $name;

    /**
     * @OA\Property(
     *      type="string",
     *      example="Api for obtain information about books, authors, publishers and genres."
     * )
     */
    public $summary;
}
