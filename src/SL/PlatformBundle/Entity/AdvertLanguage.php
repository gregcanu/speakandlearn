<?php

namespace SL\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertLanguage
 *
 * @ORM\Table(name="advert_language")
 * @ORM\Entity(repositoryClass="SL\PlatformBundle\Repository\AdvertLanguageRepository")
 */
class AdvertLanguage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="acquired", type="boolean")
     */
    private $acquired;

    /**
     * @ORM\ManyToOne(targetEntity="SL\PlatformBundle\Entity\Advert", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $advert;
    
    /**
     * @ORM\ManyToOne(targetEntity="SL\PlatformBundle\Entity\Language", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $language;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set acquired
     *
     * @param boolean $acquired
     *
     * @return AdvertLanguage
     */
    public function setAcquired($acquired)
    {
        $this->acquired = $acquired;

        return $this;
    }

    /**
     * Get acquired
     *
     * @return bool
     */
    public function getAcquired()
    {
        return $this->acquired;
    }

    /**
     * Set advert
     *
     * @param \SL\PlatformBundle\Entity\Advert $advert
     *
     * @return AdvertLanguage
     */
    public function setAdvert(\SL\PlatformBundle\Entity\Advert $advert)
    {
        $this->advert = $advert;

        return $this;
    }

    /**
     * Get advert
     *
     * @return \SL\PlatformBundle\Entity\Advert
     */
    public function getAdvert()
    {
        return $this->advert;
    }

    /**
     * Set language
     *
     * @param \SL\PlatformBundle\Entity\Language $language
     *
     * @return AdvertLanguage
     */
    public function setLanguage(\SL\PlatformBundle\Entity\Language $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \SL\PlatformBundle\Entity\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
