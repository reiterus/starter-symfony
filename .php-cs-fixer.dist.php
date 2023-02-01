<?php

$exclude = [
    '.docker',
    'bin',
    'config',
    'migrations',
    'public',
    'templates',
    'translations',
    'var',
    'vendor',
];

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude($exclude)
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
    ])
    ->setFinder($finder)
;
