<?php
namespace GroupC\Data;

/**
 *@ignore
 */
defined('IN_LIB') or die;

class DoublyLinkedNode extends \GroupC\Data\LinkedNode implements \GroupC\Data\IDoublyLinkedNode
{

    private $previous = null;

    public function getPrevious()
    {
        return isset($this->previous) ? $this->previous : null;
    }

    public function setPrevious(IDoublyLinkedNode &$previous)
    {
        //throw exceptions
        $this->previous = $previous;        
    }
}