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
     * @dataProvider numberProvider
     * @covers CNumber::setReal
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
     * @dataProvider numberProvider
     * @covers CNumber::setImag
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
     * @covers CNumber::__construct()
     */
    public function testConstruct()
    {
        $z = new CNumber(1, 2);
        $this->assertEquals(1, $z->getReal());
        $this->assertEquals(2, $z->getImag());
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
