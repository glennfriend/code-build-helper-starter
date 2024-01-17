<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/tests',
        __DIR__ . '/packages',
        __DIR__ . '/resources',
    ])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

/**
 * @see vendor/friendsofphp/php-cs-fixer/src/RuleSet/Sets
 */
$config = new PhpCsFixer\Config();
$config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'], // 分號 ; 要在同一行 ?
        'single_space_after_construct' => true,     // 文字間保留一個 space ?
        'array_syntax' => ['syntax' => 'short'],
        'concat_space' => ['spacing' => 'one'],
        'header_comment' => ['header' => ''],
        'ordered_imports' => ['imports_order' => ['class', 'function', 'const'], 'sort_algorithm' => 'none'],
        'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
        'trailing_comma_in_multiline' => ['elements' => ['arrays', 'arguments'], 'after_heredoc' => false], // [elements] 是否要尾隨逗號 ?
        'phpdoc_align' => ['align' => 'left'],
        'global_namespace_import' => ['import_classes' => true],    // \Exception -> use Exception
        'php_unit_method_casing' => false,          // [我不使用該規則]  function test_my_code() -> function testMyCode()
        'no_trailing_comma_in_list_call' => true,   // [我不使用該規則]  如果由逗號分隔的值列表包含在一行中，則最後一項不得有尾隨逗號
        // glenn rewrite
        'phpdoc_annotation_without_dot'     => false,   // @param 註解後面不要自動加上 . 符號
        'phpdoc_summary'                    => false,   // 文字 註解後面不要自動加上 . 符號
        'phpdoc_to_comment'                 => false,   // 不要把 /** @var Class $class */ 轉成 // @var 格式
        'php_unit_test_class_requires_covers' => false, // 測試程式不要加上 @coversNothing 標示, 會無法產 生測試覆蓋率 report
    ])
    ->setFinder($finder);

return $config;
