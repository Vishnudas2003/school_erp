<?php

namespace App\Pipelines\Sanitizers;

class EmptyStringToNull
{
    public function handle(array $data, \Closure $next)
    {
        $data = array_map(function ($value) {
            return $value === '' ? null : $value;
        }, $data);

        return $next($data);
    }
}
