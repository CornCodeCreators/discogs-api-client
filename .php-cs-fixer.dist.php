<?php

// see rules: https://mlocati.github.io/php-cs-fixer-configurator/#version:3.8

$header = <<<'EOF'
    This file is part of "Discogs-Api-Client".

    (c) Tim Korn <tim.korn@corncode.de>

    This source file is subject to the MIT license that is bundled
    with this source code in the file LICENSE.
    EOF;

$finder = (new PhpCsFixer\Finder())
    ->in([__DIR__.'/lib', __DIR__.'/tests'])
    ->exclude('var')
;

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@Symfony'               => true,
    'header_comment'         => ['header' => $header],
    'yoda_style'             => false,
    'array_indentation'      => true, // Each element of an array must be indented exactly once.
    'binary_operator_spaces' => [
        'operators' => [
            '=>' => 'align_single_space_minimal',
            '='  => 'align_single_space_minimal',
        ],
    ],
    'class_attributes_separation' => [
        'elements' => [
            'method'       => 'one',
            'property'     => 'one',
            'trait_import' => 'one',
        ],
    ],
    'fully_qualified_strict_types' => true,
    'global_namespace_import'      => [
        'import_classes'   => true,
        'import_constants' => true,
        'import_functions' => true,
    ],
    'control_structure_continuation_position' => [
        'position' => 'same_line', // ensures "} else {" to be in one line
    ],
    'no_spaces_inside_parenthesis' => true,
    'no_whitespace_in_blank_line'  => false, // will work better with PhpStorm since new lines are indented automatically
    'explicit_string_variable'     => false, // "My name is $name." --> "My name is ${name}."
    'phpdoc_order'                 => true,
    'phpdoc_to_comment'            => [
        'ignored_tags' => [
            'phpstan-ignore-line',
            'phpstan-ignore-next-line',
            'noinspection',
        ],
    ],
])
    ->setFinder($finder)
    ;