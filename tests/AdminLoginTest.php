<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminLoginTest extends TestCase
{
    public function testGuestCantSeeAdmin()
    {
        $this->visit('/admin')
             ->seePageIs('/login');
    }
    public function testAdminCanLogin()
    {
        $admin = factory(App\User::class)->create([
            'password' => bcrypt('qwerty')
        ]);
        #$this->actingAs($admin);
        $this->visit('/login')
            ->type($admin->email, 'email')
            ->type('qwerty', 'password')
            ->press('Logga in')
            ->seePageIs('/admin')
            ->see('Hej ' . $admin->name . '!');
    }
}
