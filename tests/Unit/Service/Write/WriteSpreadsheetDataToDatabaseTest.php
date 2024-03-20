<?php
namespace App\Tests\Unit\Service\Write;

use App\Entity\VehiculeInfo;
use App\Service\Write\WriteSpreadsheetDataToDatabase;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PHPUnit\Framework\TestCase;
use Mockery as m;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WriteSpreadsheetDataToDatabaseTest extends TestCase
{
    private ?WriteSpreadsheetDataToDatabase $writeSpreadsheetDataToDatabase;
    private ?Spreadsheet $spreadsheet;
    private ?EntityManagerInterface $entityManager;
    private ?Worksheet $worksheet;
    private ?EntityRepository $entityRepository;
    private ?VehiculeInfo $vehiculeInfo;

    protected function setUp(): void
    {
        $this->spreadsheet = m::mock(Spreadsheet::class);
        $this->entityManager = m::mock(EntityManagerInterface::class);
        $this->worksheet = m::mock(Worksheet::class);
        $this->entityRepository = m::mock(EntityRepository::class);
        $this->vehiculeInfo = m::mock(VehiculeInfo::class);

        $this->writeSpreadsheetDataToDatabase = new WriteSpreadsheetDataToDatabase();
    }

    public function testWrite(): void
    {
        $this->spreadsheet
            ->shouldReceive('getActiveSheet')
            ->andReturn($this->worksheet)
        ;

        $this->worksheet
            ->shouldReceive('toArray')
            ->andReturn([
                [
                    "A" => "LABOHYMEA",
                    "B" => "GIDAHYCOU",
                    "C" => "GIDAHYCOU",
                    "D" => "7246",
                    "E" => "Mr",
                    "F" => null,
                    "G" => "AZIZA",
                    "H" => "JULIEN",
                    "I" => "1BIS RUE CREUSE",
                    "J" => null,
                    "K" => "77120",
                    "L" => "MAROLLES EN BRIE",
                    "M" => null,
                    "N" => "0624536655",
                    "O" => null,
                    "P" => "JULIEN.AZIZA@ORANGE.FR",
                    "Q" => "9/29/2015",
                    "R" => "9/29/2015",
                    "S" => "4/14/2021",
                    "T" => "HYUNDAI",
                    "U" => "TUCSON",
                    "V" => "1.7 CRDI 115ch Creative 2WD",
                    "W" => "TMAJ3815AGJ009703",
                    "X" => "DW-750-CH",
                    "Y" => "PARTICULIER",
                    "Z" => "139924",
                    "AA" => "DIESEL",
                    "AB" => null,
                    "AC" => null,
                    "AD" => "OPX",
                    "AE" => "VN",
                    "AF" => null,
                    "AG" => null,
                    "AH" => "4/14/2021",
                    "AI" => "Atelier"
                ]
            ])
        ;

        $this->worksheet
            ->shouldReceive('removeRow')
            ->with(1)
            ->andReturn($this->worksheet)
        ;

        $this->entityManager
            ->shouldReceive('getRepository')
            ->with(VehiculeInfo::class)
            ->andReturn($this->entityRepository)
        ;

        $this->entityRepository
            ->shouldReceive('findOneBy')
            ->andReturn(null)
        ;

        $this->entityManager
            ->shouldReceive('persist')
        ;

        $this->entityManager
            ->shouldReceive('flush')
        ;
        
        $this->assertTrue($this->writeSpreadsheetDataToDatabase->write($this->spreadsheet, $this->entityManager));
    }

    public function testWriteWithDuplicateData(): void
    {
        $this->spreadsheet
            ->shouldReceive('getActiveSheet')
            ->andReturn($this->worksheet)
        ;

        $this->worksheet
            ->shouldReceive('toArray')
            ->andReturn([
                [
                    "A" => "LABOHYMEA",
                    "B" => "GIDAHYCOU",
                    "C" => "GIDAHYCOU",
                    "D" => "7246",
                    "E" => "Mr",
                    "F" => null,
                    "G" => "AZIZA",
                    "H" => "JULIEN",
                    "I" => "1BIS RUE CREUSE",
                    "J" => null,
                    "K" => "77120",
                    "L" => "MAROLLES EN BRIE",
                    "M" => null,
                    "N" => "0624536655",
                    "O" => null,
                    "P" => "JULIEN.AZIZA@ORANGE.FR",
                    "Q" => "9/29/2015",
                    "R" => "9/29/2015",
                    "S" => "4/14/2021",
                    "T" => "HYUNDAI",
                    "U" => "TUCSON",
                    "V" => "1.7 CRDI 115ch Creative 2WD",
                    "W" => "TMAJ3815AGJ009703",
                    "X" => "DW-750-CH",
                    "Y" => "PARTICULIER",
                    "Z" => "139924",
                    "AA" => "DIESEL",
                    "AB" => null,
                    "AC" => null,
                    "AD" => "OPX",
                    "AE" => "VN",
                    "AF" => null,
                    "AG" => null,
                    "AH" => "4/14/2021",
                    "AI" => "Atelier"
                ]
            ])
        ;

        $this->worksheet
            ->shouldReceive('removeRow')
            ->with(1)
            ->andReturn($this->worksheet)
        ;

        $this->entityManager
            ->shouldReceive('getRepository')
            ->with(VehiculeInfo::class)
            ->andReturn($this->entityRepository)
        ;

        $this->entityRepository
            ->shouldReceive('findOneBy')
            ->andReturn($this->vehiculeInfo)
        ;

        $this->entityManager
            ->shouldReceive('persist')
        ;

        $this->entityManager
            ->shouldReceive('flush')
        ;
        
        $this->assertTrue($this->writeSpreadsheetDataToDatabase->write($this->spreadsheet, $this->entityManager));
    }
}