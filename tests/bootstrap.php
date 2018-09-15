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

namespace Boo\BattleNet\Tests;

use VCR\VCR;

require_once \dirname(__DIR__).'/vendor/autoload.php';

VCR::configure()->setStorage('json');
