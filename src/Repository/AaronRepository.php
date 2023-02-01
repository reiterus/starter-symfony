<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use App\Entity\Aaron;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Base Repository.
 *
 * @extends ServiceEntityRepository<Aaron>
 *
 * @method Aaron|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aaron|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aaron[]    findAll()
 * @method Aaron[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class AaronRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aaron::class);
    }

    public function findNicknames(bool $removed = false): array
    {
        $qb = $this->createQueryBuilder('aar');

        $qb
            ->select(['aar.nickname'])
            ->orderBy('aar.id');

        $result = $qb->getQuery()->getResult(2);

        return array_column($result, 'nickname');
    }
}
