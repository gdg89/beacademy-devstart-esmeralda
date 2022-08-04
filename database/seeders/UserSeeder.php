<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->create([
            'isAdmin' => true,
            'name' => 'Luís V. Capelletto',
            'email' => 'admin@email.com',
            'password' => bcrypt('123123'),
            'email_verified_at' => now(),
            'avatar' => 'https://res.cloudinary.com/capelaum/image/upload/v1648581498/admin-uploads/xgeusezbgvtxuit2fn5e.jpg',
            'birthday' => '1996-01-01',
            'phone' => '(11) 99999-9999',
            'cpf' => '12312312311',
            'cep' => '12345-123',
            'state' => 'Distrito Federal',
            'city' => 'CIDADE',
            'district' => 'BAIRRO',
            'street' => 'ENDEREÇO',
            'complement' => 'Complemento',
            'number' => '123',
        ]);

        User::factory(20)->create();
    }
}
