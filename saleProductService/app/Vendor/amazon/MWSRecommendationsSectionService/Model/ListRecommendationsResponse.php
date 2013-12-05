<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     MWSRecommendationsSectionService
 *  @copyright   Copyright 2008-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2013-04-01
 */
 
/******************************************************************************* 
 * 
 *  MWS Recommendations Section Service PHP5 Library
 *  Generated: Thu Jun 06 14:24:33 PDT 2013
 * 
 */

/**
 *  @see MWSRecommendationsSectionService_Model
 */

require_once (VENDOR_PATH.'/amazon/MWSRecommendationsSectionService/Model.php');


/**
 * MWSRecommendationsSectionService_Model_ListRecommendationsResponse
 * 
 * Properties:
 * <ul>
 * 
 * <li>ListRecommendationsResult: MWSRecommendationsSectionService_Model_ListRecommendationsResult</li>
 * <li>ResponseMetadata: MWSRecommendationsSectionService_Model_ResponseMetadata</li>
 * <li>ResponseHeaderMetadata: MWSRecommendationsSectionService_Model_ResponseHeaderMetadata</li>
 *
 * </ul>
 */

 class MWSRecommendationsSectionService_Model_ListRecommendationsResponse extends MWSRecommendationsSectionService_Model {

    public function __construct($data = null)
    {
        $this->_fields = array (
            'ListRecommendationsResult' => array('FieldValue' => null, 'FieldType' => 'MWSRecommendationsSectionService_Model_ListRecommendationsResult'),
            'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'MWSRecommendationsSectionService_Model_ResponseMetadata'),
            'ResponseHeaderMetadata' => array('FieldValue' => null, 'FieldType' => 'MWSRecommendationsSectionService_Model_ResponseHeaderMetadata'),
        );
	    parent::__construct($data);
    }

    /**
     * Get the value of the ListRecommendationsResult property.
     *
     * @return ListRecommendationsResult ListRecommendationsResult.
     */
    public function getListRecommendationsResult()
	{
	    return $this->_fields['ListRecommendationsResult']['FieldValue'];
    }

    /**
     * Set the value of the ListRecommendationsResult property.
     *
     * @param MWSRecommendationsSectionService_Model_ListRecommendationsResult listRecommendationsResult
     * @return this instance
     */
    public function setListRecommendationsResult($value)
	{
	    $this->_fields['ListRecommendationsResult']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if ListRecommendationsResult is set.
     *
     * @return true if ListRecommendationsResult is set.
     */
    public function isSetListRecommendationsResult()
	{
	            return !is_null($this->_fields['ListRecommendationsResult']['FieldValue']);
		    }

    /**
     * Set the value of ListRecommendationsResult, return this.
     *
     * @param listRecommendationsResult
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withListRecommendationsResult($value)
	{
        $this->setListRecommendationsResult($value);
        return $this;
    }

    /**
     * Get the value of the ResponseMetadata property.
     *
     * @return ResponseMetadata ResponseMetadata.
     */
    public function getResponseMetadata()
	{
	    return $this->_fields['ResponseMetadata']['FieldValue'];
    }

    /**
     * Set the value of the ResponseMetadata property.
     *
     * @param MWSRecommendationsSectionService_Model_ResponseMetadata responseMetadata
     * @return this instance
     */
    public function setResponseMetadata($value)
	{
	    $this->_fields['ResponseMetadata']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if ResponseMetadata is set.
     *
     * @return true if ResponseMetadata is set.
     */
    public function isSetResponseMetadata()
	{
	            return !is_null($this->_fields['ResponseMetadata']['FieldValue']);
		    }

    /**
     * Set the value of ResponseMetadata, return this.
     *
     * @param responseMetadata
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withResponseMetadata($value)
	{
        $this->setResponseMetadata($value);
        return $this;
    }

    /**
     * Get the value of the ResponseHeaderMetadata property.
     *
     * @return ResponseHeaderMetadata ResponseHeaderMetadata.
     */
    public function getResponseHeaderMetadata()
	{
	    return $this->_fields['ResponseHeaderMetadata']['FieldValue'];
    }

    /**
     * Set the value of the ResponseHeaderMetadata property.
     *
     * @param MWSRecommendationsSectionService_Model_ResponseHeaderMetadata responseHeaderMetadata
     * @return this instance
     */
    public function setResponseHeaderMetadata($value)
	{
	    $this->_fields['ResponseHeaderMetadata']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if ResponseHeaderMetadata is set.
     *
     * @return true if ResponseHeaderMetadata is set.
     */
    public function isSetResponseHeaderMetadata()
	{
	            return !is_null($this->_fields['ResponseHeaderMetadata']['FieldValue']);
		    }

    /**
     * Set the value of ResponseHeaderMetadata, return this.
     *
     * @param responseHeaderMetadata
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withResponseHeaderMetadata($value)
	{
        $this->setResponseHeaderMetadata($value);
        return $this;
    }
    /**
     * Construct MWSRecommendationsSectionService_Model_ListRecommendationsResponse from XML string
     * 
     * @param $xml
     *        XML string to construct from
     *
     * @return MWSRecommendationsSectionService_Model_ListRecommendationsResponse 
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
        $response = $xpath->query("//*[local-name()='ListRecommendationsResponse']");
        if ($response->length == 1) {
            return new MWSRecommendationsSectionService_Model_ListRecommendationsResponse(($response->item(0))); 
        } else {
            throw new Exception ("Unable to construct MWSRecommendationsSectionService_Model_ListRecommendationsResponse from provided XML. 
                                  Make sure that ListRecommendationsResponse is a root element");
        }
    }
    /**
     * XML Representation for this object
     * 
     * @return string XML for this object
     */
    public function toXML() 
    {
        $xml = "";
        $xml .= "<ListRecommendationsResponse xmlns=\"https://mws.amazonservices.com/Recommendations/2013-04-01\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</ListRecommendationsResponse>";
        return $xml;
    }

}
