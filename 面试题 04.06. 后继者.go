/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func inorderSuccessor(root *TreeNode, p *TreeNode) *TreeNode {
    flag := false;
    return helper(root, p, &flag);
}

func helper(root *TreeNode, p *TreeNode, flag *bool) *TreeNode {
    if root.Left != nil {
        left := helper(root.Left, p, flag);
        if left != nil {
            return left;
        }
    }

    if *flag {
        return root;
    }
    if p.Val == root.Val {
        *flag = true;
    }

    if root.Right != nil {
        right := helper(root.Right, p, flag);
        if right != nil {
            return right;
        }
    }

    return nil;
}