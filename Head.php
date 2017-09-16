<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:52
 */

class Head extends AHtmlObject {
	/**
	 * @var string|Title $title
	 */
	private $title = NULL;

	/**
	 * @var ArrayObject<Meta>
	 */
	private $metaList = NULL;

	/**
	 * @var ArrayObject<Link>
	 */
	private $linkList = NULL;

	/**
	 * @var ArrayObject<Script>
	 */
	private $scriptList = NULL;

	/**
	 * @return ArrayObject
	 */
	public function getLinkList() {
		return $this->linkList;
	}

	/**
	 * @param ArrayObject $linkList
	 * @return $this Modified object
	 */
	private function setLinkList($linkList) {
		$this->linkList = $linkList;
		return $this;
	}

	/**
	 * @param Link $link
	 * @return $this Modified object
	 */
	public function addLink($link) {
		if ($this->linkList == NULL)
			$this->linkList = new ArrayObject();

		$this->linkList->append($link);
		return $this;
	}

	/**
	 * @return ArrayObject
	 */
	public function getScriptList() {
		return $this->scriptList;
	}

	/**
	 * @param ArrayObject $scriptList
	 * @return $this Modified object
	 */
	private function setScriptList($scriptList) {
		$this->scriptList = $scriptList;
		return $this;
	}

	/**
	 * @param Script $script
	 * @return $this Modified object
	 */
	public function addScript($script) {
		if ($this->scriptList == NULL)
			$this->scriptList = new ArrayObject();

		$this->scriptList->append($script);
		return $this;
	}

	/**
	 * @return Title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string|Title $title
	 * @return $this Modified object
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * @return ArrayObject
	 */
	public function getMetaList() {
		return $this->metaList;
	}

	/**
	 * @param ArrayObject $meta
	 * @return $this Modified object
	 */
	private function setMetaList($metaList) {
		$this->metaList = $metaList;
		return $this;
	}

	/**
	 * @param Meta $meta
	 * @return $this Modified object
	 */
	public function addMeta($meta) {
		if ($this->metaList == NULL)
			$this->metaList = new ArrayObject();

		$this->metaList->append($meta);
		return $this;
	}

	/**
	 * @return string
	 */
	public function getObjectToHtmlString() {
		$object = "<head " . $this->getExtraAttributeAndStyleString() . ">";
		if ($this->title != NULL)
			$object .= $this->title->getObjectToHtmlString();

		if ($this->metaList != NULL) {
			foreach ($this->metaList as $meta)
				/** @var $meta Meta * */
				$object .= $meta->getObjectToHtmlString();
		}

		if ($this->linkList != NULL) {
			foreach ($this->linkList as $link)
				/** @var $link Link * */
				$object .= $link->getObjectToHtmlString();
		}

		if ($this->scriptList != NULL) {
			foreach ($this->scriptList as $script)
				/** @var $script Script * */
				$object .= $script->getObjectToHtmlString();
		}

		$object .= "</head>";

		return $object;
	}
}