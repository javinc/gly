<?php //-->
/*
 * This file is part of the Openovate Labs Inc. framework library
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Api\Page;

/**
 * The base class for any class that defines a view.
 * A view controls how templates are loaded as well as 
 * being the final point where data manipulation can occur.
 *
 * @vendor Openovate
 * @package Framework
 */
class Stats extends \Page 
{
	/* Constants
	-------------------------------*/
	const WORDGEN_HOST = 'http://randomword.setgetgo.com/get.php';

	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function getVariables()
	{
		// check if new exists
		$links = control()->database()->search('link')->setColumns('clicks')->getRows();
		$hits = 0;

		foreach($links as $link) 
		    $hits += $link['clicks'];

		return array('total' => array(
		    'hits' => $hits,
		    'urls' => count($links)
		));
	}

	/* Protected Methods
	--------------------------------------------*/
	/* Private Methods
	--------------------------------------------*/
}
