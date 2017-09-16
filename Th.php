<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:49
 */

class Th extends ACell {
	const tableCellRealTagName = "th";

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