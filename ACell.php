<?php

/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:46
 */
abstract class ACell extends AHtmlObject {
	const cellPlaceholderTagName = "[[cell]]";

	private $colspan = NULL;

	private $headers = NULL;

	private $rowspan = NULL;

	/**
	 * ACell constructor.
	 * @param null $content
	 */
	protected function __construct($content = NULL) {
		$this->addHtmlContent($content);
	}

	/**
	 * @return $colspan
	 */
	public function getColspan() {
		return $this->colspan;
	}

	/**
	 * @return $headers
	 */
	public function getHeaders() {
		return $this->headers;
	}

	/**
	 * @return $rowspan
	 */
	public function getRowspan() {
		return $this->rowspan;
	}

	/**
	 * @param $colspan
	 * @return $this Modified object
	 */
	public function setColspan($colspan) {
		$this->colspan = $colspan;
		return $this;
	}

	/**
	 * @param $headers
	 * @return $this Modified object
	 */
	public function setHeaders($headers) {
		$this->headers = $headers;
		return $this;
	}

	/**
	 * @param $rowspan
	 * @return $this Modified object
	 */
	public function setRowspan($rowspan) {
		$this->rowspan = $rowspan;
		return $this;
	}

	public function getCellToHtmlString() {
		$cell = "<" . self::cellPlaceholderTagName . " " . $this->getExtraAttributeAndStyleString();
		$cell = trim($cell);

		if ($this->colspan != NULL)
			$cell .= " colspan=\"" . $this->colspan . "\"";

		if ($this->headers != NULL)
			$cell .= " headers=\"" . $this->headers . "\"";

		if ($this->rowspan != NULL)
			$cell .= " rowspan=\"" . $this->rowspan . "\"";

		$cell .= ">" . $this->getHtmlContent() . "</" . self::cellPlaceholderTagName . ">";

		return self::removeExcessWhitespaces($cell) . "";
	}
}