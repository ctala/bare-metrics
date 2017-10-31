<?php

/*
 * The MIT License
 *
 * Copyright 2017 ctala.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace ctala\Baremetrics;

/**
 * Description of BareError
 *
 * @author ctala
 */
class BareError extends \Exception {

    var $url;
    var $salto;
    /* @var $curl \Curl\Curl */
    var $curl;

    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null, $curl = null) {
        parent::__construct($message, $code, $previous);
        $this->curl = $curl;
        $this->url = $curl->getEndpoint();
        
        $isCLI = ( php_sapi_name() == 'cli' );
        if ($isCLI) {
            $this->salto = "\n";
        } else {
            $this->salto = "<br>";
        }
    }

    function errorMessage() {

        $errorMsg = "Error " . $this->getCode();
        $errorMsg .= " connecting to $this->url.".$this->salto;
        $errorMsg .= "\t" . $this->getMessage() . $this->salto;
//        $errorMsg .= print_r($this->curl,true);

        return $errorMsg;
    }

}
