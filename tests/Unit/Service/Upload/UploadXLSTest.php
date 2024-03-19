<?php

namespace App\Tests\Unit\Service\Upload;

use PHPUnit\Framework\TestCase;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Service\Upload\UploadXLS;
use Carbon\Carbon;
use Mockery as m;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadXLSTest extends TestCase
{
    protected ?UploadXLS $uploadXLS;
    protected ?UploadedFile $mockFile;
    protected ?IOFactory $ioFactory;
    protected ?Spreadsheet $spreadsheet;

    protected function setUp(): void
    {
        $this->mockFile = m::mock(UploadedFile::class);
        $this->ioFactory = m::mock('overload:'.IOFactory::class);
        $this->spreadsheet = m::mock(Spreadsheet::class);
        $this->uploadXLS = new UploadXLS();
    }

    protected function tearDown(): void
    {
        m::close();
    }

    public function testUploadReturnsSpreadsheetInstance()
    {
        // Mock UploadedFile
        $this->mockFile
                ->shouldReceive('getClientOriginalName')
                ->andReturn('dummyfile.xls');

        $this->mockFile
                ->shouldReceive('move');

        $this->ioFactory
                ->shouldReceive('load')
                ->andReturn($this->spreadsheet);

        // Call the upload method
        $result = $this->uploadXLS->upload($this->mockFile);

        // Assert that the result is an instance of Spreadsheet
        $this->assertInstanceOf(Spreadsheet::class, $result);

        // Reset Carbon::now() to normal behavior
        Carbon::setTestNow();
    }
}