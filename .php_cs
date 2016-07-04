<?php
$finder = Symfony\CS\Finder\DefaultFinder::create()->files()->name('*.php')->exclude([
    'build',
    'vendor',
])->in(__DIR__);
$header = <<<EOF
This file is part of the Battle.net API Client package.

(c) Jonas Stendahl <jonas@stendahl.me>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

Symfony\CS\Fixer\Contrib\HeaderCommentFixer::setHeader($header);

return Symfony\CS\Config\Config::create()->setUsingCache(true)->fixers([
    'ereg_to_preg',
    'header_comment',
    'newline_after_open_tag',
    'no_useless_return',
    'ordered_use',
    'php_unit_construct',
    'phpdoc_order',
    'short_array_syntax',
    'strict',
    'strict_param',
])->finder($finder);
