<?php

it('should be successful', function () {
    $response = $this->get('api/todos');

    $response->assertStatus(200);
});
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
