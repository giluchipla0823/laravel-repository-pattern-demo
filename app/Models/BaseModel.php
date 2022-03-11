<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * @param string $value
     * @return string
     */
    public function getCreatedAtAttribute(string $value): string {
        return $value;
    }

    /**
     * @param string|null $value
     * @return string|null
     */
    public function getUpdatedAtAttribute(?string $value): ?string {
        return $value;
    }

    /**
     * @param string|null $value
     * @return string|null
     */
    public function getDeletedAtAttribute(?string $value): ?string {
        return $value;
    }
}
