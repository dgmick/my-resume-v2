<?php

namespace App\Repository;

use App\Entity\SkillChart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SkillChart>
 *
 * @method SkillChart|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillChart|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillChart[]    findAll()
 * @method SkillChart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillChartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillChart::class);
    }

    public function getList()
    {
        return $this->createQueryBuilder('sc')
            ->orderBy('sc.value', 'DESC')
            ->getQuery()
            ->execute()
            ;
    }
}
