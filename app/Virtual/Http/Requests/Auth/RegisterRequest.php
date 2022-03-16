<?php

namespace App\Virtual\Http\Requests\Auth;

/**
 * @OA\Schema(
 *      title="Register Request",
 *      description="Register request body data",
 *      type="object",
 *      @OA\Xml(
 *         name="RegisterRequest"
 *      ),
 *      required={"name", "email", "password", "confirm_password"}
 * )
 */
class RegisterRequest
{
    /**
     * @OA\Property(
     *      type="string",
     *      description="Name of the user",
     *      example="Test"
     * )
     */
    public $name;

    /**
     * @OA\Property(
     *      type="email",
     *      description="Email of the user",
     *      example="example@gmail.com"
     * )
     */
    public $email;

    /**
     * @OA\Property(
     *      type="string",
     *      description="Password of the user",
     *      example="secret"
     * )
     */
    public $password;

    /**
     * @OA\Property(
     *      type="string",
     *      description="Confirm Password of the user",
     *      example="secret"
     * )
     */
    public $confirm_password;
}
