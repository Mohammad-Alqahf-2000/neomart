<?php

namespace App\Services;

class PaginationService
{
    public static function perPage(?int $value = null): int
    {
        $default = config('pagination.default', 10);
        $allowed = config('pagination.allowed', [5, 10, 25, 50, 100]);
        $max = config('pagination.max', 100);

        if ($value == null || !in_array($value, $allowed)) {
            return $default;
        }
        return  min($value, $max);
    }
}
