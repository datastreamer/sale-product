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
 * MWSRecommendationsSectionService_Model_ProductIdentifier
 * 
 * Properties:
 * <ul>
 * 
 * <li>Asin: string</li>
 * <li>Sku: string</li>
 * <li>Upc: string</li>
 *
 * </ul>
 */

 class MWSRecommendationsSectionService_Model_ProductIdentifier extends MWSRecommendationsSectionService_Model {

    public function __construct($data = null)
    {
        $this->_fields = array (
            'Asin' => array('FieldValue' => null, 'FieldType' => 'string'),
            'Sku' => array('FieldValue' => null, 'FieldType' => 'string'),
            'Upc' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
	    parent::__construct($data);
    }

    /**
     * Get the value of the Asin property.
     *
     * @return String Asin.
     */
    public function getAsin()
	{
	    return $this->_fields['Asin']['FieldValue'];
    }

    /**
     * Set the value of the Asin property.
     *
     * @param string asin
     * @return this instance
     */
    public function setAsin($value)
	{
	    $this->_fields['Asin']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if Asin is set.
     *
     * @return true if Asin is set.
     */
    public function isSetAsin()
	{
	            return !is_null($this->_fields['Asin']['FieldValue']);
		    }

    /**
     * Set the value of Asin, return this.
     *
     * @param asin
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withAsin($value)
	{
        $this->setAsin($value);
        return $this;
    }

    /**
     * Get the value of the Sku property.
     *
     * @return String Sku.
     */
    public function getSku()
	{
	    return $this->_fields['Sku']['FieldValue'];
    }

    /**
     * Set the value of the Sku property.
     *
     * @param string sku
     * @return this instance
     */
    public function setSku($value)
	{
	    $this->_fields['Sku']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if Sku is set.
     *
     * @return true if Sku is set.
     */
    public function isSetSku()
	{
	            return !is_null($this->_fields['Sku']['FieldValue']);
		    }

    /**
     * Set the value of Sku, return this.
     *
     * @param sku
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withSku($value)
	{
        $this->setSku($value);
        return $this;
    }

    /**
     * Get the value of the Upc property.
     *
     * @return String Upc.
     */
    public function getUpc()
	{
	    return $this->_fields['Upc']['FieldValue'];
    }

    /**
     * Set the value of the Upc property.
     *
     * @param string upc
     * @return this instance
     */
    public function setUpc($value)
	{
	    $this->_fields['Upc']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if Upc is set.
     *
     * @return true if Upc is set.
     */
    public function isSetUpc()
	{
	            return !is_null($this->_fields['Upc']['FieldValue']);
		    }

    /**
     * Set the value of Upc, return this.
     *
     * @param upc
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withUpc($value)
	{
        $this->setUpc($value);
        return $this;
    }

}
