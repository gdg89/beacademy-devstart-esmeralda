<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_access_product_create()
    {   
         $user= User::factory()->create();

        $response = $this->post('/login',[
            'email'=> $user['email'],
            'password'=> $user['password'],
        ]);
        
        $this->actingAs($user);
        $response = $this->get('/admin/produto/cadastro');

        $response->assertStatus(200);
    }
    
    public function test_product_store()
    {   
        $user = User::factory()->create();

        $response = $this->post('/login',[
            'email'=> $user['email'],
            'password'=> $user['password'],
        ]);
        
        $this->actingAs($user);
        
        
        $product = Product::factory()->create();
        $response= $this->post('/admin/produto/cadastro', [
            'name'=> $product['name'],
            'slug'=> $product['slug'],
            'price_cost'=> $product['price_cost'],
            'price_sell'=> $product['price_sell'],
            'cover'=> $product['cover'],
            'stock'=> $product['stock'],
            'description'=> $product['description']
        ])->assertRedirect('/');
        
        

    }
    
    
}
