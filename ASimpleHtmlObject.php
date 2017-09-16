<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:53
 */

abstract class ASimpleHtmlObject extends AHtmlObject {
	/**
	 * @var string
	 */
	private $tag = NULL;

	/**
	 * SimpleHtmlObject constructor.
	 * @param string $tag Specify the tag to use for current simple object.
	 */
	public function __construct($tag) {
		$this->tag = $tag;
	}

	private function getOpenTag() {
		return "<" . $this->tag . " " . $this->getExtraAttributeAndStyleString() . " >";
	}

	private function getCloseTag() {
		return "</" . $this->tag . ">";
	}


	protected function getSimpleHtmlObjectString() {
		$simple = $this->getOpenTag();
		$simple .= $this->getHtmlContent();
		$simple .= $this->getCloseTag();

		return self::removeExcessWhitespaces($simple);
	}
}
