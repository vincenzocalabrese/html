<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class Attribute {
	/** @var string $name * */
	private $name;

	/** @var mixed value * */
	private $value;

	/**
	 * Attribute constructor.
	 * @param null $name
	 * @param null $value
	 */
	public function __construct($name = NULL, $value = NULL) {
		$this->name  = $name;
		$this->value = $value;
	}

	/**
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 *
	 * @return mixed|string
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 *
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 *
	 * @param mixed $value
	 */
	public function setValue($value) {
		$this->value = $value;
	}
}

?>