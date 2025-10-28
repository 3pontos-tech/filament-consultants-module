<?php

declare(strict_types=1);

use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\CodingStyle\Rector\PostInc\PostIncDecToPreIncDecRector;
use Rector\Config\RectorConfig;
use Rector\EarlyReturn\Rector\If_\ChangeOrIfContinueToMultiContinueRector;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;
use Rector\TypeDeclaration\Rector\ArrowFunction\AddArrowFunctionReturnTypeRector;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/src',
        __DIR__.'/tests',
        __DIR__.'/database',
        __DIR__.'/config',
        __DIR__.'/resources',
    ])
    ->withSkip([
        __DIR__.'/vendor',
        __DIR__.'/storage',
        __DIR__.'/bootstrap/cache',
        __DIR__.'/.rector.cache',
    ])
    ->withCache(
        cacheDirectory: __DIR__.'/.rector.cache',
        cacheClass: FileCacheStorage::class,
    )
    ->withImportNames(importShortClasses: false, removeUnusedImports: true)
    ->withAttributesSets()
    ->withRootFiles()
    ->withPhpSets(php83: true)
    ->withPHPStanConfigs([__DIR__.'/phpstan.neon.dist'])
    ->withBootstrapFiles([__DIR__.'/vendor/larastan/larastan/bootstrap.php'])
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        instanceOf: true,
        earlyReturn: true,
        carbon: true,
        rectorPreset: true
    )
    ->withSkip([
        DeclareStrictTypesRector::class,
        ChangeOrIfContinueToMultiContinueRector::class,
        PostIncDecToPreIncDecRector::class,
        AddOverrideAttributeToOverriddenMethodsRector::class,
        AddArrowFunctionReturnTypeRector::class,
    ]);
