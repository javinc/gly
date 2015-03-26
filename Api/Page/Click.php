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
class Click extends \Page 
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
		$new = control()->registry();
		$new = current($new['request']['variables']);

		// check if new exists
		$link = control()->database()->search('link')->filterByNew($new)->getRow();
		if(!empty($link)) {
			control()->database()->updateRows('link', array(
				'clicks' => ++$link['clicks']), array(
				'id' => $link['id']));
			
			return $link;
		}

		return array('error' => true);
	}

	/* Protected Methods
	--------------------------------------------*/
	/* Private Methods
	--------------------------------------------*/
}