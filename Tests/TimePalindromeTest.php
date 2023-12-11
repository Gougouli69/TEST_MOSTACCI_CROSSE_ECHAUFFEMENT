<?php

namespace App\Tests;

use App\Classes\TimePalindrome;
use PHPUnit\Framework\TestCase;

final class TimePalindromeTest extends TestCase {

    public function testIsAPalindrome(): void
    {
        $timePalindrome = new TimePalindrome();

        $this->assertEquals(true, $timePalindrome->textIsAPalindrome('KayAk'));
        $this->assertEquals(false, $timePalindrome->textIsAPalindrome('Chocolat'));
        $this->assertEquals(false, $timePalindrome->textIsAPalindrome('Bonjour'));
        $this->assertNotEquals(false, $timePalindrome->textIsAPalindrome('Mon nOm'));
    }
}