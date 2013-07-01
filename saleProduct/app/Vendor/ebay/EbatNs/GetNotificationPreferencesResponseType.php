<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'NotificationEnableArrayType.php';
require_once 'NotificationUserDataType.php';
require_once 'AbstractResponseType.php';
require_once 'ApplicationDeliveryPreferencesType.php';
require_once 'NotificationEventPropertyType.php';

class GetNotificationPreferencesResponseType extends AbstractResponseType
{
	// start props
	// @var ApplicationDeliveryPreferencesType $ApplicationDeliveryPreferences
	var $ApplicationDeliveryPreferences;
	// @var NotificationEnableArrayType $UserDeliveryPreferenceArray
	var $UserDeliveryPreferenceArray;
	// @var NotificationUserDataType $UserData
	var $UserData;
	// @var NotificationEventPropertyType $EventProperty
	var $EventProperty;
	// end props

/**
 *

 * @return ApplicationDeliveryPreferencesType
 */
	function getApplicationDeliveryPreferences()
	{
		return $this->ApplicationDeliveryPreferences;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setApplicationDeliveryPreferences($value)
	{
		$this->ApplicationDeliveryPreferences = $value;
	}
/**
 *

 * @return NotificationEnableArrayType
 */
	function getUserDeliveryPreferenceArray()
	{
		return $this->UserDeliveryPreferenceArray;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setUserDeliveryPreferenceArray($value)
	{
		$this->UserDeliveryPreferenceArray = $value;
	}
/**
 *

 * @return NotificationUserDataType
 */
	function getUserData()
	{
		return $this->UserData;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setUserData($value)
	{
		$this->UserData = $value;
	}
/**
 *

 * @return NotificationEventPropertyType
 * @param  $index 
 */
	function getEventProperty($index = null)
	{
		if ($index) {
		return $this->EventProperty[$index];
	} else {
		return $this->EventProperty;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setEventProperty($value, $index = null)
	{
		if ($index) {
	$this->EventProperty[$index] = $value;
	} else {
	$this->EventProperty = $value;
	}

	}
/**
 *

 * @return 
 */
	function GetNotificationPreferencesResponseType()
	{
		$this->AbstractResponseType('GetNotificationPreferencesResponseType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'ApplicationDeliveryPreferences' =>
				array(
					'required' => false,
					'type' => 'ApplicationDeliveryPreferencesType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'UserDeliveryPreferenceArray' =>
				array(
					'required' => false,
					'type' => 'NotificationEnableArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'UserData' =>
				array(
					'required' => false,
					'type' => 'NotificationUserDataType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'EventProperty' =>
				array(
					'required' => false,
					'type' => 'NotificationEventPropertyType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => true,
					'cardinality' => '0..*'
				)
			));

	}
}
?>
