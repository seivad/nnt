<?php namespace NNT\Filters;

use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Str;
use Cache;

class CacheFilter {
	
	public function fetch(Route $route, Request $request)
	{
		$key = $this->makeCacheKey($request->url());

		var_dump($key);

		//if (Cache::has($key)) return Cache::get($key);
	}

	public function put(Route $route, Request $request, Response $response)
	{
		$key = $this->makeCacheKey($request->url());

		var_dump($response->getContent());

		if ( ! Cache::has($key)) Cache::put($key, $response->getContent(), 1440);
	}

	protected function makeCacheKey($url)
	{
		return 'route_' . Str::slug($url);
	}

}