/**
 * Definition for a Node.
 * type Node struct {
 *     Val int
 *     Next *Node
 *     Random *Node
 * }
 */

var cacheNode map[*Node]*Node
func copyRandomList(head *Node) *Node {
    cacheNode = map[*Node]*Node{}
    return deepCopy(head)
}

func deepCopy(head *Node) *Node {
    if head == nil {
        return nil
    }

    if n, has := cacheNode[head]; has {
        return n
    }

    newNode := &Node{Val:head.Val}
    cacheNode[head] = newNode
    newNode.Next = deepCopy(head.Next)
    newNode.Random = deepCopy(head.Random)

    return newNode
}