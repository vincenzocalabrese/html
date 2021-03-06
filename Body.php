<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:50
 */

class Body extends ASimpleHtmlObject {
	const tagName = "body";

	/**
	 * Strong constructor.
	 * @param string|AHtmlObject $htmlHtmlContent
	 */
	public function __construct($htmlHtmlContent = NULL) {
		parent::__construct(self::tagName);
		$this->addHtmlContent($htmlHtmlContent);
	}

	public function getObjectToHtmlString() {
		return $this->getSimpleHtmlObjectString(TRUE);
	}
}