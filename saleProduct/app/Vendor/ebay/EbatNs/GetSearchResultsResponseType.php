<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'ExpansionArrayType.php';
require_once 'SpellingSuggestionType.php';
require_once 'AbstractResponseType.php';
require_once 'RelatedSearchKeywordArrayType.php';
require_once 'BuyingGuideDetailsType.php';
require_once 'CategoryArrayType.php';
require_once 'SearchResultItemArrayType.php';
require_once 'PaginationResultType.php';

class GetSearchResultsResponseType extends AbstractResponseType
{
	// start props
	// @var SearchResultItemArrayType $SearchResultItemArray
	var $SearchResultItemArray;
	// @var int $ItemsPerPage
	var $ItemsPerPage;
	// @var int $PageNumber
	var $PageNumber;
	// @var boolean $HasMoreItems
	var $HasMoreItems;
	// @var PaginationResultType $PaginationResult
	var $PaginationResult;
	// @var CategoryArrayType $CategoryArray
	var $CategoryArray;
	// @var BuyingGuideDetailsType $BuyingGuideDetails
	var $BuyingGuideDetails;
	// @var ExpansionArrayType $StoreExpansionArray
	var $StoreExpansionArray;
	// @var ExpansionArrayType $InternationalExpansionArray
	var $InternationalExpansionArray;
	// @var ExpansionArrayType $FilterRemovedExpansionArray
	var $FilterRemovedExpansionArray;
	// @var ExpansionArrayType $AllCategoriesExpansionArray
	var $AllCategoriesExpansionArray;
	// @var SpellingSuggestionType $SpellingSuggestion
	var $SpellingSuggestion;
	// @var RelatedSearchKeywordArrayType $RelatedSearchKeywordArray
	var $RelatedSearchKeywordArray;
	// end props

/**
 *

 * @return SearchResultItemArrayType
 */
	function getSearchResultItemArray()
	{
		return $this->SearchResultItemArray;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSearchResultItemArray($value)
	{
		$this->SearchResultItemArray = $value;
	}
/**
 *

 * @return int
 */
	function getItemsPerPage()
	{
		return $this->ItemsPerPage;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setItemsPerPage($value)
	{
		$this->ItemsPerPage = $value;
	}
/**
 *

 * @return int
 */
	function getPageNumber()
	{
		return $this->PageNumber;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPageNumber($value)
	{
		$this->PageNumber = $value;
	}
/**
 *

 * @return boolean
 */
	function getHasMoreItems()
	{
		return $this->HasMoreItems;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setHasMoreItems($value)
	{
		$this->HasMoreItems = $value;
	}
/**
 *

 * @return PaginationResultType
 */
	function getPaginationResult()
	{
		return $this->PaginationResult;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPaginationResult($value)
	{
		$this->PaginationResult = $value;
	}
/**
 *

 * @return CategoryArrayType
 */
	function getCategoryArray()
	{
		return $this->CategoryArray;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCategoryArray($value)
	{
		$this->CategoryArray = $value;
	}
/**
 *

 * @return BuyingGuideDetailsType
 */
	function getBuyingGuideDetails()
	{
		return $this->BuyingGuideDetails;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setBuyingGuideDetails($value)
	{
		$this->BuyingGuideDetails = $value;
	}
/**
 *

 * @return ExpansionArrayType
 */
	function getStoreExpansionArray()
	{
		return $this->StoreExpansionArray;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setStoreExpansionArray($value)
	{
		$this->StoreExpansionArray = $value;
	}
/**
 *

 * @return ExpansionArrayType
 */
	function getInternationalExpansionArray()
	{
		return $this->InternationalExpansionArray;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setInternationalExpansionArray($value)
	{
		$this->InternationalExpansionArray = $value;
	}
/**
 *

 * @return ExpansionArrayType
 */
	function getFilterRemovedExpansionArray()
	{
		return $this->FilterRemovedExpansionArray;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setFilterRemovedExpansionArray($value)
	{
		$this->FilterRemovedExpansionArray = $value;
	}
/**
 *

 * @return ExpansionArrayType
 */
	function getAllCategoriesExpansionArray()
	{
		return $this->AllCategoriesExpansionArray;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setAllCategoriesExpansionArray($value)
	{
		$this->AllCategoriesExpansionArray = $value;
	}
/**
 *

 * @return SpellingSuggestionType
 */
	function getSpellingSuggestion()
	{
		return $this->SpellingSuggestion;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSpellingSuggestion($value)
	{
		$this->SpellingSuggestion = $value;
	}
/**
 *

 * @return RelatedSearchKeywordArrayType
 */
	function getRelatedSearchKeywordArray()
	{
		return $this->RelatedSearchKeywordArray;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setRelatedSearchKeywordArray($value)
	{
		$this->RelatedSearchKeywordArray = $value;
	}
/**
 *

 * @return 
 */
	function GetSearchResultsResponseType()
	{
		$this->AbstractResponseType('GetSearchResultsResponseType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'SearchResultItemArray' =>
				array(
					'required' => false,
					'type' => 'SearchResultItemArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ItemsPerPage' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'PageNumber' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'HasMoreItems' =>
				array(
					'required' => true,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '1..1'
				),
				'PaginationResult' =>
				array(
					'required' => false,
					'type' => 'PaginationResultType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'CategoryArray' =>
				array(
					'required' => false,
					'type' => 'CategoryArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'BuyingGuideDetails' =>
				array(
					'required' => false,
					'type' => 'BuyingGuideDetailsType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'StoreExpansionArray' =>
				array(
					'required' => false,
					'type' => 'ExpansionArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'InternationalExpansionArray' =>
				array(
					'required' => false,
					'type' => 'ExpansionArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'FilterRemovedExpansionArray' =>
				array(
					'required' => false,
					'type' => 'ExpansionArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'AllCategoriesExpansionArray' =>
				array(
					'required' => false,
					'type' => 'ExpansionArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'SpellingSuggestion' =>
				array(
					'required' => false,
					'type' => 'SpellingSuggestionType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'RelatedSearchKeywordArray' =>
				array(
					'required' => false,
					'type' => 'RelatedSearchKeywordArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
