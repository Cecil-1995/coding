<?php

class Node
{
    public $key;
    public $value;
    public $prev;
    public $next;

    function __construct($key, $value)
    {
        $this->key   = $key;
        $this->value = $value;
        $this->prev  = null;
        $this->next  = null;
    }
}

class LRUCache
{
    public $capacity;
    public $firstNode;
    public $lastNode;
    public $map;

    /**
     * @param Integer $capacity
     */
    function __construct($capacity)
    {
        $this->capacity        = $capacity;
        $this->map             = [];
        $this->firstNode       = new Node(-1, -1);
        $this->lastNode        = new Node(-1, -1);
        $this->firstNode->next = $this->lastNode;
        $this->lastNode->prev  = $this->firstNode;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key)
    {
        if (!isset($this->map[$key])) {
            return -1;
        }

        $node  = $this->map[$key];
        $value = $node->value;

        // 删除当前节点
        $this->deleteNode($node);

        // 在尾部增加节点
        $node = new Node($key, $value);
        $this->addLast($node);
        $this->map[$key] = $node;

        return $value;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value)
    {
        if (isset($this->map[$key])) {
            $this->deleteNode($this->map[$key]);
            unset($this->map[$key]);

            ++$this->capacity;
        }
        if ($this->capacity === 0) {
            // 内存不够了，删除头结点
            $node = $this->firstNode->next;
            $this->deleteNode($node);
            unset($this->map[$node->key]);

            ++$this->capacity;
        }
        --$this->capacity;

        // 在尾部增加节点
        $node = new Node($key, $value);
        $this->addLast($node);
        $this->map[$key] = $node;

        return null;
    }

    function addLast($node)
    {
        $this->lastNode->prev->next = $node;
        $node->prev                 = $this->lastNode->prev;
        $node->next                 = $this->lastNode;
        $this->lastNode->prev       = $node;
    }

    function deleteNode($node)
    {
        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
        unset($node);
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */