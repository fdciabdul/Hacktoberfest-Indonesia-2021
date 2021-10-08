/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sd.pkg7.bst;
class Node
{
    int data;
    Node left;
    Node right;
    Node parent;
    
    public Node(int i)
    {
        data=i;
    }
}
class BST
{
    private Node root;
    public void cekroot()
    {
        System.out.println("nilai root :"+root.data);
    }
    
    public boolean isempty()
    {
        return root==null;
    }
    
    public void insert(int i)
    {
        Node temp=new Node(i);
        Node y=null;
        Node x=root;
        
        if(isempty())
        {
            System.out.println("nilai "+i+" menjadi root");
            root=temp;
        }else
        {
            while(x!=null)
            {
                y=x;
                if(i<x.data)
                    x=x.left;
                else
                    x=x.right;
            }
            
            if(i<y.data)
            {
                y.left=temp;
                System.out.println("nilai "+i+" masuk sebelah kiri "+y.data);                          
            }else
            {
                y.right=temp;
                System.out.println("nilai "+i+" masuk sebelah kanan "+y.data);
            }
        }
    }
    public void transplanted(Node del, Node reply)
    {
        if(del.parent==null)
            root=reply;
        else if(del==del.parent.left)
            del.parent.left=reply;
        else
            del.parent.right=reply;
        
        if(reply!=null)
        {
            reply.parent=del.parent;
        }
    }
    
    public void delete(int i)
    {
        Node y=null;
        Node x=root;
        
        while((x!=null)&&(x.data!=i))
        {
            y=x;
            if(i<x.data)
                x=x.left;
            else
                x=x.right;
        }
        
        if(x==null)
            System.out.println("data tidak ditemukan");
        else
        {
            x.parent=y;
            if(x.left==null)
                transplanted(x, x.right);
            else if(x.right==null)
                transplanted(x, x.left);
            else
            {
                Node min=minvalue(x.right);
                if(x.right!=min)
                {
                    transplanted(min, min.right);
                    min.right=x.right;
                    min.right.parent=min;                    
                }
                transplanted(x, min);
                min.left=x.left;
                min.left.parent=min;
            }
            System.out.println("nilai "+i+" telah dihapus");
        }
    }
    public Node minvalue(Node i)
    {
        Node temp=i;
        while(temp.left!=null)
        {
            temp=temp.left;
        }        
        return temp;
    } 
    public void searching(int i)
    {
        Node temp=root;
        boolean hasil=false;
        while(temp!=null)
        {
            if(temp.data==i)
            {
                hasil=true;
                break;
            }
            
            if(i<temp.data)
                temp=temp.left;
            else
                temp=temp.right;
        }
        
        if(hasil)
            System.out.println("data ditemukan");
        else
            System.out.println("maaf, data tidak ditemukan");
    }
    public void findmin()
    {
        Node temp=root;
        
        while(temp.left!=null)
        {
            temp=temp.left;
        }        
        System.out.println("nilai minimum :"+temp.data);
    }
    public void findmax()
    {
        Node temp=root;
        
        while(temp.right!=null)
        {
            temp=temp.right;
        }        
        System.out.println("nilai maximum :"+temp.data);
    }
    public void uruttree(Node i)
    {
        Node temp=i;
        
        if(temp!=null)
        {
            uruttree(temp.left);
            System.out.println(temp.data);
            uruttree(temp.right);
        }
    }
    public void urutroot()
    {
        System.out.println("mengurutkan Tree :");
        uruttree(root);
    }
}
/**
 *
 * @author UNir
 */
public class SD7BST {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        BST a=new BST();
        a.insert(2);
        a.insert(3);
        a.insert(1);
        a.insert(16);
        a.insert(14);
        a.cekroot();
        a.delete(2);
        a.cekroot();
        a.searching(16);
        a.urutroot();
        a.findmin();
        a.findmax();
        a.insert(16);
    }
    
}
