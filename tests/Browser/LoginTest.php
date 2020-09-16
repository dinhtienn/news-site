<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_login_function_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL') . '/contact')
                ->press('#btn-auth')
                ->value('#login-email', 'dinhtiennguyen.1202@gmail.com')
                ->value('#login-password', '120298')
                ->press('#btn-submit-login')
                ->assertPathIs('/');
        });
    }

    public function test_login_function_fail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL') . '/contact')
                ->press('#btn-auth')
                ->value('#login-email', 'dinhtiennguyen.1202@gmail.com')
                ->value('#login-password', '1202989')
                ->press('#btn-submit-login')
                ->assertPathIs('/contact');
        });
    }
}
