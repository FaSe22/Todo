<?php

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\QueryException;

it('should throw a query exeption')->expect(fn() => Todo::factory()->create())->throws(QueryException::class);
it('should create a Todo')->expect(fn() => Todo::factory()->forUser()->create())->toBeInstanceOf(Todo::class);