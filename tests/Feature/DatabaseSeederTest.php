<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    public function test_dummy_admin_can_login_after_seeding(): void
    {
        $exitCode = Artisan::call('migrate:fresh', ['--seed' => true]);

        $this->assertSame(0, $exitCode);
        $this->assertTrue(Auth::attempt([
            'email' => 'admin@gmail.com',
            'password' => 'password123',
        ]));
    }

    public function test_admin_login_redirects_to_admin_dashboard(): void
    {
        $this->artisan('migrate:fresh', ['--seed' => true]);

        $response = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
    }
}
