<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class Span extends ASimpleHtmlObject {
	const tagName = "span";

	/**
	 * Span constructor.
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