<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/app',
        __DIR__.'/routes',
        __DIR__.'/database',
    ])
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
    )
    ->withPhpSets();
