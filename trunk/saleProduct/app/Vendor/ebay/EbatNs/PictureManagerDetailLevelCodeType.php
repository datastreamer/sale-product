<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_FacetType.php';

class PictureManagerDetailLevelCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $ReturnAll
	var $ReturnAll = 'ReturnAll';
	// @var string $ReturnSubscription
	var $ReturnSubscription = 'ReturnSubscription';
	// @var string $ReturnPicture
	var $ReturnPicture = 'ReturnPicture';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function PictureManagerDetailLevelCodeType()
	{
		$this->EbatNs_FacetType('PictureManagerDetailLevelCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_PictureManagerDetailLevelCodeType = new PictureManagerDetailLevelCodeType();

?>
