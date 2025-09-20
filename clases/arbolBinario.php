<?php
require_once "nodo.php";

class BinaryTree {
    public $root;

    public function __construct() {
        $this->root = null;
    }

    public function buildFromPreIn($preorder, $inorder) {
        if (empty($preorder) || empty($inorder)) return null;

        $rootValue = array_shift($preorder);
        $root = new Node($rootValue);

        $inIndex = array_search($rootValue, $inorder);

        $leftIn = array_slice($inorder, 0, $inIndex);
        $rightIn = array_slice($inorder, $inIndex + 1);

        $leftPre = array_slice($preorder, 0, count($leftIn));
        $rightPre = array_slice($preorder, count($leftIn));

        $root->left = $this->buildFromPreIn($leftPre, $leftIn);
        $root->right = $this->buildFromPreIn($rightPre, $rightIn);

        return $root;
    }

    public function buildFromPostIn($postorder, $inorder) {
        if (empty($postorder) || empty($inorder)) return null;

        $rootValue = array_pop($postorder);
        $root = new Node($rootValue);

        $inIndex = array_search($rootValue, $inorder);

        $leftIn = array_slice($inorder, 0, $inIndex);
        $rightIn = array_slice($inorder, $inIndex + 1);

        $leftPost = array_slice($postorder, 0, count($leftIn));
        $rightPost = array_slice($postorder, count($leftIn));

        $root->left = $this->buildFromPostIn($leftPost, $leftIn);
        $root->right = $this->buildFromPostIn($rightPost, $rightIn);

        return $root;
    }
    public function preorder($node) {
        if (!$node) return [];
        return array_merge([$node->value], $this->preorder($node->left), $this->preorder($node->right));
    }

    public function inorder($node) {
        if (!$node) return [];
        return array_merge($this->inorder($node->left), [$node->value], $this->inorder($node->right));
    }

    public function postorder($node) {
        if (!$node) return [];
        return array_merge($this->postorder($node->left), $this->postorder($node->right), [$node->value]);
    }

    public function renderHTML($node) {
        if (!$node) return '';

        $leftHTML = $this->renderHTML($node->left);
        $rightHTML = $this->renderHTML($node->right);

        return '
        <div class="node">
            <div class="value">' . $node->value . '</div>
            <div class="children">
                ' . $leftHTML . $rightHTML . '
            </div>
        </div>';
    }
}