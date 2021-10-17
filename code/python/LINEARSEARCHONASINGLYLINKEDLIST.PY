class Node:
    def __init__(self,data):
        self.data=data
        self.next=None
def takeinput():
    l=[int(x) for x in input().split(' ')]
    head=None
    tail=None
    for i in l:
        if i==-1:
            break
        new=Node(i)
        if head is None:
            head=new
            tail=new
        else:
            tail.next=new
            tail=new
    return head
def ls(head,d):
    if head is None:
        return -1
    i=0
    while head is not None:
        if head.data==d:
            return i
        i+=1
        head=head.next
    return -1
def printll(head):
    while head is not None :
        print(head.data, end = " ")
        head = head.next
head=takeinput()
i=int(input())
ls(head,i)