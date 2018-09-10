<?php
namespace FatFree\Traits;

trait ClassTrait
{
    /**
     * Method return entity varibles as array
     * @return array
     */
    public function toArray()
    {
        return (array)get_object_vars($this);
    }

    /**
     * Method return entity varibles as array
     * @return array
     */
    public function toCleanedArray()
    {
        $out = [];
        foreach (get_object_vars($this) as $key => $val) {
            if (!empty($val)) {
                $out[$key] = $val;
            }
        }
        return $out;
    }

    /**
     * Method return entity varibles as array
     * @return array
     */
    public function toJson()
    {
        return json_encode(get_object_vars($this));
    }

    /**
     * Method set entity from given varibles as JSON
     * @return array
     */
    public function fromJson($json)
    {
        $decodedJson = json_decode($json);
        foreach (get_object_vars($this) as $key => $val) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($decodedJson->$key);
            }
        }
        return $this;
    }

    /**
     * Method return entity varibles as array
     * @return array
     */
    public function toCleanedJson()
    {
        return json_encode(self::toCleanedArray());
    }

    /**
     * Method return class name without namespace
     * @return array
     */
    public function getClass()
    {
        return get_called_class();
    }

    /**
     * Method return class name without namespace
     * @return string
     */
    public function getClassName()
    {
        $cNamespaceInfo = (array)explode('\\', get_called_class());
        return end($cNamespaceInfo);
    }

    /**
     * Method return class name
     * @return array
     */
    public function getFullClassName()
    {
        return str_replace('\\', '', get_called_class());
    }

    static function getConstants()
    {
        $oClass = new \ReflectionClass(get_called_class());
        return $oClass->getConstants();
    }

    static function getConstant($constantName)
    {
        $oClass = new \ReflectionClass(get_called_class());
        return isset($oClass->getConstants()[$constantName]) ? $oClass->getConstants()[$constantName] : null;
    }
}
