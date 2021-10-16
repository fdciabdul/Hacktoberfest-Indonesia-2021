import java.util.*;
class CircularDoublyLinkedList
{
	Node head=null;
	Node tail=null;
	Scanner sc=new Scanner(System.in);
	void create()
	{
		int val;
		int choice=1;
		Node newnode;
		while(choice==1)
		{
			System.out.println("Enter a value for a node: ");
			val=sc.nextInt();
			newnode=new Node();
			newnode.data=val;
			newnode.next=null;
			newnode.prev=null;
			if(head==null)
			{
				head=tail=newnode;
				newnode.next=head;
				newnode.prev=head;
			}
			else
			{
				tail.next=newnode;
				newnode.prev=tail;
				tail=tail.next;
				tail.next=head;
				head.prev=tail;
			}
			System.out.println("Press 1 to add another node or press 0 to stop.");
			choice=sc.nextInt();
			if(choice!=1)
				show();
		}
	}
	void show()
	{
		if(head==null)
			System.out.println("Circular Doubly Linked List is empty!");
		else
		{
			Node n=head;
			System.out.print("Circular Doubly Linked List:\t");
			do
			{
				System.out.print(n.data+"\t");
				n=n.next;
			} while(n!=head);
			System.out.println();
		}
	}
	void deleteatbeg()
	{
		if(head==null)
			System.out.println("The linked list is empty!");
		else
		{
			System.out.println("The value "+head.data+" was removed from the start of the linked list.");
			head=head.next;
			if(head.next==head)
				head=tail=null;
			else
			{
				head.prev=tail;
				tail.next=head;
			}
			show();
		}
	}
	void deleteatend()
	{
		if(head==null)
			System.out.println("The linked list is empty!");
		else
		{
			System.out.println("The value "+tail.data+" was removed from the start of the linked list.");
			tail=tail.prev;
			if(head.next==head)
				head=tail=null;
			else
			{
				head.prev=tail;
				tail.next=head;
			}
			show();
		}
	}
	void deleteatpos()
	{
		System.out.println("Enter index you want to remove value from: ");
		int index=sc.nextInt();
		int length=length_return();
		if(length==0)
			System.out.println("Cannot delete element! Linked List is empty!");
		else if(index>=length || index<0)
			System.out.println("Error! Invalid index position entered!");
		else if(index==0)
			deleteatbeg();
		else
		{
			Node n=head;
			for(int i=0;i<index-1;i++)
				n=n.next;
			Node back=n;
			n=n.next;
			n=n.next;
			Node front=n;
			front.prev=back;
			back.next=front;
			show();
		}
	}
	void check()
	{
		int check=0;
		int run=0;
		Node n=head;
		int length=length_return();
		while(true)
		{
			n=n.next;
			if(n==head)
			{
				check++;
				break;
			}
			else if(run==length-1)
				break;
		}
		n=tail;
		while(true)
		{
			n=n.prev;
			if(n==tail)
			{
				check++;
				break;
			}
			else if(run==length-1)
				break;
		}
		if(check==2)
			System.out.println("Circular property verified!");
		else
			System.out.println("Circular property NOT verified!");
	}
	void insertatbeg(int val)
	{
		Node newnode=new Node();
		newnode.data=val;
		tail.next=newnode;
		newnode.prev=tail;
		head.prev=newnode;
		newnode.next=head;
		head=newnode;
		show();
	}
	void insertatend(int val)
	{
		Node newnode=new Node();
		newnode.data=val;
		tail.next=newnode;
		newnode.prev=tail;
		tail=tail.next;
		newnode.next=head;
		head.prev=tail;
		show();
	}
	void insertatpos()
	{
		int val, index;
		System.out.println("Enter a value to append:");
		val=sc.nextInt();
		if(head==null)			//If the function is called before creation of list, one node
			insertatbeg(val);	//will be added as the head of list
		else
		{
			System.out.println("Enter an index to append that value at:");
			index=sc.nextInt();
			int length=length_return();
			if(index==0)
				insertatbeg(val);
			else if(index==length)
				insertatend(val);
			else
			{
				Node n=new Node();
				n.data=val;
				n.next=null;
				n.prev=null;
				Node temp=head;
				for(int i=0;i<index-1;i++)
					temp=temp.next;
				n.next=temp.next;
				n.prev=temp;
				temp.next=n;
				temp=temp.next;
				temp.prev=n;
				show();
			}
		}
	}
	void length_show()
	{
		int length=0;
		Node n=head;
		do
		{
			length++;
			n=n.next;
		} while(n!=head);
		System.out.println("Length of Circular Doubly Linked List: "+length);
	}
	int length_return()
	{
		int length=0;
		Node n=head;
		do
		{
			length++;
			n=n.next;
		} while(n!=head);
		return length;
	}
	void reverse()
	{
		if(head==null)
			System.out.println("The compiler cannot reverse a list that isn't created yet!");
		else
		{
			System.out.print("Before reversal ");
			show();
			tail.next=null;
			head.prev=null;
			Node currentnode=head;
			Node nextnode;
			while(currentnode!=null)
			{
				nextnode=currentnode.next;
				currentnode.next=currentnode.prev;
				currentnode.prev=nextnode;
				currentnode=nextnode;
			}
	        currentnode=head;
	        head=tail;
	        tail=currentnode;
	        tail.next=head;
			head.prev=tail;
			System.out.print("After reversal ");
			show();
		}
	}
	public static void main(String args[])
	{
		CircularDoublyLinkedList ob=new CircularDoublyLinkedList();
		ob.create();
		ob.reverse();
		ob.check();
	}
}
