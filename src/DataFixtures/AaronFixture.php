<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\DataFixtures;

use App\Entity\Aaron;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Base Fixture.
 *
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class AaronFixture extends Fixture
{
    public const ITEMS = [
        'alpha',
        'bowler',
        'cosmo',
        'digger',
        'esquire',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ITEMS as $nickname) {
            $item = new Aaron();
            $item->setNickname($nickname);
            $manager->persist($item);
        }

        $manager->flush();
    }
}
