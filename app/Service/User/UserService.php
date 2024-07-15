<?php

declare(strict_types=1);

namespace App\Service\User;

use Illuminate\Support\Facades\Redis;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\UserNotFoundException;
use App\Exceptions\UserNotFoundInRedisException;
use App\Exceptions\UserNotStoredInRedisException;
use App\Exceptions\CouldNotCreateJWTokenPassportException;

class UserService
{
	private int $expirationTime_s = 60 * 30; //30 minutes expiration time
	private string $JWTokenRedisPre = 'user:0:JWToken_';

	private $redis;

	public function __construct()
	{
		$this->redis = new Redis();
	}

	public function checkUserCredentials(User $user, string $password): bool
	{
		// Maybe here we should use exceptions to handle the error instead of returning false
		if (!$user || !Hash::check($password, $user->password)) {
			return false;
		}
		return true;
	}

	public function getUserByDNI(string $userDNI): User | Exception
	{
		$user = User::where('dni', $userDNI)->first();

		if (!$user) {
			throw new UserNotFoundException($userDNI);
		}
		return $user;
	}

	public function generateJWToken(User $user): string | Exception
	{
		$jwt = $user->createToken('loginToken')->accessToken;

		if (!$jwt) {
			throw new CouldNotCreateJWTokenPassportException($user->id);
		}
		return $jwt;
	}

	public function storeUserIDAndTokenRedis(string | int $userID, string $token): bool | Exception
	{
		if (is_numeric($userID)) {
			$userID = (string)$userID;
		}

		try {
			$result = Redis::set($this->JWTokenRedisPre . $userID, $token, 'EX', $this->expirationTime_s);
			if (!$result) {
				throw new UserNotStoredInRedisException($userID);
			}
			return true;
		} catch (Exception $e) {
			throw new UserNotStoredInRedisException($userID);
		}
	}

	public function getJWTokenByUserID(string | int $userID): string | Exception
	{
		if (is_numeric($userID)) {
			$userID = (string)$userID;
		}

		$jwt = Redis::get('user:0:JWToken_' . $userID);

		if (!$jwt) {
			throw new UserNotFoundInRedisException($userID);
		}
	
		return $jwt;
	}
}
