<?php

function currentDate(string $dateFormat)
{
    $date = new DateTime();
    return $date->format($dateFormat);
}

