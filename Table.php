<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class Table extends AHtmlObject {
	/**
	 * @var boolean $sortable
	 */
	private $sortable = NULL;
	/**
	 * @var Caption $caption
	 */
	private $caption = NULL;
	/*
	 * @var Colgroup $colsgoup
	 */
	private $colgroup = NULL;

	/**
	 * @var Thead
	 */
	private $thead = NULL;

	/**
	 * @var ArrayObject
	 */
	private $tbodyList = NULL;

	/**
	 * @var Tfoot
	 */
	private $tfoot = NULL;

	/**
	 * @param boolean $sortable
	 * @param Caption $caption
	 * @param ArrayObject <TableRow> $rowList
	 */
	public function __construct($sortable = NULL, $caption = NULL) {
		$this->sortable = $sortable;
		$this->caption  = $caption;
	}

	/**
	 * @return $sortable
	 */
	public function isSortable() {
		return $this->sortable;
	}

	/**
	 * @return $caption
	 */
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * @param $sortable
	 * @return $this Modified object
	 */
	public function setSortable($sortable) {
		$this->sortable = $sortable;
		return $this;
	}

	/**
	 * @param $caption
	 * @return $this Modified object
	 */
	public function setCaption($caption) {
		$this->caption = $caption;
		return $this;
	}

	/**
	 * @return null
	 */
	public function getColgroup() {
		return $this->colgroup;
	}

	/**
	 * @param null $colgroup
	 * @return $this Modified object
	 */
	public function setColgroup($colgroup) {
		$this->colgroup = $colgroup;
		return $this;
	}


	/**
	 * @return Tfoot
	 */
	public function getTfoot() {
		return $this->tfoot;
	}

	/**
	 * @param Tfoot $tfoot
	 * @return $this Modified object
	 */
	public function setTfoot($tfoot) {
		$this->tfoot = $tfoot;
		return $this;
	}

	/**
	 * @return Thead
	 */
	public function getThead() {
		return $this->thead;
	}

	/**
	 * @param Thead $thead
	 * @return $this Modified object
	 */
	public function setThead($thead) {
		$this->thead = $thead;
		return $this;
	}

	/**
	 * @return ArrayObject
	 */
	public function getTbodyList() {
		return $this->tbodyList;
	}

	/**
	 * @param ArrayObject $tbodyList
	 * @return $this Modified object
	 */
	private function setTbodyList($tbodyList) {
		$this->tbodyList = $tbodyList;
		return $this;
	}

	/**
	 * @param Tbody $tbodyList
	 * @return $this Modified object
	 */
	public function addTbody($tbody) {
		if ($this->tbodyList == NULL)
			$this->tbodyList = new ArrayObject();

		$this->tbodyList->append($tbody);
		return $this;
	}

	public function getObjectToHtmlString() {
		$table = "<table " . $this->getExtraAttributeAndStyleString() . " ";

		if ($this->isSortable())
			$table .= "sortable=\"sortable\"";

		$table .= ">";

		if ($this->getCaption() != NULL)
			$table .= $this->getCaption()->getObjectToHtmlString();

		if ($this->getColgroup() != NULL)
			$table .= $this->getColgroup()->getObjectToHtmlString();

		if ($this->getThead() != NULL)
			$table .= $this->getThead()->getObjectToHtmlString();

		if( $this->tbodyList != NULL ){
			foreach ($this->tbodyList as $tbody) {
				/** @var $row Tbody */
				$table .= $tbody->getObjectToHtmlString();
			}
		}
		if ($this->getTfoot() != NULL)
			$table .= $this->getTfoot()->getObjectToHtmlString();

		$table .= "</table>";

		return self::removeExcessWhitespaces($table);
	}
}
?>