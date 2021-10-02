class Node {
    constructor(data, next = null) {
        this.data = data;
        this.next = next;
    }
}

class LinkedList {
    constructor() {
        this.head = null;

        this.insertFirst = this.insertFirst.bind(this);
        this.insertLast = this.insertLast.bind(this);
        this.insertFromLast = this.insertFromLast.bind(this);
        this.insertAt = this.insertAt.bind(this);
        this.updateAt = this.updateAt.bind(this);
        this.removeFirst = this.removeFirst.bind(this);
        this.removeLast = this.removeLast.bind(this);
        this.removeFromLast = this.removeFromLast.bind(this);
        this.removeAt = this.removeAt.bind(this);
        this.removeByValue = this.removeByValue.bind(this);
        this.getFirst = this.getFirst.bind(this);
        this.getLast = this.getLast.bind(this);
        this.getAt = this.getAt.bind(this);
        this.getMiddle = this.getMiddle.bind(this);
        this.getFromLast = this.getFromLast.bind(this);
        this.search = this.search.bind(this);
        this.size = this.size.bind(this);
        this.clear = this.clear.bind(this);
        this.reverse = this.reverse.bind(this);
        this.reverseBetweenRange = this.reverseBetweenRange.bind(this);
        this.rotate = this.rotate.bind(this);
        this.display = this.display.bind(this);
        this.isCircular = this.isCircular.bind(this);
        this.mergeAndUpdate = this.mergeAndUpdate.bind(this);
        this.forEach = this.forEach.bind(this);
    }

    insertFirst(value) {
        this.head = new Node(value, this.head); // here we are creating new node and passing previous head as its next node and then storing this node as new head.
    }

    insertLast(value) {
        const lastNode = this.getLast(false);
        lastNode === 'NONE' ? this.head = new Node(value) : lastNode.next = new Node(value);
    }

    insertFromLast(value, index) {
        if (index <= 0) return this.insertLast(value);
        const currentNode = this.getFromLast(index, false);
        if (currentNode !== 'NONE' && currentNode instanceof Node) {
            currentNode.next = new Node(value, currentNode.next);
        } else {
            this.insertFirst(value);
        }
    }

    insertAt(value, index) {
        const previousNode = this.getAt(index - 1, false);
        if (previousNode !== 'NONE' && previousNode instanceof Node) {
            previousNode.next = new Node(value, previousNode.next);
        } else if (index === 0) {
            this.insertFirst(value);
        } else if (previousNode === "NONE" && index > 0) {
            this.insertLast(value);
        }
    }

    updateAt(newValue, index) {
        const node = this.getAt(index, false);
        if (node !== 'NONE' && node instanceof Node) {
            node.data = newValue;
        }
    }

    removeFirst() {
        this.head = this.head ? this.head.next : null;
    }

    removeLast() {
        let node = this.head;
        let entered = 0;
        while (node && node.next && node.next.next) { // will enter here only if `size` is greater than 2
            node = node.next;
            entered = 1;
        }
        (entered || (node && node.next)) ? node.next = null : this.head = null;
    }

    removeFromLast(index) {
        if (index < 0) return;
        const currentNode = this.getFromLast(index, false);
        if (currentNode === this.head) return this.removeFirst();
        const previousNode = this.getFromLast(index + 1, false);
        if (previousNode !== 'NONE' && previousNode instanceof Node) {
            previousNode.next = previousNode.next.next;
        }
    }

    removeAt(index) {
        const previousNode = this.getAt(index - 1, false);
        if (previousNode !== 'NONE' && previousNode instanceof Node) {
            previousNode.next = previousNode.next ? previousNode.next.next : null;
        }
        if (index === 0) {
            this.removeFirst();
        }
    }

    removeByValue(value) {
        while (this.head.data === value) {
            this.removeFirst();
        }

        let node = this.head;
        while(node) {
            if (node.next && node.next.data === value) {
                node.next = node.next.next;
            } else {
                node = node.next;
            }
        }
    }

    getFirst(onlyData = true) {
        return this.head ? (onlyData ? this.head.data : this.head) : 'NONE';
    }

    getLast(onlyData = true) {
        let node = this.head;
        while (node && node.next)
            node = node.next;
        return node ? (onlyData ? node.data : node) : 'NONE';
    }

    getAt(index, onlyData = true) {
        if (index < 0 || !this.head) return 'NONE';

        let position = index;
        let node = this.head || 'NONE';
        while (position) {
            position--;
            if (node && node.next) {
                node = node.next;
            } else {
                node = 'NONE';
                break;
            }
        }
        return onlyData && node.data ? node.data : node;
    }

    getMiddle(getFirstMiddle = true, onlyData = true) {  /* Get first middle is for those cases where linked list is of even size and have two middles */
        let first = this.head;
        let second = this.head;
        while (second && second.next && second.next.next) {
            first = first.next;
            second = second.next.next;
        }
        if (!getFirstMiddle && second.next) first = first.next;

        return first ? (onlyData ? first.data : first) : 'NONE';
    }

