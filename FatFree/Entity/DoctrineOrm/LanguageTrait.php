<?php
namespace FatFree\Entity\DoctrineOrm;

use Doctrine\ORM\Mapping as ORM;

trait LanguageTrait
{
    /**
     * @var string
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $_language;

    /**
     * @var string
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $_language_code;

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->_language = $language;
    }

    /**
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->_language_code;
    }

    /**
     * @param string $language_code
     */
    public function setLanguageCode($language_code)
    {
        $this->_language_code = $language_code;
    }

}
