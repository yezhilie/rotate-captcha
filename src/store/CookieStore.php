<?php
declare (strict_types = 1);

namespace isszz\captcha\rotate\store;

use isszz\captcha\rotate\Store;

use think\facade\Cookie;

class CookieStore extends Store
{
	/**
	 * Get token
	 * 
	 * @param string $token
	 * @return string
	 */
	public function get($token): array
	{
		if(!Cookie::has(self::TOKEN_PRE . $token)) {
			return [];
		}

		$payload = Cookie::get(self::TOKEN_PRE . $token);

		if(empty($payload)) {
			return [];
		}

		$payload = $this->encrypter->decrypt($payload);

		if(empty($payload)) {
			return [];
		}

		Cookie::delete(self::TOKEN_PRE . $token);

		return json_decode($payload, true);
	}
	
	/**
	 * Storage token
	 * 
	 * @param int|float|string $degrees
	 * @return string
	 */
	public function put($degrees): string
	{
		[$token, $payload] = $this->buildPayload($degrees);

		Cookie::set(self::TOKEN_PRE . $token, $payload, $this->ttl);

		return $token;
	}
}
