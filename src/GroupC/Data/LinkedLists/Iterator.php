<?php
/**
 *Iterator
 *
 *@package Data
 */
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

class Iterator implements \GroupC\Data\LinkedLists\IIterator
{
    /**
     *@access private
     *@var firstNode Hold the reference to the first node
     */ 
    private $firstNode;
      /**
     *@access private
     *@var currentNode Hold the reference to the current node
     */ 
    private $currentNode;
       /**
     *@access private
     *@var list Holds the reference to the list
     */ 
    private $list;
    /**
     *@access private
     *@var mode Holds the reference to the mode
     */ 
    private $mode;
    
     /**
     *Constructor
     *
     *@access public
     *@param  mixed $list Checks to see which linkedlist is being used
     *@param  mixed $mode Checks to see which mode is being used
     *@return void
     */

    public function __construct(ILinkedList $list, $mode = 5){
        $this->setMode($mode);
        $this->firstNode = $list->getFirst();
        $this->currentNode = $this->firstNode;
        $this->list = $list;
    }
    /**
     *Gives you the current node
     *
     *@access public
     *@method Iterator::current ( void )
     *@return mixed
     */
    public function current(){
        return $this->currentNode->getValue();
    }
     /**
     *Gives you the current node key
     *
     *@access public
     *@method Iterator::key ( void )
     *@return mixed
     */
    public function key(){
        return $this->currentNode->getKey();
    }
    /**
     *Moves the current position the the next node
     *
     *@access public
     *@method Iterator::next( void ) 
     *@return mixed
     */
    public function next(){
        if (($this->mode & IteratorMode::FIFO) == IteratorMode::FIFO) {
            $temp = $this->currentNode;
            $this->currentNode = $this->currentNode->getNext();
            if (($this->mode & IteratorMode::DELETE) == IteratorMode::DELETE) {
                    $this->list->removeAt($temp->getKey());
            }
        } else if (($this->mode & IteratorMode::LIFO)  == IteratorMode::LIFO) {
            $temp = $this->currentNode;
            $this->currentNode = $this->list->get($this->key() - 1);
            if (($this->mode & IteratorMode::DELETE) == IteratorMode::DELETE) {
                    $this->list->removeAt($temp->getKey());
            }
        }
    }
     /**
     *Rewind the position of a file pointer
     *
     *@access public
     *@method bool Iterator::rewind 
     *@return mixed
     *
     */
    public function rewind(){
        if (($this->mode & IteratorMode::FIFO) == IteratorMode::FIFO) {
            $this->currentNode = $this->firstNode;
        } else if (($this->mode & IteratorMode::LIFO) == IteratorMode::LIFO) {
            $this->currentNode = $this->list->getLast();
        }
    }
      /**
     *To check if the current node is valid 
     *
     *@access public
     *@method bool Iterator::valid ( void ) Called after Iterator::rewind() and Iterator::next() 
     *@return mixed
     */
    public function valid(){
        return $this->currentNode instanceof \GroupC\Data\ILinkedNode;
    }
     /**
     *Sets the current node
     *
     *@access public
     *@return mixed
     */
    public function setMode($mode)
    {
        if (!is_numeric($mode)) {
            throw new \InvalidArgumentException("The provided mode is invalid"); 
        }
        $this->mode = $mode;
    }
    /**
     *Gets the current node
     *
     *@access public
     *@return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }
}