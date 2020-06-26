<?php

class PetController extends DoublyLinkedList
{

	public function all($pos)
	{
		try {
			$pets = Pet::with('breed')->with('org')->get();
			
			foreach ($pets as $key => $pet) {
				parent::insert($pet, $key);
			}

			if ($pos > 0)
				return parent::search($pos);
			else
				return parent::get($pos);
		} catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public static function list()
	{
		try {
			return Pet::with('breed')->with('org')->get()->toArray();
		} catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public static function save($data = [], $id = null)
	{
		try {
			if ($id) {
				$Pet = Pet::find($id);
				$Pet->update($data);
			} else
				$Pet = Pet::create($data);

			return $Pet;
		} catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public static function findById($id = 0)
	{
		try {
			return Pet::find($id)->get()->first();
		} catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	public static function delete($id = 0)
	{
		try {
			$Issue = Pet::find($id);
			$Issue->delete();
			return $Issue;
		} catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
}
