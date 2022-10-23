<?php

namespace Ndifrekeeduo\TestProject;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class User
{
    public int $age;
    public array $favorite_movies = [];
    public string $name;

    public function __construct(int $age, string $name)
    {
        $this->age = $age;
        $this->name = $name;
    }

    public function sayName(): string
    {
        return "My name is " . $this->name . ".";
    }
    public function sayAge(): string
    {
        return "I am " . $this->age . " years old.";
    }

    public function addFavoriteMovie(string $movie): bool
    {
        $this->favorite_movies[] = $movie;

        return true;
    }

    public function removesFavoriteMovie(string $movie): bool
    {
        if (!in_array($movie, $this->favorite_movies)) throw new InvalidArgumentException("Unkown movie: " . $this->movie);

        unset($this->favorite_movies[array_search($movie, $this->favorite_movies)]);

        return true;
    }
}