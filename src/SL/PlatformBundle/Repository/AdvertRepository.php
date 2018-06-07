<?php

namespace SL\PlatformBundle\Repository;

use SL\PlatformBundle\Entity\Advert;

class AdvertRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAdvertsWithLimit($limit) {
        $query = $this->createQueryBuilder('a');
        $query->setMaxResults($limit);
        
        return $query->getQuery()->getResult();
    }
}
