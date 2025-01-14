<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // Untuk memastikan database dalam kondisi bersih sebelum setiap test

    /** @test */
    use RefreshDatabase;




    /** @test */
    public function testLogin_BerhasilDenganEmail_DanPassword_Valid()
    {
        $response = $this->post('/login', [
            'email' => 'validuser@gmail.com',
            'password' => bcrypt('validpass'),
        ]);

        $response->assertRedirect(); // Sesuai dengan role_id
    }

    /** @test */
    public function testLoginGagalKarenaPasswordSalahUntukEmailValid()
{
    // Buat user dengan password valid
    User::create([
        'email' => 'validuser@gmail.com',
        'name' => 'user',
        'password' => bcrypt('validpass'), // Password yang benar
    ]);

    // Kirim request login dengan password salah (tapi valid secara panjang)
    $response = $this->post('/login', [
        'email' => 'validuser@gmail.com',
        'password' => 'wrongpass', // Salah, tapi panjangnya valid (8-16 karakter)
    ]);

    // Assert pesan error sesuai yang diharapkan
    $response->assertSessionHasErrors(['password' => 'password salah, silahkan coba lagi']);
}


    /** @test */
    public function testValidasi_InputEmail_TidakSesuaiFormat()
    {
        $response = $this->post('/login', [
            'email' => 'invaliduser.com', // Email tidak valid
            'password' => 'validpass',
        ]);

        $response->assertSessionHasErrors(['email' => 'Email tidak valid.']);
    }

    /** @test */
    public function testLoginGagal_KarenaInputEmailDanPassword_Kosong()
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors([
            'email' => 'Email tidak boleh kosong',
            'password' => 'Password tidak boleh kosong',
        ]);
    }

    /** @test */
    public function testLoginDenganEmailYangTidakTerdaftar()
    {
        $response = $this->post('/login', [
            'email' => 'nonexistentuser@gmail.com',
            'password' => 'validpass',
        ]);

        $response->assertSessionHasErrors(['email' => 'Username tidak terdaftar.']);
    }
}
