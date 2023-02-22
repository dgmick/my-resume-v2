<?php

namespace App\Repository;

use App\Entity\ProfessionalSkill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfessionalSkill>
 *
 * @method ProfessionalSkill|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfessionalSkill|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfessionalSkill[]    findAll()
 * @method ProfessionalSkill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessionalSkillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfessionalSkill::class);
    }

    public function getProfessionalSkillsByGroup()
    {
        $results = [];
        $data = $this->createQueryBuilder('ps')
            ->orderBy('ps.universe')
            ->getQuery()
            ->execute()
            ;

        /** @var ProfessionalSkill $result */
        foreach ($data as $result) {
            $results[$result->getUniverse()][] = $result;
        }

        return $results;
    }
}
