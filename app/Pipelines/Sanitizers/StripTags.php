<?php

namespace App\Pipelines\Sanitizers;

class StripTags
{
    public function handle(array $data, \Closure $next)
    {
        $data = array_map(function ($value) {
            return is_string($value) ? strip_tags($value) : $value;
        }, $data);

        return $next($data);
    }
}
