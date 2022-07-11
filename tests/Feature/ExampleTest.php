<?php

test('user can log in', function() {

    $data = [
        'name' => 'Nikola',
        'email' => 'nikola11@nikola.com',
        'password' => 'password'
    ];

    $response = $this->post('/api/auth/register', $data);

    $response->assertStatus(200);
    
});