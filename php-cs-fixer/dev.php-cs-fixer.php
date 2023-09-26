<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->exclude('tests/Fixtures')
    ->exclude('bootstrap')
    ->exclude('config')
    ->exclude('database')
    ->exclude('docs')
    ->exclude('public')
    ->exclude('Providers')
    ->exclude('resources/view')
    ->exclude('storage')
    ->exclude('vendor')
    ->in(__DIR__)
    ->append([
        __DIR__ . '/dev-tools/doc.php',
        __DIR__ . '/php-cs-fixer',
        __FILE__,
    ]);

/**
 * @see vendor/friendsofphp/php-cs-fixer/src/RuleSet/Sets
 */
$config = new PhpCsFixer\Config();
$config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP74Migration'                  => true,
        '@PHPUnit75Migration:risky'        => true,
        '@PSR2'                            => true,
        '@PSR12'                           => true,
        '@PhpCsFixer'                      => true,     // 'aa' . 'bb'  ->  'aa'.'bb'
        '@PhpCsFixer:risky'                => true,
        'general_phpdoc_annotation_remove' => ['annotations' => ['expectedDeprecation']],
        'list_syntax'                      => ['syntax' => 'long'],
        'self_accessor'                    => true,                                 // 在當前類中使用 self 代替類名
        'standardize_not_equals'           => true,                                 // <> 取代為 !=
        'phpdoc_annotation_without_dot'    => false,    // @param 註解後面不要自動加上 . 符號
        'phpdoc_summary'                   => false,    // 文字 註解後面不要自動加上 . 符號
        'binary_operator_spaces'           => ['default' => 'single_space'],        // 等號一律置左方
      //'binary_operator_spaces'           => ['default' => 'align_single_space'],  // 等號對齊、數字箭頭符號對齊 -> 不符合 Kos 的規則
        'new_with_braces'                  => [ // Migration 的名稱, `return new class()` -> `return new class`
            'named_class'     => false,
            'anonymous_class' => false,
        ],
    ])
    ->setFinder($finder);

return $config;
