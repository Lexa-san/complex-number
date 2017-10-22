<?php
namespace tests\lib\ComplexNumber;

use \PHPUnit\Framework\TestCase;
use Lexasan\ComplexNumber\CNumber;

/**
 * Class CNumberTest
 *
 * @package tests\lib\ComplexNumber
 * @covers CNumber
 */
final class CNumberTest extends TestCase
{

    /**
     * @covers CNumber::__construct()
     * @dataProvider fullPartProvider
     */
    public function testConstruct($real, $imag)
    {
        $z = new CNumber($real, $imag);
        $this->assertEquals($real, $z->getReal());
        $this->assertEquals($imag, $z->getImag());
    }

    /**
     * @covers CNumber::__toString()
     * @dataProvider fullPartProvider
     */
    public function testToString($real, $imag, $text)
    {
        $z = new CNumber($real, $imag);
        $this->assertEquals($text, (string)$z);
    }

    /**
     * [real, imag, expected]
     *
     * @return array
     */
    public function fullPartProvider()
    {
        return [
            [0, 0, '0'],
            [0, 1, 'i'],
            [1, 0, '1'],
            [0, -2, '-2i'],
            [0, -1, '-i'],
            [5, 2, '5 + 2i'],
            [2, -5, '2 - 5i'],
            [0.125, 1.5, '0.125 + 1.5i'],
        ];
    }

    /**
     * @covers CNumber::isZero
     * @dataProvider zeroProvider
     */
    public function testIsZero($real, $imag, $expected)
    {
        $z = new CNumber($real, $imag);
        $this->assertEquals($expected, $z->isZero());
    }

    /**
     * [real, imag, expected]
     *
     * @return array
     */
    public function zeroProvider()
    {
        return [
            [0, 0, true],
            [1, 0, false],
            [0, 1, false],
        ];
    }

    /**
     * @covers CNumber::setReal
     * @dataProvider numberProvider
     *
     * @param float $val
     */
    public function testSetReal($val)
    {
        $z = new CNumber();
        $z->setReal($val);
        $this->assertEquals($val, $z->getReal());
    }

    /**
     * @covers CNumber::setImag
     * @dataProvider numberProvider
     *
     * @param float $val
     */
    public function testSetImag($val)
    {
        $z = new CNumber();
        $z->setImag($val);
        $this->assertEquals($val, $z->getImag());
    }

    /**
     * [number]
     *
     * @return array
     */
    public function numberProvider()
    {
        return [
            [0],
            [1],
            [-2],
            [0.125],
        ];
    }

}
