<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class P extends ASimpleHtmlObject {
	const tagName = "p";

	/**
	 * P constructor.
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

?>