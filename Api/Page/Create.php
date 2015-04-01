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
class Create extends \Page 
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
		$url = control()->registry();
		$url = $url['post']['url'];

		$json = file_get_contents('php://input');
		$obj = (array) json_decode($json);
		if(!isset($obj['url']) || $obj['url'] == '') {
			return array(
				'error' => true,
				'msg' => 'url field not defined');
		}

		$url = $obj['url'];

		$data = array('url' => $url, 'new' => $new, 'clicks' => 0);

		// check same domain
		if (preg_match('/' . ltrim($_SERVER['HTTP_HOST'], 'api.') . '/', $url)) {
		    return;
		}

		// check if new exists
		$link = control()->database()->search('link')->filterByUrl($url)->getRow();
		if(!empty($link)) {
			$data['new'] = $link['new'];
			$data['clicks'] = $link['clicks'];
			
			return $data;
		}

		$data['new'] = self::genNew();

		// create 
		control()->database()->insertRow('link', $data);

		return $data;
	}

	public static function genNew()
	{
		// check if new exists
		$new = self::getWord() . rand(0, 99);

		$link = control()->database()->search('link')->filterByNew($new)->getRow();
		if(!empty($link)) {
			$new = self::genNew();
		}

		return $new;
	}

	public static function getWord($url)
	{
		$words = control()->database()->search('word')->getRows();

		return $words[rand(0, count($words) - 1)]['word'];
	}

	/* Protected Methods
	--------------------------------------------*/
	/* Private Methods
	--------------------------------------------*/
}