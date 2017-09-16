<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 12:04
 */

class Thead extends ASimpleHtmlObject {
	const tagName = "thead";

	/**
	 * Div constructor.
	 * @param string|AHtmlObject $htmlHtmlContent
	 */
	public function __construct() {
		parent::__construct(self::tagName);
	}

	/**
	 * @param Tr $row
	 * @return $this Modified object
	 */
	public function addRow($row) {
		$this->addHtmlContent($row);
		return $this;
	}

	public function getObjectToHtmlString() {
		return $this->getSimpleHtmlObjectString();
	}
}