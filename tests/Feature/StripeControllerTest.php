<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Stripe\Checkout\Session as StripeSession;
use Mockery;

class StripeControllerTest extends TestCase
{
    /** @test */
    public function it_returns_error_if_cart_empty()
    {
        Session::start(); // nécessaire pour les sessions
        $response = $this->postJson(route('checkout.create'));
        $response->assertStatus(400);
        $response->assertJson(['error' => 'Panier vide']);
    }

    /** @test */
    public function it_creates_stripe_session_with_cart_items()
    {
        Session::start();

        // Simuler un panier
        Session::put('cart', [
            ['nom' => 'Produit 1', 'prix' => 100, 'qty' => 2],
            ['nom' => 'Produit 2', 'prix' => 50, 'qty' => 1],
        ]);

        // Mock de l'API de conversion
        Http::fake([
            'api.exchangerate.host/*' => Http::response(['result' => 0.28], 200),
        ]);

        // Mock StripeSession::create
        $mock = Mockery::mock('alias:Stripe\Checkout\Session');
        $mock->shouldReceive('create')->once()->andReturn((object)['url' => 'https://stripe.com/session']);

        $response = $this->postJson(route('checkout.create'));

        $response->assertStatus(200);
        $response->assertJson(['url' => 'https://stripe.com/session']);
    }

    /** @test */
    public function it_forgets_cart_on_success()
    {
        Session::start();
        Session::put('cart', ['fake' => 'item']);

        $response = $this->get(route('checkout.success'));

        $response->assertStatus(200);
        $response->assertViewIs('frontoffice.payments.success');
        $this->assertEmpty(Session::get('cart'));
    }

    /** @test */
    public function it_displays_cancel_view()
    {
        $response = $this->get(route('checkout.cancel'));

        $response->assertStatus(200);
        $response->assertViewIs('frontoffice.payments.cancel');
    }
}
