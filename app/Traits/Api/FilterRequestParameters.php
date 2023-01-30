<?php

namespace App\Traits\Api;

trait FilterRequestParameters{
    protected function filterString($content,$escapeSlashes = false) : string{
        $content = trim($content);
        return $escapeSlashes ? addslashes($content) : $content;
    }

    protected function filterNumber($content, $min = 0,$format = false) : int{
        $content = intval($content);
        $content = max($content,$min);

        return $format ? number_format($content) : $content;
    }

    protected function filterDecimal($content,$min = 0,$decimalPlaces = 1,$format = false) : float{
        $content = floatval($content);

        $content = max($content,0);

        return ($format ? number_format($num,$decimalPlaces) : round($content,$decimalPlaces)) ;
    }
}