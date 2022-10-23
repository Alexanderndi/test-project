<?php

use PHPUnit\Framework\TestCase;
use Ndifrekeeduo\TestProject\User;

final class UserTest extends TestCase 
{
    public function testClassConstructor()
    {
        $user = new User(18, "Alex");
        
        $this->assertSame("Alex", $user->name);
        $this->assertSame(18, $user->age);
        $this->assertEmpty($user->favorite_movies);
    }

    public function testSayName()
    {
        $user = new User(23, "Jackson");

        $this->assertIsString($user->sayName());
        $this->assertStringContainsStringIgnoringCase("Jackson", $user->sayName());
    }

    public function testSayAge()
    {
        $user = new User(23, "Jackson");

        $this->assertIsString($user->sayAge());
        $this->assertStringContainsStringIgnoringCase("23", $user->sayAge());
    }

    public function testAddFavoriteMovie()
    {
        $user = new User(27, 'Alexander');

        $this->assertTrue($user->addFavoriteMovie('Advengers', $user->favorite_movies));
        $this->assertCount(1, $user->favorite_movies);
    }

    public function testRemoveFavoriteMovie()
    {
        $user = new User(27, 'Alexander');

        $this->assertTrue($user->addFavoriteMovie('Advengers', $user->favorite_movies));
        $this->assertTrue($user->addFavoriteMovie('Strolls Verdict', $user->favorite_movies));

        $this->assertTrue($user->removesFavoriteMovie('Strolls Verdict'));
        $this->assertNotContains('Strolls Verdict', $user->favorite_movies);
        $this->assertCount(1, $user->favorite_movies);
    }
}