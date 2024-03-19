<?php

namespace App\Service\Upload;

use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class UploadXLS
{
    public function upload(mixed $file): Spreadsheet
    {
        $uploadedFileFolder = __DIR__.'/../../../public/uploads/';

        $filePathName =  Carbon::now(). $file->getClientOriginalName();

        $file->move($uploadedFileFolder, $filePathName);

        return IOFactory::load($uploadedFileFolder . $filePathName);
    }
}