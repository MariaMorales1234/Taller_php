<?php
class Node {
    public $value;
    public $left;
    public $right;

    public function __construct($value) {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}