<?php

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\QueryException;

function createTodo(array $args = null){
   return  Todo::factory()->forUser()->create($args);
}

function makeTodo(array $args = null){
    return  Todo::factory()->forUser()->make($args);
 }

it('should throw a query exeption')->expect(fn() =>Todo::factory()->create())->throws(QueryException::class);
it('should create an entry in todos table')->defer(fn() => createTodo() )->assertDatabaseCount('todos', 1);
it('should write the title in todos table')->defer(fn() => createTodo(['title' => '__TITLE__']))->assertDatabaseHas('todos', ['title' =>'__TITLE__']);
it('should write the description in todos table')->defer(fn() => createTodo(['description' => '__DESCRIPTION__']))->assertDatabaseHas('todos', ['description' =>'__DESCRIPTION__']);
it('should write LOW as default priority')->defer(fn() => createTodo(['description' => '__DESCRIPTION__']))->assertDatabaseHas('todos', ['priority' =>'LOW']);
it('should write TODO as default status')->defer(fn() => createTodo(['description' => '__DESCRIPTION__']))->assertDatabaseHas('todos', ['status' =>'TODO']);

it('should return an instance of todo')->expect(fn() => makeTodo())->toBeInstanceOf(Todo::class);
it('should return an instance of a user')->expect(fn() => makeTodo()->user)->toBeInstanceOf(User::class);
it('should return the title')->expect(fn()=> makeTodo(['title' => '__TITLE__'])->title)->toBe('__TITLE__');
it('should return the description')->expect(fn()=>makeTodo(['description' => '__DESCRIPTION__'])->description)->toBe('__DESCRIPTION__');
it('should be a string')->expect(fn($property)=> makeTodo()->$property)->toBeString()->with(["title", "description"]);
