<?php
	 $random = date("U") ;
	 file_get_contents("http://www.smarteseller.com/saleProduct/index.php/cron/amazonAsin/5/-?".$random);
	 file_get_contents("http://www.smarteseller.com/saleProduct/index.php/cron/gatherAmazonCompetitions/5/-?".$random);
	 file_get_contents("http://www.smarteseller.com/saleProduct/index.php/cron/gatherAmazonFba/5/-?".$random);
	 file_get_contents("http://www.smarteseller.com/saleProduct/index.php/cron/amazonShippingAsin/5/-?".$random);
	 file_get_contents("http://www.smarteseller.com/saleProduct/index.php/cronSale/priceSale/5/-?".$random);