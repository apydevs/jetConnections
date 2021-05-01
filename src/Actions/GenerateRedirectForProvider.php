<?php

namespace JoelButcher\Socialstream\Actions;

use JoelButcher\Socialstream\Contracts\GeneratesProviderRedirect;
use Laravel\Socialite\Facades\Socialite;

class GenerateRedirectForProvider implements GeneratesProviderRedirect
{
    /**
     * Generates the redirect for a given provider.
     *
     * @param  string  $provider
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function generate(string $provider)
    {
        if($provider === 'facebook'){
            return Socialite::driver($provider)
                ->scopes(config("socialscopes.$provider"))
                ->redirect();
        }else{
            return Socialite::driver($provider)->redirect();
        }
    }
}
