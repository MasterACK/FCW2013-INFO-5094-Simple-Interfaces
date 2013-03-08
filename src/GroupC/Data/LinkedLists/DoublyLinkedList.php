<?php
namespace GroupC\Data\LinkedLists;

/**
 *@ignore
 */
defined('IN_LIB') or die;

/**
 *@package Data
 *@version 1.0
 *@author Group C
 *@copyright Group C 2013
 */

class DoublyLinkedList extends \GroupC\Data\LinkedLists\LinkedList implements \GroupC\Data\LinkedLists\IDoublyLinkedList
{

    /**
     * Adds a node to the list
     *
     * @access public
     * @param IDoublyLinkedList Adds the node if the correct key is given
     */ 

	public function addNode(\GroupC\Data\ILinkedNode $node)
    {
        $node->setKey($this->count);
        if (!$this->isEmpty()) {
            $this->lastNode->setNext($node);
            $this->lastNode = $node;
        } else {
            $this->firstNode = $node;
            $this->lastNode = $node;
        }
        $this->count++;
        return $node->getKey();
    }
    
    /**
     * Removes a node from the list
     *
     * @access public
     * @param IDoublyLinkedList Removes the node of the current node that's selected
     */ 

    public function removeNode(\GroupC\Data\ILinkedNode $node)
    {
        $currentNode = $this->firstNode->getNext();
        $prevNode = $this->firstNode;
        if ($prevNode === $node) {
            $this->removeFirst();
        }
        do {
            if ($currentNode === $node) {
                $prevNode->setNext($currentNode->getNext());
                $this->count--;
                $this->prepare();
            }
        } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);        
    }
    
    /**
     * Inserts a new IDoublyLinkedNode before the specified key.
     *
     * @access public
     * @param int $before Contains the key value to insert a new ILinkedNode before.
     * @param mixed $value Contains the value used to create a new ILinkedNode. This is placed before $before.
     * @return int Returns the newly create key.
     */

    public function insertBefore($before, $value)
    {
        $currentNode = $this->firstNode->getNext();
        $prevNode = $this->firstNode;
        if ($before == 0) {
            $node = new \GroupC\Data\LinkedNode(0, $value);
            $temp = $this->firstNode;
            $this->firstNode = $node;
            $this->firstNode->setNext($temp);
            $this->count++;
            $this->prepare();
        }
        do {
            if ($currentNode->getKey() == $before) {
                $node = new \GroupC\Data\LinkedNode($before - 1, $value);
                $prevNode->setNext($node);
                $node->setNext($currentNode);
                $this->count++;
                $this->prepare();
            }
            $prevNode = $prevNode->getNext();
        } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);
        return $node->getKey();
    }
    
     /**
     * Inserts a new IDoublyLinkedNode after the specified key.
     *
     * @access public
     * @param int $after Contains the key value to insert a new IDoublyLinkedNode.
     * @param mixed $value Contains the value used to create a new IDoublyLinkedNode. This is placed before $after.
     * @return int Returns the newly created key for the node.
     */

    public function insertAfter($after, $value)
    {
        $currentNode = $this->firstNode->getNext();
        $prevNode = $this->firstNode;
        if ($after == 0) {
            $node = new \GroupC\Data\LinkedNode(1, $value);
            $this->firstNode->setNext($node);
            $node->setNext($currentNode);
            $this->count++;
            $this->prepare();
        }
        do {
            if ($prevNode->getKey() == $after) {
                $node = new \GroupC\Data\LinkedNode($after + 1, $value);
                $prevNode->setNext($node);
                $node->setNext($currentNode);
                $this->count++;
                $this->prepare();
            }
            $prevNode = $prevNode->getNext();
        } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);
        return $node->getKey();
    }
}
