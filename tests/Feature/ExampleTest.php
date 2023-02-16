<?php

test('has a home page', function () {
    $this->get('/')->assertOk();
});
