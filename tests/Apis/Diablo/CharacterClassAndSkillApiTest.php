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

namespace Boo\BattleNet\Tests\Apis\Diablo;

use Boo\BattleNet\Apis\Diablo\CharacterClassAndSkillApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers \Boo\BattleNet\Apis\Diablo\CharacterClassAndSkillApi
 */
final class CharacterClassAndSkillApiTest extends AbstractApiTest
{
    /**
     * @vcr Diablo_CharacterClassAndSkillApi_GetCharacterClass.json
     */
    public function testGetCharacterClass(): void
    {
        $client = $this->getClient();
        $api = new CharacterClassAndSkillApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getCharacterClass('barbarian');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Diablo_CharacterClassAndSkillApi_GetApiSkill.json
     */
    public function testGetApiSkill(): void
    {
        $client = $this->getClient();
        $api = new CharacterClassAndSkillApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getApiSkill('barbarian', 'bash');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
