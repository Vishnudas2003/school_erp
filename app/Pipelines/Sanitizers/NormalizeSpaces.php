<?php

namespace App\Pipelines\Sanitizers;

class NormalizeSpaces
{
    public function handle(array $data, \Closure $next)
    {
        $data = array_map(function ($value) {
            return is_string($value)
                ? preg_replace('/\s+/', ' ', $value)
                : $value;
        }, $data);

        return $next($data);
    }
}
