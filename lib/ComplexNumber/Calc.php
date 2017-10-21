<?php
namespace Lexasan\ComplexNumber;

/**
 * Class Calc
 *
 * @package Lexasan\ComplexNumber
 */
class Calc
{

    /**
     * Addition.
     *
     * @param CNumber $z1
     * @param CNumber $z2
     *
     * @return CNumber
     */
    public static function add(CNumber $z1, CNumber $z2)
    {
        $newReal = $z2->getReal() + $z1->getReal();
        $newImag = $z1->getImag() + $z2->getImag();

        return new CNumber($newReal, $newImag);
    }

    /**
     * Subtraction.
     *
     * @param CNumber $z1
     * @param CNumber $z2
     *
     * @return CNumber
     */
    public static function sub(CNumber $z1, CNumber $z2)
    {
        $newReal = $z1->getReal() - $z2->getReal();
        $newImag = $z1->getImag() - $z2->getImag();

        return new CNumber($newReal, $newImag);
    }

    /**
     * Multiplication
     * z1 * z2 = (a + bi)(c + di) = (ac - bd) + (bc + ad)i
     *
     * @param CNumber $z1
     * @param CNumber $z2
     *
     * @return CNumber
     */
    public static function mul(CNumber $z1, CNumber $z2)
    {
        if ($z1->isZero() || $z2->isZero()) {
            return new CNumber(0, 0);
        }

        $a = $z1->getReal();
        $b = $z1->getImag();
        $c = $z2->getReal();
        $d = $z2->getImag();
        $newReal = $a * $c - $b * $d;
        $newImag = $b * $c + $a * $d;

        return new CNumber($newReal, $newImag);
    }

    /**
     * Division.
     * z1 / z2 = (a + bi)/(c + di) = (ac + bd)/(c^2 + d^2) + (bc - ad)i/(c^2 + d^2)
     *
     * @param CNumber $z1
     * @param CNumber $z2
     *
     * @return CNumber
     */
    public static function div(CNumber $z1, CNumber $z2)
    {
        if ($z1->isZero()) {
            return new CNumber(0, 0);
        }

        if ($z2->isZero()) {
            throw new \UnexpectedValueException();
        }

        $a = $z1->getReal();
        $b = $z1->getImag();
        $c = $z2->getReal();
        $d = $z2->getImag();

        $denominator = $c * $c + $d * $d;
        $newReal = ($a * $c + $b * $d) / $denominator;
        $newImag = ($b * $c - $a * $d) / $denominator;

        return new CNumber($newReal, $newImag);
    }


}