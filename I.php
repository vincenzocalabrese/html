<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class I extends ASimpleHtmlObject {
	const tagName = "i";

	/**
	 * I constructor.
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