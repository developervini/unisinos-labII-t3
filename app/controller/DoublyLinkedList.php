<?php 

class DoublyLinkedList {
	private $head;
	private $tail;
	private $numElements;

	public function __construct()
    {
		$this->head = $this->tail = null;
		$this->numElements = 0;
	}

	public function numElements() {
		return $this->numElements;
	}

	public function isEmpty() {
		return $this->numElements == 0;
	}

	public function insertFirst(Pet $e) {
		$newNode = new DNode($e);
		if ($this->isEmpty())
			$this->head = $this->tail = $newNode;
		else {
			$newNode->setNext($this->head);
			$this->head->setPrevious($newNode);
			$this->head = $newNode;
		}

		// ajusta o total de elementos
		$this->numElements++;
	}
		
	public function insertLast(Pet $e) {
        $newNode = new DNode($e);
		if ($this->isEmpty())
			$this->head = $this->tail = $newNode;
		else {
			$this->tail->setNext($newNode);
			$newNode->setPrevious($this->tail);
			$this->tail = $newNode;
		}
		$this->numElements++;
	}

	public function insert(Pet $e, $pos) {
		if ($pos < 0  ||  $pos > $this->numElements)
			throw new Exception("IndexOutOfBoundsException", 1);

		if ($pos == 0)
			$this->insertFirst($e);
		else if ($pos == $this->numElements)
			$this->insertLast($e);
		else { 
			$prev = $this->head;
			for ($i = 0; $i < $pos-1; $i++)
				$prev = $prev->getNext();
			
			$newNode = new DNode($e);
			$newNode->setPrevious($prev);
			$newNode->setNext($prev->getNext());
			$prev->getNext()->setPrevious($newNode);
			$prev->setNext($newNode);
			$this->numElements++;
		}
	}


	public function removeFirst() {
		if ($this->isEmpty())
			throw new UnderflowException();

        $e = $this->head->getElement();
        
		if ($this->head == $this->tail)
			$this->head = $this->tail = null;
		else {
		
			$this->head = $this->head->getNext();
			$this->head->setPrevious(null);
		}
		$this->numElements--;
		return $e;
	}
	
	public function removeLast() {
		if ($this->isEmpty())
			throw new UnderflowException();

		$e = $this->tail->getElement();
		
		if ($this->head == $this->tail)
			$this->head = $this->tail = null;
		else {
			$this->tail = $this->tail->getPrevious();
			$this->tail->setNext(null);
		}

		$this->numElements--;
		return $e;
	}

	public function remove(int $pos) {
		if ($pos < 0  ||  $pos >= $this->numElements)
            throw new Exception("IndexOutOfBoundsException", 1);
		
		if ($pos == 0)
			return $this->removeFirst();
		else if ($pos == $this->numElements-1)
			return $this->removeLast();
		else { 
			$prev = $this->head;
			for ($i = 0; $i < $pos-1; $i++)
				$prev = $this->prev->getNext();
			
			$e = $this->prev->getNext()->getElement();

			$this->prev->setNext($this->prev->getNext()->getNext());
            $this->prev->getNext()->setPrevious($prev);
            
			$this->numElements--;
			return $e;
		}
	}

	public function get(int $pos) {
		if ($pos < 0  ||  $pos >= $this->numElements)
            throw new Exception("IndexOutOfBoundsException", 1);

		$current = $this->head;
		for ($i = 0; $i < $pos; $i++)
			$current = $current->getNext();
		
		return $current;
	}
	
	public function search($id) {
		$current = $this->head;
		$i = 0;
		while ($current != null) {
			if ($id == $current->getElement()->id)
				return $current;
			$i++;
			$current = $current->getNext();
		}
		
		return -1;
	}
	
	public function __toString() {
		$s = "";

		$current = $this->head;
		while ($current != null) {
			$s =  $s . $current->getElement()->__toString();
            $current = $current->getNext();
        }
        
		return $s;
	}
}