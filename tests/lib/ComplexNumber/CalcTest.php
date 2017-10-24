<?php
namespace tests\lib\ComplexNumber;

use \PHPUnit\Framework\TestCase;
use Lexasan\ComplexNumber\CNumber;
use Lexasan\ComplexNumber\Calc;

/**
 * Class CalcTest
 *
 * @package tests\lib\ComplexNumber
 * @covers  Calc
 */
final class CalcTest extends TestCase
{

    /**
     * @covers       Calc::add
     * @dataProvider addProvider
     */
    public function testAdd($z1, $z2, $expected)
    {
        $res = Calc::add($z1, $z2);
        $this->assertEquals($expected, $res);
    }

    /**
     * [z1, z2, expected]
     *
     * @return array
     */
    public function addProvider()
    {
        return [
            [new CNumber(), new CNumber(), new CNumber()],
            [new CNumber(0, 1), new CNumber(1, 0), new CNumber(1, 1)],
            [new CNumber(5, 2), new CNumber(2, -5), new CNumber(7, -3)],
            [new CNumber(1, 3), new CNumber(4, -5), new CNumber(5, -2)],
        ];
    }

    /**
     * @covers       Calc::sub
     * @dataProvider subProvider
     */
    public function testSub($z1, $z2, $expected)
    {
        $res = Calc::sub($z1, $z2);
        $this->assertEquals($expected, $res);
    }

    /**
     * [z1, z2, expected]
     *
     * @return array
     */
    public function subProvider()
    {
        return [
            [new CNumber(), new CNumber(), new CNumber()],
            [new CNumber(0, 1), new CNumber(1, 0), new CNumber(-1, 1)],
            [new CNumber(1, 0), new CNumber(0, 1), new CNumber(1, -1)],
            [new CNumber(5, 2), new CNumber(2, -5), new CNumber(3, 7)],
        ];
    }

    /**
     * @covers       Calc::mul
     * @dataProvider mulProvider
     */
    public function testMul($z1, $z2, $expected)
    {
        $res = Calc::mul($z1, $z2);
        $this->assertEquals($expected, $res);
    }

    /**
     * [z1, z2, expected]
     *
     * @return array
     */
    public function mulProvider()
    {
        return [
            [new CNumber(), new CNumber(), new CNumber()],
            [new CNumber(1, 1), new CNumber(), new CNumber()],
            [new CNumber(), new CNumber(1, 1), new CNumber()],
            [new CNumber(1, 0), new CNumber(0, 1), new CNumber(0, 1)],
            [new CNumber(5, 2), new CNumber(2, -5), new CNumber(20, -21)],
        ];
    }

    /**
     * @covers Calc::div
     */
    public function testDivByZero()
    {
        $z1 = new CNumber(1, 1);
        $z2 = new CNumber(0);
        $this->expectException(\UnexpectedValueException::class);
        Calc::div($z1, $z2);
    }

    /**
     * @covers       Calc::div
     * @dataProvider divProvider
     */
    public function testDiv($z1, $z2, $expected)
    {
        $res = Calc::div($z1, $z2);
        $this->assertEquals($expected, $res);
    }

    /**
     * [z1, z2, expected]
     *
     * @return array
     */
    public function divProvider()
    {
        return [
            '0 / (1 + i)'         => [(new CNumber()), (new CNumber(1, 1)), (new CNumber())],
            '1 / i'               => [new CNumber(1, 0), new CNumber(0, 1), new CNumber(0, -1)],
            '(5 + 2i) / (2 - 5i)' => [new CNumber(5, 2), new CNumber(2, -5), new CNumber(0, 1)],
        ];
    }

}
