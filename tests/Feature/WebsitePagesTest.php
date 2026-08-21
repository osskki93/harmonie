<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class WebsitePagesTest extends TestCase
{
    public function test_main_pages_are_accessible(): void
    {
        $this->get(route('home'))->assertOk();
        $this->get(route('services'))->assertOk();
        $this->get(route('about'))->assertOk();
    }

    public function test_locale_switch_changes_language(): void
    {
        $this->withSession(['locale' => 'de_CH'])
            ->get(route('home'))
            ->assertSee('Viel mehr als Permanent Make-up');

        $this->withSession(['locale' => 'de_CH'])
            ->get(route('language.switch', ['locale' => 'en']))
            ->assertRedirect();

        $this->withSession(['locale' => 'en'])
            ->get(route('home'))
            ->assertSee('Much more than permanent make-up');
    }

    public function test_invalid_locale_is_rejected(): void
    {
        $this->get('/language/es')->assertNotFound();
    }

    public function test_home_contains_open_graph_metadata(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('property="og:title"', false)
            ->assertSee('property="og:image"', false)
            ->assertSee('name="twitter:card"', false);
    }

    public function test_sitemap_is_available(): void
    {
        $this->get(route('sitemap'))
            ->assertOk()
            ->assertHeader('content-type', 'application/xml')
            ->assertSee('<urlset', false)
            ->assertSee(route('home'), false)
            ->assertSee(route('services'), false)
            ->assertSee(route('about'), false);
    }
}
