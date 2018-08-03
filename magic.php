<?php

class People {

	private $age;

	private $name;


	/**
	 * People constructor
	 * @param string $name
	 * @param int $age
	 */
	public function __construct(string $name, int $age) {
		try {
			$this->setAge($newAge);
			$this->setName($newName);
		} catch(\InvalidArgumentException | \RangeException | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for Age
	 *
	 * @return mixed
	 */
	public function getAge() {
		return $this->age;
	}

	/**
	 * mutator for Age
	 *
	 * @param mixed $age
	 * @throws \InvalidArgumentException if age is empty
	 * @throws \InvalidArgumentException if age is less than 0
	 * @throws \Exception if age is less than 18
	 * @throws \Exception if age is greater than 118
	 */
	public function setAge($age): int {
		if(empty($newAge) === true) {
			throw(new \InvalidArgumentException("Age cannot be empty"));
			if($newAge < 0) {
				throw(new \InvalidArgumentException("must be greater than 0"));
			} if($newAge <= 18) {
				throw(new \Exception("Hi Caleb!"));
			} if($newAge > 118) {
				throw(new \Exception("Captain @deepdivedylan"));
			}
			$this->age = $newAge;
		}
	}

	/**
	 * accessor method for Name
	 *
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * mutator for Name
	 *
	 * @param mixed $name
	 * @throws \InvalidArgumentException if name is not a string
	 * @throws \RangeException if Name is greater than 64
	 */
	public function setName($name): string {
		$newName = trim($newName);
		$newName = filter_var($newName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newName) === true) {
			throw(new \InvalidArgumentException("Name cannot be empty"));
		}
		if(strlen($name) > 64) {
			throw(new \RangeException("Character exceed limit"));
		}
		//stores name content
		$this->name = $name;
	}

	public function __toString() {
		return $this->name . " is " . $this->age . " years old";
	}

}

$caleb = new People(18, "Caleb");

echo $caleb;