<?php

namespace App\Pipelines;

use Illuminate\Pipeline\Pipeline;

class SanitizeInput
{
    public static function run(array $data): array
    {
        return app(Pipeline::class)
            ->send($data)
            ->through([
                \App\Pipelines\Sanitizers\TrimStrings::class,
                \App\Pipelines\Sanitizers\StripTags::class,
                \App\Pipelines\Sanitizers\NormalizeSpaces::class,
                \App\Pipelines\Sanitizers\EmptyStringToNull::class,
            ])
            ->thenReturn();
    }
}
