<?php
namespace FatFree\Entity\DoctrineOdm;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait LanguageTrait
{
    /**
     * @var string
     * @ODM\Field(type="string", nullable=true)
     */
    protected $_language;

    /**
     * @var string
     * @ODM\Field(type="string", nullable=true)
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
