<?php

use App\Models\Todo;
use Illuminate\Database\QueryException;

it('throw a query exeption')->expect(fn() => Todo::factory()->forUser()->create())->throws(QueryException::class);
