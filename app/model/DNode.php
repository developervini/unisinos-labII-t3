<?php

class DNode {
    protected $element;
	protected $prev;
	protected $next;

	public function __construct(Pet $e) {
		$this->element = $e;
		$this->prev = $this->next = null;
	}

	public function getElement(){
		return $this->element; 
	}

	public function getPrevious() { 
		return $this->prev;
	}

	public function getNext() { 
		return $this->next;
	}

	public function setElement(Pet $e) { 
		$this->element = $e; 
	}

	public function setPrevious($p) {
		$this->prev = $p; 
	}

	public function setNext($n) {
		$this->next = $n; 
	}
}