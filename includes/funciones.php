<?php
function toURL(string $texto): string{
    $texto = mb_strtolower($texto, 'UTF-8');
    $texto = Normalizer::normalize($texto, Normalizer::FORM_D);
    $texto = preg_replace('/\p{Mn}/u', '', $texto);
    $texto = preg_replace('/\s+/u', '', $texto);
    return $texto;
};
?>