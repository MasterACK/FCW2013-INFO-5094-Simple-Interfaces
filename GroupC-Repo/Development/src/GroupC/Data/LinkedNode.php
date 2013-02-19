<?php
namespace GroupC\Data;

/**
 *@ignore
 */
defined('IN_LIB') or die;

class LinkedNode extends \GroupC\Data\Node implements \GroupC\Data\ILinkedNode
{
    private $next = null;

    public function getNext()
    {
        return isset($this->next) ? $this->next : null;
    }
    
    public function setNext(ILinkedNode $next)
    {
        //throw exceptions
        $this->next = $next;
    }
}