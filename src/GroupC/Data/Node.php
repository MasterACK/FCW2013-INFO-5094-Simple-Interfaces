<?php
/**
 *INode
 *
 *@package Data
 */
namespace GroupC\Data;

/**
 *@ignore
 */
defined('IN_LIB') or die;

/*
 *@package Data
 *@version 1.0
 *@author Group C
 *@copyright Group C 2013
 */
class Node implements \GroupC\Data\INode
{
    /**
     *@access private
     *@var int Index of current node
     */   
    private $key;
    
     /**
     *@access private
     *@var mixed Value of current node
     */
     
    private $value;
    
     /**
     *Constructor
     *
     *@access public
     *@param  int $key Sets the key
     *@param  mixed $value Sets the value
     *@return void
     */
    public function __construct($key, $value)
    {
        $this->setKey($key);
        $this->setValue($value);
    }
    
    /**
     * Returns the key value for this node.
     *
     * @access public
     * @return mixed Returns the key value.
     */  
    public function getKey()
    {
        return $this->key;
    }
    
    /**
     * Sets the key value for this node.
     *
     * @access public
     * @param mixed The key value.
     */     
    public function setKey($key)
    {
        //throw exceptions
        $this->key = $key;
    }
    /**
     * Returns the value of this node (the real value assigned).
     *
     * @access public
     * @return mixed The value.
     */    
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * Sets the value for this node.
     *
     * @access public
     * @param mixed The value.
     */    
    public function setValue($value)
    {
        //throw exceptions  
        $this->value = $value;
    }
}
