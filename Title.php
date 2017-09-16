<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:52
 */

class Title extends ASimpleHtmlObject {
	const tagName = "title";

	/**
	 * Title constructor.
	 * @param string|AHtmlObject $htmlHtmlContent
	 */
	public function __construct($htmlHtmlContent = NULL) {
		parent::__construct(self::tagName);
		$this->addHtmlContent($htmlHtmlContent);
	}

	public function getObjectToHtmlString() {
		return $this->getSimpleHtmlObjectString();
	}
}