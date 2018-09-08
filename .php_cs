<?php

declare(strict_types=1);

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Boo\Enumeration;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use function Boo\CodeStandard\get_php_cs_fixer_rules;

$header = <<<'EOF'
This file is part of the Battle.net API Client package.

(c) Jonas Stendahl <jonas@stendahl.me>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$config = Config::create();
$finder = Finder::create();
$rules = \array_replace(get_php_cs_fixer_rules(), [
    'header_comment' => [
        'header' => $header,
    ],
]);

$finder->in(__DIR__);
$finder->name('.php_cs');
$finder->name('fetch-api-docs');
$finder->name('generate-classes');
$finder->ignoreDotFiles(false);

$config->setFinder($finder);
$config->setIndent(str_repeat(' ', 4));
$config->setLineEnding("\n");
$config->setRiskyAllowed(true);
$config->setUsingCache(true);
$config->setRules($rules);

return $config;
