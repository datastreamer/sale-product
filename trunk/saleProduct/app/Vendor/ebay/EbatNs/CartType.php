<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'OrderStatusCodeType.php';
require_once 'CheckoutOrderDetailType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'CartItemArrayType.php';
require_once 'AddressType.php';
require_once 'CheckoutCompleteRedirectType.php';

class CartType extends EbatNs_ComplexType
{
	// start props
	// @var long $CartID
	var $CartID;
	// @var AddressType $ShippingAddress
	var $ShippingAddress;
	// @var OrderStatusCodeType $CartStatus
	var $CartStatus;
	// @var dateTime $CreationTime
	var $CreationTime;
	// @var dateTime $ExpirationTime
	var $ExpirationTime;
	// @var anyURI $CheckoutURL
	var $CheckoutURL;
	// @var CheckoutCompleteRedirectType $CheckoutCompleteRedirect
	var $CheckoutCompleteRedirect;
	// @var CartItemArrayType $CartItemArray
	var $CartItemArray;
	// @var CheckoutOrderDetailType $OrderDetail
	var $OrderDetail;
	// end props

/**
 *

 * @return long
 */
	function getCartID()
	{
		return $this->CartID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCartID($value)
	{
		$this->CartID = $value;
	}
/**
 *

 * @return AddressType
 */
	function getShippingAddress()
	{
		return $this->ShippingAddress;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setShippingAddress($value)
	{
		$this->ShippingAddress = $value;
	}
/**
 *

 * @return OrderStatusCodeType
 */
	function getCartStatus()
	{
		return $this->CartStatus;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCartStatus($value)
	{
		$this->CartStatus = $value;
	}
/**
 *

 * @return dateTime
 */
	function getCreationTime()
	{
		return $this->CreationTime;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCreationTime($value)
	{
		$this->CreationTime = $value;
	}
/**
 *

 * @return dateTime
 */
	function getExpirationTime()
	{
		return $this->ExpirationTime;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setExpirationTime($value)
	{
		$this->ExpirationTime = $value;
	}
/**
 *

 * @return anyURI
 */
	function getCheckoutURL()
	{
		return $this->CheckoutURL;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCheckoutURL($value)
	{
		$this->CheckoutURL = $value;
	}
/**
 *

 * @return CheckoutCompleteRedirectType
 */
	function getCheckoutCompleteRedirect()
	{
		return $this->CheckoutCompleteRedirect;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCheckoutCompleteRedirect($value)
	{
		$this->CheckoutCompleteRedirect = $value;
	}
/**
 *

 * @return CartItemArrayType
 */
	function getCartItemArray()
	{
		return $this->CartItemArray;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCartItemArray($value)
	{
		$this->CartItemArray = $value;
	}
/**
 *

 * @return CheckoutOrderDetailType
 */
	function getOrderDetail()
	{
		return $this->OrderDetail;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setOrderDetail($value)
	{
		$this->OrderDetail = $value;
	}
/**
 *

 * @return 
 */
	function CartType()
	{
		$this->EbatNs_ComplexType('CartType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'CartID' =>
				array(
					'required' => false,
					'type' => 'long',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ShippingAddress' =>
				array(
					'required' => false,
					'type' => 'AddressType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'CartStatus' =>
				array(
					'required' => false,
					'type' => 'OrderStatusCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'CreationTime' =>
				array(
					'required' => false,
					'type' => 'dateTime',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ExpirationTime' =>
				array(
					'required' => false,
					'type' => 'dateTime',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'CheckoutURL' =>
				array(
					'required' => false,
					'type' => 'anyURI',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'CheckoutCompleteRedirect' =>
				array(
					'required' => false,
					'type' => 'CheckoutCompleteRedirectType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'CartItemArray' =>
				array(
					'required' => false,
					'type' => 'CartItemArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'OrderDetail' =>
				array(
					'required' => false,
					'type' => 'CheckoutOrderDetailType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>