<?php

/**
 *IDoublyLinkedNode
 *
 *@package Data
 */
namespace GroupC\Data;

defined('IN_LIB') or die;

   /**
    *DoublyLinkedNode
    *
    *@version 1.0
    *@author Group C
    *@copyright Group C 2013
    */
class DoublyLinkedNode extends \GroupC\Data\LinkedNode implements \GroupC\Data\IDoublyLinkedNode
{    
    /**
     *@access private
     *@var IDoublyLinkedNode holds reference to previous node
     */  
    private $previous = null;
    
    /**
     * Returns the previously linked node.
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the previously linked node. Will return null
     *  if no previous node exists.
     */
    public function getPrevious()
    {
        return isset($this->previous) ? $this->previous : null;
    }
    
    /**
     * Sets the previous node.
     *
     * @access public
     * @param IDoublyLinkedNode The previously linked node.
     */   
    public function setPrevious(IDoublyLinkedNode &$previous)
    {
        //throw exceptions
        $this->previous = $previous;        
    }
}