    getFromLast(index, onlyData = true) {
        if (index < 0 || !this.head) return 'NONE';

        let node = this.head;
        let counter = 0;
        let enteredInLoop = 0;
        const checkValidity = (nodeIndex) => Array.from(Array(index + 1)).every((_, index) => this.getAt(nodeIndex + index + 1) !== 'NONE');
        while (checkValidity.call(this, counter)) {
            enteredInLoop = 1;
            node = node.next;
            counter++;
        }
        if (!enteredInLoop && !checkValidity(-1)) {
            return 'NONE';
        }
        return node ? (onlyData ? node.data : node) : 'NONE';
    }

    search(value, returnFullInfo = false, indexBasedSearching = false) {
        let node = this.head;
        let index = 0;
        let message = `NOT FOUND`;
        const getSuffix = num => num === 1 ? "st" : (num === 2 ? "nd" : "th");
        while (node) {
            if (node.data === value) {
                message = `Found at ${ indexBasedSearching ? ((index) + getSuffix(index) + ' index.') : ((index + 1) + getSuffix(index + 1) + ' position.') }`;
                return returnFullInfo ? { message, foundAt: indexBasedSearching ? index : index + 1 } : message ;
            }
            index++;
            node = node.next;
        }
        return returnFullInfo ? {message, foundAt: -1 } : message;
    }

    reverse() {
        if (!this.head) return;

        let node = this.head;
        let previousNode = null;
        let nextNode = node.next;

        while (node) {
            node.next = previousNode;
            previousNode = node;
            node = nextNode;
            nextNode = nextNode && nextNode.next;
        }
        this.head = previousNode;
    }

    reverseBetweenRange(left, right) {
        if ((left < 0) || (right < 0) || (right < left)) return 'INVALID RANGE PASSED';
        if (!this.head || (right === left)) return ;

        let leftIndexNode = this.getAt(left, false);
        let leftIndexNodePredecessor = this.getAt(left - 1, false);
        leftIndexNodePredecessor = leftIndexNodePredecessor === 'NONE' ? null : leftIndexNodePredecessor;

        let rightIndexNode = this.getAt(right, false);
        let rightIndexNodeSuccessor = this.getAt(right + 1, false);
        rightIndexNodeSuccessor = rightIndexNodeSuccessor === 'NONE' ? null : rightIndexNodeSuccessor;

        if (leftIndexNode !== 'NONE' && rightIndexNode !== 'NONE') {
            /* Split linked list into three parts :- first + sub-linked list to be reversed + last  */
            if (leftIndexNodePredecessor !== 'NONE' && leftIndexNodePredecessor instanceof Node) leftIndexNodePredecessor.next = null;
            rightIndexNode.next = null;

            /* Reverse sub-linked list */
            let tempNode1 = leftIndexNode;
            let tempNodePrevious = null;
            let tempNodeNext = tempNode1.next;
            while (tempNode1) {
                tempNode1.next = tempNodePrevious;
                tempNodePrevious = tempNode1;
                tempNode1 = tempNodeNext;
                tempNodeNext = tempNodeNext && tempNodeNext.next;
            }

            /* Updated head of sub linked list */
            leftIndexNode = tempNodePrevious;

            let tempNode2 = leftIndexNode;
            while (tempNode2 && tempNode2.next) tempNode2 = tempNode2.next;

            /* Updated tail of sub linked list */
            rightIndexNode = tempNode2 || null;

            /* Merge all sub parts of linked list */
            if (leftIndexNodePredecessor !== 'NONE' && leftIndexNodePredecessor instanceof Node) leftIndexNodePredecessor.next = leftIndexNode;
            else this.head = leftIndexNode;
            rightIndexNode.next = rightIndexNodeSuccessor;
        }
    }

    mergeAndUpdate(linkedListA, linkedListB) {
        if (linkedListA instanceof LinkedList && linkedListB instanceof LinkedList) {
            const tail = linkedListA.getLast(false);
            if (tail !== 'NONE') {
                tail.next = linkedListB.head;
                this.head = linkedListA.head;
            } else {
                this.head = linkedListB.head;
            }
        }
    }

    rotate(degree) {
        if (!this.head || this.head.next === null || !degree) return;

        degree = degree % this.size();
        while (degree) {
            degree--;
            const lastNodePredecessor = this.getFromLast(1, false);
            const lastNode = lastNodePredecessor.next;
            lastNodePredecessor.next = null;
            lastNode.next = this.head;
            this.head = lastNode;
        }
    }

    size() {
        let length = 0;
        let node = this.head;
        while (node) {
            length++;
            node = node.next;
        }
        return length;
    }

    clear() {
        this.head = null;
    }

    display() {
        const data = [];
        let node = this.head;
        while (node) {
            data.push(node.data);
            node = node.next;
        }
        console.log('{ ' + data.join(" } ⟶ { ") + ' }');
    }

    isCircular() {
        let first = this.head;
        let second = this.head;
        while (second && second.next && second.next) {
            first = first.next;
            second = second.next.next;
            if (first === second)
                return true;
        }
        return false;
    }

    forEach(callback) {
        let node = this.head;
        let index = 0;
        while (node) {
            callback(node.data, index);
            node = node.next;
            index++;
        }
    }

    *[Symbol.iterator]() {
        let node = this.head;
        while (node) {
            yield node.data;
            node = node.next;
        }
    }
}
