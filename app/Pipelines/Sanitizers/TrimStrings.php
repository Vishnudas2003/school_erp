<?php

namespace App\Pipelines\Sanitizers;

class TrimStrings
{
    public function handle(array $data, \Closure $next)
    {
        $data = array_map(function ($value) {
            return is_string($value) ? trim($value) : $value;
        }, $data);

        return $next($data);
    }
}
