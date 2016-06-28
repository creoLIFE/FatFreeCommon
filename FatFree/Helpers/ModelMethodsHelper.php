<?php
namespace FatFree\Helpers;

use JMS\Serializer\SerializerBuilder;

class ModelMethodsHelper implements \JsonSerializable
{
    /**
     * Method return model varibles as array
     * @return array
     */
    public function toArray()
    {
        return (array)get_object_vars($this);
    }

    /**
     * Method return model varibles as array for ODM query
     * @return array
     */
    public function toOdmQuery()
    {
        $out = array();
        foreach (get_object_vars($this) as $k => $v) {
            if (!empty($v)) {
                $out[$k] = $v;
            }
        }
        return (array)$out;
    }

    /**
     * Method return model varibles as JSON
     * @return string|JSON
     */
    public function toJson()
    {
        return self::jsonSerialize();
    }

    /**
     * Method return model varibles as JSON
     * @return string|JSON
     */
    public function toSerializedJson()
    {
        $serializer = SerializerBuilder::create()->build();
        return $serializer->serialize(get_object_vars($this), 'json');
    }

    /**
     * Method return model varibles as JSON
     * #param integer $jsonpId
     * @return string|JSON
     */
    public function toJsonp($jsonpId)
    {
        return (string)'jsonp' . (int)$jsonpId . '(' . self::jsonSerialize() . ');';
    }

    /**
     * Method return namespace of model
     * @return string
     */
    public function getNamespace()
    {
        return (string)__NAMESPACE__;
    }

    /**
     * Method return model name
     * @return string
     */
    public function getClassName()
    {
        return (string)get_class($this);
    }

    /**
     * Method will use JsonSerializable to serialize varibles to JSON
     * @return string|JSON
     */
    public function jsonSerialize()
    {
        return self::fixJsonStructure(json_encode(get_object_vars($this)));
    }

    /**
     * Method will fix JSON structure after encoding
     * @param string|JSON $json
     * @return string|JSON
     */
    private function fixJsonStructure($json)
    {
        return str_replace(array('\"', ':"{', '}",'), array('"', ':{', '},'), $json);
    }
}
