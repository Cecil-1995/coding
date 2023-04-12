<?php

class Node
{
    public $key;
    public $value;
    public $next;
    public $prev;

    function __construct($k, $v)
    {
        $this->key   = $k;
        $this->value = $v;
    }
}

class DoubleNode
{
    public $head;
    public $tail;
    public $size;

    public function __construct()
    {
        $this->size       = 0;
        $this->head       = new Node(0, 0);
        $this->tail       = new Node(0, 0);
        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;
    }

    public function addNode(Node $node)
    {
        $node->prev             = $this->tail->prev;
        $node->next             = $this->tail;
        $this->tail->prev->next = $node;
        $this->tail->prev       = $node;
        ++$this->size;
    }

    public function removeNode(Node $node)
    {
        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
        --$this->size;
    }

    public function removeFirstNode()
    {
        $first = $this->head->next;
        $this->removeNode($first);

        return $first;
    }
}

class LRUCache
{
    public $map;
    public $link;
    public $capacity;

    /**
     * @param Integer $capacity
     */
    function __construct($capacity)
    {
        $this->link     = new DoubleNode();
        $this->capacity = $capacity;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key)
    {
        if (isset($this->map[$key])) {
            $node = $this->map[$key];

            $this->link->removeNode($node);;
            $this->link->addNode($node);

            return $node->value;
        }

        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value)
    {
        if (isset($this->map[$key])) {
            $node = $this->map[$key];

            $this->link->removeNode($node);
            unset($this->map[$node->key]);
        } else {
            if ($this->link->size == $this->capacity) {
                // 超过容量了 删除第一个元素
                $first = $this->link->removeFirstNode();
                unset($this->map[$first->key]);
            }
        }

        $node = new Node($key, $value);
        $this->link->addNode($node);
        $this->map[$key] = $node;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */