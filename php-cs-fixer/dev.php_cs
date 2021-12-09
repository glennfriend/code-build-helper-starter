<?php

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
    '@PhpCsFixer'                      => true,
    // '@PhpCsFixer:risky'             => true,
    'general_phpdoc_annotation_remove' => ['annotations' => ['expectedDeprecation']],
    'list_syntax'                      => ['syntax' => 'long'],
    'self_accessor'                    => true,                                 // 在當前類中使用 self 代替類名
    'standardize_not_equals'           => true,                                 // <> 取代為 !=
    'binary_operator_spaces'           => ['default' => 'align_single_space'],  // 等號對齊、數字箭頭符號對齊
  ])
  ->setFinder($finder);

return $config;
