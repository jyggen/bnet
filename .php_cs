<?php

declare(strict_types=1);

/*
 * This file is part of boo/bnet.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\BattleNet;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$header = <<<'EOT'
This file is part of boo/bnet.

(c) Jonas Stendahl <jonas@stendahl.me>

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
EOT;

$finder = Finder::create();
$config = Config::create();
$rules = [
    '@Symfony' => true,
    '@Symfony:risky' => true,
    'align_multiline_comment' => true,
    'array_indentation' => true,
    'array_syntax' => ['syntax' => 'short'],
    'blank_line_before_statement' => true,
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'comment_to_phpdoc' => true,
    'compact_nullable_typehint' => true,
    'escape_implicit_backslashes' => true,
    'explicit_indirect_variable' => true,
    'explicit_string_variable' => true,
    'final_internal_class' => true,
    'fully_qualified_strict_types' => true,
    'function_to_constant' => ['functions' => ['get_class', 'get_called_class', 'php_sapi_name', 'phpversion', 'pi']],
    'header_comment' => ['header' => $header],
    'heredoc_to_nowdoc' => true,
    'list_syntax' => ['syntax' => 'long'],
    'logical_operators' => true,
    'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
    'method_chaining_indentation' => true,
    'multiline_comment_opening_closing' => true,
    'no_alternative_syntax' => true,
    'no_binary_string' => true,
    'no_extra_blank_lines' => ['tokens' => ['break', 'continue', 'extra', 'return', 'throw', 'use', 'parenthesis_brace_block', 'square_brace_block', 'curly_brace_block']],
    'no_null_property_initialization' => true,
    'no_short_echo_tag' => true,
    'no_superfluous_elseif' => true,
    'no_unneeded_curly_braces' => true,
    'no_unneeded_final_method' => true,
    'no_unreachable_default_argument_value' => true,
    'no_unset_on_property' => true,
    'no_useless_else' => true,
    'no_useless_return' => true,
    'ordered_class_elements' => true,
    'ordered_imports' => true,
    'php_unit_internal_class' => true,
    'php_unit_ordered_covers' => true,
    'php_unit_set_up_tear_down_visibility' => true,
    'php_unit_strict' => true,
    'php_unit_test_annotation' => true,
    'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],
    'php_unit_test_class_requires_covers' => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_order' => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
    'phpdoc_types_order' => true,
    'return_assignment' => true,
    'semicolon_after_instruction' => true,
    'single_line_comment_style' => true,
    'strict_comparison' => true,
    'strict_param' => true,
    'string_line_ending' => true,
    'yoda_style' => true,
];

$finder->in(__DIR__);
$finder->name('.php_cs');
$finder->name('fetch-api-docs');
$finder->name('generate-classes');
$finder->name('generate-metadata');
$finder->ignoreDotFiles(false);

$config->setFinder($finder);
$config->setRiskyAllowed(true);
$config->setRules($rules);

return $config;
