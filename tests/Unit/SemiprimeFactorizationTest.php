<?php

namespace Tests\Unit;

use Tests\TestCase;

class SemiprimeFactorizationTest extends TestCase
{
    /**
     * @return void
     */
    public function testSemiprimeFactorization()
    {
        $this->assertEquals('2 3', $this->semiprimeFactorization(6));
        $this->assertEquals('3 5', $this->semiprimeFactorization(15));
        $this->assertEquals('5 7', $this->semiprimeFactorization(35));
        $this->assertEquals('7 11', $this->semiprimeFactorization(77));
        $this->assertEquals('3571 7213', $this->semiprimeFactorization(25757623));
        $this->assertEquals('27449 53507', $this->semiprimeFactorization(1468713643));
    }

    /**
     * 指定された数を因数分解し、小さい順に返す
     *
     * @param int $n
     * @return string
     */
    function semiprimeFactorization(int $n): string
    {
        $semiprimes = collect();

        // 与えられた値($n)の平方根を上限として、ループ処理
        for ($a = 2; $a * $a <= $n; $a++) {
            if ($n % $a === 0) {
                $b = $n / $a;
                $semiprimes->push($a, $b);
                break;
            }
        }
        return $semiprimes->sort()->implode(' ');
    }
}
