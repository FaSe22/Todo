<?php

it('should be successful', function () {
    $response = $this->get('/todos');

    $response->assertStatus(200);
});
