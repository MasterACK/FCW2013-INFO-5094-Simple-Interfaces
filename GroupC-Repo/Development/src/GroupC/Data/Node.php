<?php
namespace GroupC\Data;

/**
 *@ignore
 */
defined('IN_LIB') or die;

class Node implements \GroupC\Data\INode
{

    private $key;
    private $value;

    public function __construct($key, $value)
    {
        $this->setKey($key);
        $this->setValue($value);
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        //throw exceptions
        $this->key = $key;
    }

    public function getValue()
    {
        return $this->value;
    }
    
    public function setValue($value)
    {
        //throw exceptions  
        $this->value = $value;
    }
}