<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Controller;

use App\DataFixtures\AaronFixture;

/**
 * Test Application Home Controller.
 *
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class HomeControllerTest extends WebRestController
{
    public function testHomeUri()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $response = $client->getResponse();

        $this->assertJsonResponse($response);
        $this->assertEquals(
            '["Welcome to your home controller!"]',
            $response->getContent()
        );
    }

    public function testAaronUri()
    {
        $client = static::createClient();
        $client->request('GET', '/aaron');
        $response = $client->getResponse();

        $this->assertJsonResponse($response);

        $expected = implode('","', AaronFixture::ITEMS);
        $expected = sprintf('["%s"]', $expected);

        $this->assertEquals(
            $expected,
            $response->getContent()
        );
    }
}
