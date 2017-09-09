<?php
namespace App\PDFCrowd;
use Exception;

class PdfcrowdException extends Exception {
    // custom string representation of object
    public function __toString() {
        if ($this->code) {
            return "[{$this->code}] {$this->message}\n";
        } else {
            return "{$this->message}\n";
        }
    }
}
