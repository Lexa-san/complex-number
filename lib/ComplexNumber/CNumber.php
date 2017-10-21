<?php
namespace Lexasan\ComplexNumber;

/**
 * Class CNumber
 *
 * @package Lexasan\ComplexNumber
 */
class CNumber
{

    protected $_real;
    protected $_imag;

    public function __construct($real = 0, $imag = 0)
    {
        $this
            ->setReal($real)
            ->setImag($imag);
    }

    public function __toString()
    {
        if ($this->isZero()) {
            return (string)0;
        } elseif (0 == $this->_real) {
            return (string)(in_array($this->_imag, [-1,1]) ? '' : $this->_imag) . 'i';
        } elseif (0 == $this->_imag) {
            return (string)$this->_real;
        }

        $arr = [
            $this->_real,
            (in_array($this->_imag, [-1,1]) ? '' : abs($this->_imag)) . 'i'
        ];
        $sep = ($this->_imag > 0) ? ' + ' : ' - ';

        return implode($sep, $arr);
    }

    /**
     * Check real=0 and imag=0.
     *
     * @return bool
     */
    public function isZero()
    {
        if (0 == $this->_real && 0 == $this->_imag) {
            return true;
        }
        return false;
    }

    /**
     * @return float
     */
    public function getReal()
    {
        return (float)$this->_real;
    }

    /**
     * @param float $real
     * @return $this
     */
    public function setReal($real)
    {
        $this->_real = (float)$real;
        return $this;
    }

    /**
     * @return float
     */
    public function getImag()
    {
        return (float)$this->_imag;
    }

    /**
     * @param float $imag
     * @return $this
     */
    public function setImag($imag)
    {
        $this->_imag = (float)$imag;
        return $this;
    }

}