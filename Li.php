<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class Li extends AHtmlObject {
	/**
	 * @var int
	 */
	private $value;

	/**
	 * Li constructor.
	 * @param string|AHtmlObject $htmlContent
	 */
	public function __construct($htmlContent = NULL) {
		$this->addHtmlContent($htmlContent);
	}

	/**
	 * @return int
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @param int $value
	 * @return $this Modified object
	 */
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}

	/**
	 * A String representation of HTML object
	 */
	public function getObjectToHtmlString() {
		$object = "<li " . $this->getExtraAttributeAndStyleString();

		if ($this->getValue() != NULL)
			$object .= " value=\"" . $this->getValue() . "\"";

		$object .= ">";
		$object .= $this->getHtmlContent();
		$object .= "</li>";

		return $object;
	}
}

?>