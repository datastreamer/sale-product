<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'AbstractRequestType.php';
require_once 'PictureManagerDetailLevelCodeType.php';

class GetPictureManagerDetailsRequestType extends AbstractRequestType
{
	// start props
	// @var int $FolderID
	var $FolderID;
	// @var string $PictureURL
	var $PictureURL;
	// @var PictureManagerDetailLevelCodeType $PictureManagerDetailLevel
	var $PictureManagerDetailLevel;
	// end props

/**
 *

 * @return int
 */
	function getFolderID()
	{
		return $this->FolderID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setFolderID($value)
	{
		$this->FolderID = $value;
	}
/**
 *

 * @return string
 */
	function getPictureURL()
	{
		return $this->PictureURL;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPictureURL($value)
	{
		$this->PictureURL = $value;
	}
/**
 *

 * @return PictureManagerDetailLevelCodeType
 */
	function getPictureManagerDetailLevel()
	{
		return $this->PictureManagerDetailLevel;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPictureManagerDetailLevel($value)
	{
		$this->PictureManagerDetailLevel = $value;
	}
/**
 *

 * @return 
 */
	function GetPictureManagerDetailsRequestType()
	{
		$this->AbstractRequestType('GetPictureManagerDetailsRequestType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'FolderID' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'PictureURL' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'PictureManagerDetailLevel' =>
				array(
					'required' => false,
					'type' => 'PictureManagerDetailLevelCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
