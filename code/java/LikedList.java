package Fall0811;

import java.util.Iterator;

import Summer08.Node;
import java.util.*;

public class LinkedList implements Iterable {
    private Node head;
    private Node tail;
    private int size;

    public Iterator iterator(){
        return new LLIterator();
    }

    private class LLIterator implements Iterator{
        private Node nextNode;
        private boolean removeOK;
        private int posToRemove;

        private LLIterator(){
            nextNode = head;
            removeOK = false;
            posToRemove = -1;
        }

        public boolean hasNext(){
            return nextNode != null;
        }

        public Object next(){
            assert hasNext();

            Object result = nextNode.getData();
            nextNode = nextNode.getNext();

            removeOK = true;
            posToRemove++;

            return result;
        }

        public void remove(){
            assert removeOK;
            removeOK = false;
            LinkedList.this.remove(posToRemove);
            posToRemove--;
        }
    }

    public void makeEmpty(){
        // let GC do its job!!!!!!!
        head = tail = null;
        size = 0;
    }

    public Object remove(int pos){
        assert pos >= 0 && pos < size;
        Object result;
        if( pos == 0 ){
            result = head.getData();
            head = head.getNext();
            if( size == 1 )
                tail = null;
        }
        else{    
            Node temp = head;
            for(int i = 1; i < pos; i++)
                temp = temp.getNext();
            result = temp.getNext().getData();
            temp.setNext( temp.getNext().getNext() );
            if( pos == size - 1)
                tail = temp;
        }
        size--;
        return result;
    }

    public Object get(int pos){
        assert pos >= 0 && pos < size;
        // array based list
        // return myCon[pos]
        Object result;
        if( pos == size - 1 )
            result = tail.getData(); //O(1)
        else{
            Node temp = head;
            for(int i = 0; i < pos; i++)
                temp = temp.getNext();
            result = temp.getData();
            // average case O(N) :((((
        }
        return result;
    }

    public void insert(int pos, Object obj){
        assert pos >= 0 && pos <= size;

        // addFirst?
        if(pos == 0)
            addFirst(obj); // O(1)
        // add last?
        else if( pos == size )
            add(obj); //at end O(1)
        else{
            // general case
            Node temp = head;
            for(int i = 1; i < pos; i++)
                temp = temp.getNext();
            // I know temp is pointing at the
            // node at position pos - 1
            Node newNode = new Node(obj, temp.getNext());
            temp.setNext( newNode );
            size++;
        }
    }

    public void add(Object obj){
        Node newNode = new Node(obj, null);
        if( size == 0 )
            head = newNode;
        else
            tail.setNext(newNode);
        tail = newNode;
        size++;
    }

    public void addFirst(Object obj){
        if(size == 0)
            add(obj);
        else{
            Node newNode = new Node(obj, head);
            head = newNode;
            size++;
        }
    }

    public String toString(){
        String result = "";
        Node temp = head;
        for(int i = 0; i < size; i++){
            result += temp.getData() + " ";
            temp = temp.getNext();
        }
        return result;
    }
}Hacktoberfest2021
