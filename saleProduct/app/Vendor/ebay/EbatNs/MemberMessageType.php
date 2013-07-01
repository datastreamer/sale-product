<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'MessageTypeCodeType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'QuestionTypeCodeType.php';

class MemberMessageType extends EbatNs_ComplexType
{
	// start props
	// @var MessageTypeCodeType $MessageType
	var $MessageType;
	// @var QuestionTypeCodeType $QuestionType
	var $QuestionType;
	// @var boolean $EmailCopyToSender
	var $EmailCopyToSender;
	// @var boolean $HideSendersEmailAddress
	var $HideSendersEmailAddress;
	// @var boolean $DisplayToPublic
	var $DisplayToPublic;
	// @var string $SenderID
	var $SenderID;
	// @var string $SenderEmail
	var $SenderEmail;
	// @var string $RecipientID
	var $RecipientID;
	// @var string $Subject
	var $Subject;
	// @var string $Body
	var $Body;
	// @var string $MessageID
	var $MessageID;
	// @var string $ParentMessageID
	var $ParentMessageID;
	// end props

/**
 *

 * @return MessageTypeCodeType
 */
	function getMessageType()
	{
		return $this->MessageType;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setMessageType($value)
	{
		$this->MessageType = $value;
	}
/**
 *

 * @return QuestionTypeCodeType
 */
	function getQuestionType()
	{
		return $this->QuestionType;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setQuestionType($value)
	{
		$this->QuestionType = $value;
	}
/**
 *

 * @return boolean
 */
	function getEmailCopyToSender()
	{
		return $this->EmailCopyToSender;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setEmailCopyToSender($value)
	{
		$this->EmailCopyToSender = $value;
	}
/**
 *

 * @return boolean
 */
	function getHideSendersEmailAddress()
	{
		return $this->HideSendersEmailAddress;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setHideSendersEmailAddress($value)
	{
		$this->HideSendersEmailAddress = $value;
	}
/**
 *

 * @return boolean
 */
	function getDisplayToPublic()
	{
		return $this->DisplayToPublic;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setDisplayToPublic($value)
	{
		$this->DisplayToPublic = $value;
	}
/**
 *

 * @return string
 */
	function getSenderID()
	{
		return $this->SenderID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSenderID($value)
	{
		$this->SenderID = $value;
	}
/**
 *

 * @return string
 */
	function getSenderEmail()
	{
		return $this->SenderEmail;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSenderEmail($value)
	{
		$this->SenderEmail = $value;
	}
/**
 *

 * @return string
 * @param  $index 
 */
	function getRecipientID($index = null)
	{
		if ($index) {
		return $this->RecipientID[$index];
	} else {
		return $this->RecipientID;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setRecipientID($value, $index = null)
	{
		if ($index) {
	$this->RecipientID[$index] = $value;
	} else {
	$this->RecipientID = $value;
	}

	}
/**
 *

 * @return string
 */
	function getSubject()
	{
		return $this->Subject;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSubject($value)
	{
		$this->Subject = $value;
	}
/**
 *

 * @return string
 */
	function getBody()
	{
		return $this->Body;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setBody($value)
	{
		$this->Body = $value;
	}
/**
 *

 * @return string
 */
	function getMessageID()
	{
		return $this->MessageID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setMessageID($value)
	{
		$this->MessageID = $value;
	}
/**
 *

 * @return string
 */
	function getParentMessageID()
	{
		return $this->ParentMessageID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setParentMessageID($value)
	{
		$this->ParentMessageID = $value;
	}
/**
 *

 * @return 
 */
	function MemberMessageType()
	{
		$this->EbatNs_ComplexType('MemberMessageType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'MessageType' =>
				array(
					'required' => false,
					'type' => 'MessageTypeCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'QuestionType' =>
				array(
					'required' => false,
					'type' => 'QuestionTypeCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'EmailCopyToSender' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'HideSendersEmailAddress' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'DisplayToPublic' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'SenderID' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'SenderEmail' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'RecipientID' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => true,
					'cardinality' => '0..*'
				),
				'Subject' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Body' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'MessageID' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ParentMessageID' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
