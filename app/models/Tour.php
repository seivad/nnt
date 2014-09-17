<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Tour extends Eloquent {

	protected $collection = 'tours';

	protected $guarded = [];
}