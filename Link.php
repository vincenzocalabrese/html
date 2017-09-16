<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:51
 */

class Link extends AHtmlObject {
	/**
	 * @var string
	 */
	private $crossorigin = NULL;
	/**
	 * @var string
	 */
	private $href = NULL;
	/**
	 * @var string
	 */
	private $hreflang = NULL;
	/**
	 * @var string
	 */
	private $media = NULL;
	/**
	 * @var string
	 */
	private $rel = NULL;
	/**
	 * @var float
	 */
	private $sizes = NULL;
	/**
	 * @var string
	 */
	private $type = NULL;

	/**
	 * @return string
	 */
	public function getCrossorigin() {
		return $this->crossorigin;
	}

	/**
	 * @param string $crossorigin
	 * @return $this Modified object
	 */
	public function setCrossorigin($crossorigin) {
		$this->crossorigin = $crossorigin;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getHref() {
		return $this->href;
	}

	/**
	 * @param string $href
	 * @return $this Modified object
	 */
	public function setHref($href) {
		$this->href = $href;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getHreflang() {
		return $this->hreflang;
	}

	/**
	 * @param string $hreflang
	 * @return $this Modified object
	 */
	public function setHreflang($hreflang) {
		$this->hreflang = $hreflang;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * @param string $media
	 * @return $this Modified object
	 */
	public function setMedia($media) {
		$this->media = $media;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getRel() {
		return $this->rel;
	}

	/**
	 * @param string $rel
	 * @return $this Modified object
	 */
	public function setRel($rel) {
		$this->rel = $rel;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getSizes() {
		return $this->sizes;
	}

	/**
	 * @param float $sizes
	 * @return $this Modified object
	 */
	public function setSizes($sizes) {
		$this->sizes = $sizes;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return $this Modified object
	 */
	public function setType($type) {
		$this->type = $type;
		return $this;
	}

	/**
	 * @param AHtmlObject|string $nothing
	 * @return $this Modified object
	 */
	public function addHtmlContent($nothing) {
		return $this;
	}

	/**
	 * A String representation of HTML object
	 */
	public function getObjectToHtmlString() {
		$object = "";

		if ($this->href == NULL)
			return $object;

		$object = "<link " . $this->getExtraAttributeAndStyleString();
		$object .= " href=\"" . $this->href . "\"";

		if ($this->crossorigin != NULL)
			$object .= " crossorigin=\"" . $this->crossorigin . "\"";

		if ($this->hreflang != NULL)
			$object .= " hreflang=\"" . $this->hreflang . "\"";

		if ($this->media != NULL)
			$object .= " media=\"" . $this->media . "\"";

		if ($this->rel != NULL)
			$object .= " rel=\"" . $this->rel . "\"";

		if ($this->sizes != NULL)
			$object .= " sizes=\"" . $this->sizes . "\"";

		if ($this->type != NULL)
			$object .= " type=\"" . $this->type . "\"";

		$object .= " />\n";

		return $object;
	}
}