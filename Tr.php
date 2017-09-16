<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:57
 */

class Tr extends ASimpleHtmlObject {
	const tagName = "tr";

	/**
	 * Div constructor.
	 * @internal param AHtmlObject|string $htmlHtmlContent
	 */
	public function __construct() {
		parent::__construct(self::tagName);
	}

	/**
	 * @param Td|Th $cell
	 * @return $this Modified object
	 */
	public function addCell($cell) {
		$this->addHtmlContent($cell);
		return $this;
	}

	public function getObjectToHtmlString() {
		return $this->getSimpleHtmlObjectString();
	}
}