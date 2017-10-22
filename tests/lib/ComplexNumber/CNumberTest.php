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
class CNumberTest extends TestCase
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
     * Return test params:
     *  - real
     *  - imag
     *  - text view
     *
     * @return array
     */
    public function fullPartProvider()
    {
        return [
            [0, 0, '0'],
            [0, 1, 'i'],
            [1, 0, '1'],
            [5, 2, '5 + 2i'],
            [2, -5, '2 - 5i'],
            [0.125, 1.5, '0.125 + 1.5i'],
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
//        $val = 10;
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
//        $val = 10;
        $z = new CNumber();
        $z->setImag($val);
        $this->assertEquals($val, $z->getImag());
    }

    /**
     * Returns params for test:
     *  - val - any number.
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
