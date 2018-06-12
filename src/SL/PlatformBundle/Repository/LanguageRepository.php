<?php

namespace SL\PlatformBundle\Repository;

/**
 * LanguageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LanguageRepository extends \Doctrine\ORM\EntityRepository {

    public function getLikeQueryBuilder($pattern) {
        return $this
                        ->createQueryBuilder('l')
                        ->where('l.name LIKE :pattern')
                        ->setParameter('pattern', $pattern)
        ;
    }

}
