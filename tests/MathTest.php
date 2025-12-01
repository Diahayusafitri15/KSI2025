<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Math.php';

class MathTest extends TestCase
{
    public function testTambah()
    {
        $this->assertEquals(5, Math::tambah(2, 3));
        $this->assertEquals(10, Math::tambah(4, 6));
    }

    public function testPerkalian()
    {
        $this->assertEquals(12, Math::kali(3, 4));
        $this->assertEquals(0, Math::kali(0, 10));
    }
}
