<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:48
 */

class Td extends ACell {
	const tableCellRealTagName = "td";

	/**
	 * @param string|AHtmlObject $content
	 */
	public function __construct($content = NULL) {
		parent::__construct($content);
	}

	public function getObjectToHtmlString() {
		return str_replace(self::cellPlaceholderTagName, self::tableCellRealTagName, $this->getCellToHtmlString());
	}
}