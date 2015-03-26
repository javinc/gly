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
class Sample extends \Page 
{
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function getVariables()
	{ 
		return array('sample' => array(100, 200, 300));
	}


	/* Protected Methods
	--------------------------------------------*/
	/* Private Methods
	--------------------------------------------*/
}