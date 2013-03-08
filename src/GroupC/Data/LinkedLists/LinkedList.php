<?php
namespace GroupC\Data\LinkedLists;
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

class LinkedList implements \GroupC\Data\LinkedLists\ILinkedList
{
    /**
     *@access private
     *@var firstNode Hold the refernce to the first node
     */ 
    private $firstNode;
     /**
     *@access private
     *@var lastNode Hold the refernce to the last node
     */ 
    private $lastNode;
     /**
     *@access private
     *@var count Hold the current count value of node
     */ 
    private $count = 0;
    
    /**
     *Constructor
     *
     *@access public
     *@param  mixed $firstNode Checks to see if the node is null
     *@return void
     */

    public function __construct(\GroupC\Data\ILinkedNode $firstNode = null)
    {
        if ($firstNode !== null) {
            $this->firstNode = $firstNode;
        }
    }
    
     /**
     * Returns the first value for this node.
     *
     * @access public
     * @return mixed Returns the first node and checks if its set and not null
     */  
    public function getFirst()
    {
        return isset($this->firstNode) ? $this->firstNode : null;
    }

    /**
     * Returns the last value for this node.
     *
     * @access public
     * @return mixed Returns the last node and checks if its set and not null
     */ 
    public function getLast()
    {  
        return isset($this->lastNode) ? $this->lastNode : null;
    }
     /**
     * Adds the node value.
     *
     * @access public
     * @return mixed Returns the value of the node to be added
     */ 
    public function add($value)
    {
        $node = new \GroupC\Data\LinkedNode($this->count, $value);
        $this->addNode($node);
    }
      /**
     * Adds the node to either the first or last node 
     *
     * @access public
     * @return mixed Returns the correct node that the value is to be added to.
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
     * Returns as an array of nodes
     *
     * @access public
     * @return mixed Returns the nodes as an array
     */  
    public function asArray()
    {
        $array = array();
        $currentNode = $this->firstNode;
        if (!$this->isEmpty()) {
            do {
                $array[$currentNode->getKey()] = $currentNode->getValue();
            } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);
        }
        return $array;
    }
     /**
     * Returns a specified key in array
     *
     * @access public
     * @return mixed Returns the array if it contains the specified key
     */ 
    public function containsKey($key)
    {
        $currentNode = $this->firstNode;
        do {
            if ($currentNode->getKey() == $key) {
                return true;
            }
        } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);
        return false;
    }
    /**
     * Returns value contained in specified key
     *
     * @access public
     * @return mixed Returns the value if contained in the array
     */ 
    public function contains($value)
    {
        return $this->findFirst($value) !== null;
    }
      /**
     * Finds the value contained in specified key
     *
     * @access public
     * @return mixed Returns the value you are trying to find
     */  
    public function find($value)
    {
        return $this->findFirst($value);
    }
     /**
     * Finds all the values that are present
     *
     * @access public
     * @return mixed Returns all the values you are trying to find
     */ 
    public function findAll($value)
    {
        $all = null;
        $currentNode = $this->firstNode;
        do {
            if ($currentNode->getValue() == $value) {
                $all[] = $currentNode;
            }
        } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);
        return $all;
    }
     /**
     * Returns the first ILinkedNode instance found by with the specified value.
     * 
     * @access public
     * @param mixed $value
     */
    public function findFirst($value)
    {
        $currentNode = $this->firstNode;
        do {
            if ($currentNode->getValue() == $value) {
                return $currentNode;
            }
        } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);
        return null;
    }
       /**
     * Returns the last ILinkedNode instance found by the specified value.
     *
     * @access public
     * @param mixed $value Contains the value to find.
     * @return ILinkedNode|null Returns the last ILinkedNode that contains the value or null
     */
    public function findLast($value)
    {
        $last = null;
        $currentNode = $this->firstNode;
        do {
            if ($currentNode->getValue() == $value) {
                $last = $currentNode;
            }
        } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);
        return $last;
    }
     /**
     * Returns the ILinkedNode at the specified $key.
     *
     * @access public
     * @param mixed Contains the key of the ILinkedNode to get.
     * @return mixed Returns the ILinkedNode at $key if found or null
     */
    public function get($key)
    {
        $currentNode = $this->firstNode;
        do {
            if ($currentNode->getKey() == $key) {
                return $currentNode;
            }
        } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);
        return null;
    }
      /**
     * Inserts a new ILinkedNode at before the specified key.
     *
     * @access public
     * @param int $before Contains the key value to insert a new ILinkedNode before.
     * @param mixed $value Contains the value used to create a new ILinkedNode with and inserted before $before.
     * @return int Returns the newly create ILinkedNode's key.
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
     * Inserts a new ILinkedNode after the specified key.
     *
     * @access public
     * @param int $after Contains the key value to insert a new ILinkedNode after.
     * @param mixed $value Contains the value used to create a new ILinkedNode with and inserted before $after.
     * @return int Returns the newly create ILinkedNode's key.
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
    /**
     * Returns a boolean to represent whether or not this list is empty.
     *
     * @access public
     * @return bool Returns true if the list is empty, otherwise returns false.
     */
    public function isEmpty()
    {
        return $this->count == 0;
    }
      /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return ILinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peek()
    {
        return $this->peekFirst();
    }
     /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return ILinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peekFirst()
    {
        return $this->getFirst();
    }
    /**
     * Returns, but does not remove, the last node in the list. 
     *
     * @access public
     * @return ILinkedNode|null Returns the last node in the list. Will returns NULL if the list empty.
     */
    public function peekLast()
    {
        return $this->getLast();
    }
     /**
     * Returns and removes the first node in the list.
     *
     * @access public
     * @return ILinkedNode|null Returns the first node in the list. Will return NULL if the list is empty.
     */
    public function poll()
    {
        return $this->pollFirst();  
    }
     /**
     * Returns and removes the first node in the list.
     *
     * @access public
     * @return ILinkedNode|null Returns the first node in the list. Will return NULL if the list is empty.
     */
    public function pollFirst()
    {
        if (!$this->isEmpty()) {
            $first = $this->firstNode;
            $this->removeFirst();
            return $first;
        } 
        return null;
    }
    /**
     * Returns and removes the last node in the list.
     *
     * @access public
     * @return ILinkedNode|null Returns the last node in the list. Will return NULL if the list is empty.
     */
    public function pollLast()
    {
        if (!$this->isEmpty()) {
            $currentNode = $this->firstNode->getNext();
            $prevNode = $this->firstNode;
            if ($currentNode === null) {
                $last = $this->firstNode;
                $this->firstNode = null;
                $this->count--;
                return $last;
            }
            do {
                if ($currentNode->getNext() === null) {
                    $last = $currentNode;
                    $prevNode->clearNext();
                    $this->count--;
                    return $last;
                }
                $prevNode = $prevNode->getNext();
            } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);    
        } 
        return null;
    }
    /**
     * Returns the last node's value and removes the last node in the list.
     *
     * @access public
     * @return mixed Returns the last node value in the list and removes the last node from the list
     */
    public function pop()
    {
        return $this->pollLast();
    }
    /**
     * Adds a new value onto the end of the list.
     *
     *
     * @access public
     * @param mixed Contains the value to push onto the list.
     */
    public function push($value)
    {
        return $this->add($value);
    }
    /**
     * Removes all nodes whose value is equal to that specified.
     *
     * @access public
     * @param mixed Contains the value to remove from the list
     */
    public function remove($value)
    {
        $currentNode = $this->firstNode->getNext();
        $prevNode = $this->firstNode;
        if ($prevNode->getValue() === $value) {
            $this->removeFirst();
        }
        if ($currentNode != null) {
            do {
                if ($currentNode->getValue() === $value) {
                    if ($currentNode->getNext() !== null) {
                        $prevNode->setNext($currentNode->getNext());
                    } else {
                        $prevNode->clearNext();
                    }
                    $this->count--;
                    $this->prepare();
                }
                $prevNode = $prevNode->getNext();
            } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);      
        }  
    }
    /**
     * Removes the node that lives at the specified key.
     *
     * @access public
     * @param mixed Contains the value to remove from the list.
     */
    public function removeAt($key)
    {
        $currentNode = $this->firstNode->getNext();
        $prevNode = $this->firstNode;
        if ($key === 0) {
            $this->removeFirst();
        }

        if ($currentNode !== null) {
            do {
                if ($currentNode->getKey() === $key) {
                    if ($currentNode->getNext() !== null) {
                        $prevNode->setNext($currentNode->getNext());
                    } else {
                        $prevNode->clearNext();
                    }
                    $this->count--;
                    $this->prepare();
                }
            } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);
        }        
    }
     /**
     * Removes the first node from the list.
     *
     * @access public
     */
    public function removeFirst()
    {
        $this->firstNode = $this->firstNode->getNext();
        $this->count--;
        $this->prepare();
    }
    /**
     * Removes the last node from the list.
     * 
     * @access public
     */
    public function removeLast()
    {
        $currentNode = $this->firstNode->getNext();
        $prevNode = $this->firstNode;
        if ($currentNode === null) {
            $this->removeFirst();
        }
        do {
            if ($currentNode === $this->lastNode) {
                $prevNode->clearNext();
                $this->count--;
                $this->prepare();
            }
        } while ($currentNode = $currentNode->getNext() !== null ? $currentNode->getNext() : false);        
    }
    /**
     * Removes the specified node from the list.
     *
     *
     * @access public
     * @param ILinkedNode $node The node to remove from the list.
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
     * Sorts the list by the node values.
     *
     * The keys of all moved nodes will be adjusted so that the numeric key sequence
     * remains (n - 1) + 1 for all nodes.
     *
     * @access public
     */
    public function sort()
    {

    }
    /**
     * Sorts the list by using a callback to specify the value to compare on.
     *
     * @access public
     * @param callable The specified callback that takes one parameter and will return one value
     */
    public function sortBy(callable $predicate)
    {

    }   

    public function count()
    {
        return $this->count;
    }

    public function getIterator()
    {
        return new \GroupC\Data\LinkedLists\Iterator($this);
    }

    private function prepare()
    {
        $currentNode = $this->firstNode;
        for ($i = 0; $i < $this->count(); $i++) {
            $currentNode->setKey($i);
            $currentNode = $currentNode->getNext();
        }
    }
}
