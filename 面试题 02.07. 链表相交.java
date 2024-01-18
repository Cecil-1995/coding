/**
 * Definition for singly-linked list.
 * public class ListNode {
 *     int val;
 *     ListNode next;
 *     ListNode(int x) {
 *         val = x;
 *         next = null;
 *     }
 * }
 */
public class Solution {
    public ListNode getIntersectionNode(ListNode headA, ListNode headB) {
        ListNode preA = headA;
        ListNode preB = headB;

        while(preA != preB) {
            if (preA == null) {
                preA = headB;
            } else {
                preA = preA.next;
            }
            if (preB == null) {
                preB = headA;
            } else {
                preB = preB.next;
            }
        }

        return preA;
    }
}