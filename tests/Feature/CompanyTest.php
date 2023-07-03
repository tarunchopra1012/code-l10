<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_user_can_access_companies_index_page(): void
    {
        $user = User::factory()->admin()->create();

        $response = $this->actingAs($user)->get(route('companies.index'));

        $response->assertOk();
    }

    public function test_non_admin_user_cannot_access_companies_index_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('companies.index'));

        $response->assertForbidden();
    }
}
