<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 11:17
 */

class Col extends AHtmlObject {
	private $span = NULL;

	/**
	 * @return null
	 */
	public function getSpan() {
		return $this->span;
	}

	/**
	 * @param null $span
	 * @return $this Modified object
	 */
	public function setSpan($span) {
		$this->span = $span;
		return $this;
	}

	/**
	 * A String representation of HTML object
	 */
	public function getObjectToHtmlString() {
		$col = "<col ";

		if ($this->span != NULL)
			$col .= "span=\"" . $this->span . "\" ";

		$col .= " " . $this->getExtraAttributeAndStyleString() . " />";

		return self::removeExcessWhitespaces($col);
	}
}