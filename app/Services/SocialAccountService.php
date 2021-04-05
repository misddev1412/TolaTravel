<?php

namespace App\Services;

use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $email = $providerUser->getEmail() ?? $providerUser->getNickname();
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social
            ]);
            $user = User::whereEmail($email)->first();

            if (!$user) {
                $user = new User();
                $user->create((object)[
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'password' => $providerUser->getName(),
                ]);
                $user->save();
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}