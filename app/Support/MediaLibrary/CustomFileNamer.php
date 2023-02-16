<?php

namespace App\Support\MediaLibrary;

use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\Support\FileNamer\FileNamer;

class CustomFileNamer extends FileNamer
{
    public function originalFileName(string $fileName): string
    {
        return str()->random(10);
    }

    public function conversionFileName(string $fileName, Conversion $conversion): string
    {
        return pathinfo($fileName, PATHINFO_FILENAME).'-'.$conversion->getName();
    }

    public function responsiveFileName(string $fileName): string
    {
        return pathinfo($fileName, PATHINFO_FILENAME);
    }
}
