<?php
<<<<<<< HEAD
/**
 *INode
 *
 *@package Data
 */
namespace GroupC\Data;

defined('IN_LIB') or die;

   /**
    *Node
    *
=======
namespace GroupC\Data;

/**
 *@ignore
 */
defined('IN_LIB') or die;

   /*
    *@package Data
>>>>>>> upstream/develop
    *@version 1.0
    *@author Group C
    *@copyright Group C 2013
    */
<<<<<<< HEAD
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
=======

class Node implements \GroupC\Data\INode
{
     /*
     *@access private
     *@var INode
     */
     
    private $key;
    
     /*
     *@access private
     *@var INode
     */
     
    private $value;

>>>>>>> upstream/develop
    public function __construct($key, $value)
    {
        $this->setKey($key);
        $this->setValue($value);
    }
    
<<<<<<< HEAD
    /**
=======
    /*
>>>>>>> upstream/develop
     * Returns the key value for this node.
     *
     * @access public
     * @return mixed Returns the key value.
<<<<<<< HEAD
     */  
=======
     */
    
>>>>>>> upstream/develop
    public function getKey()
    {
        return $this->key;
    }
    
<<<<<<< HEAD
    /**
=======
    /*
>>>>>>> upstream/develop
     * Sets the key value for this node.
     *
     * @access public
     * @param mixed The key value.
<<<<<<< HEAD
     */     
=======
     */
      
>>>>>>> upstream/develop
    public function setKey($key)
    {
        //throw exceptions
        $this->key = $key;
    }
    
<<<<<<< HEAD
    /**
=======
     /*
>>>>>>> upstream/develop
     * Returns the value of this node (the real value assigned).
     *
     * @access public
     * @return mixed The value.
<<<<<<< HEAD
     */    
=======
     */
     
>>>>>>> upstream/develop
    public function getValue()
    {
        return $this->value;
    }
    
<<<<<<< HEAD
    /**
=======
    /*
>>>>>>> upstream/develop
     * Sets the value for this node.
     *
     * @access public
     * @param mixed The value.
<<<<<<< HEAD
     */    
=======
     */
    
>>>>>>> upstream/develop
    public function setValue($value)
    {
        //throw exceptions  
        $this->value = $value;
    }
}