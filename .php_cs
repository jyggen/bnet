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
    '@PHP71Migration' => true,
    '@PHP71Migration:risky' => true,
    '@PHPUnit60Migration:risky' => true,
    '@PhpCsFixer' => true,
    '@PhpCsFixer:risky' => true,
    'header_comment' => [
        'header' => $header,
    ],
    'heredoc_indentation' => true,
    'list_syntax' => [
        'syntax' => 'short',
    ],
];

$finder->in(__DIR__);
$finder->name('.php_cs');
$finder->ignoreDotFiles(false);

$config->setFinder($finder);
$config->setRiskyAllowed(true);
$config->setRules($rules);

return $config;
