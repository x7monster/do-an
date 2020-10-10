<?php

if (!function_exists('checkSale')) {
    function checkSale($product)
    {
        return $product->sale;
    }
}

if (!function_exists('calcPrice')) {
    function calcPrice($price, $sale)
    {
        return number_format($price * ((100 - $sale) / 100 ));
    }
}