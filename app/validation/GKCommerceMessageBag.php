<?php namespace App\Validation;

class GKCommerceMessageBag extends \Illuminate\Support\MessageBag
{
	public function toJson($options = 0)
	{
		return json_encode($this->toArray(), $options);
	}
}