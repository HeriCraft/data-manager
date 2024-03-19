<?php

namespace App\Service\Upload;

use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadXLS
{
    public function upload(UploadedFile $file): Spreadsheet
    {
        $uploadedFileFolder = __DIR__.'/../../../public/uploads/';

        $filePathName =  Carbon::now(). $file->getClientOriginalName();

        $file->move($uploadedFileFolder, $filePathName);

        return IOFactory::load($uploadedFileFolder . $filePathName);
    }
}