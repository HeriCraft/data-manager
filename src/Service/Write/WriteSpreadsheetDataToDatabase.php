<?php

namespace App\Service\Write;

use App\Entity\VehiculeInfo;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Polyfill\Intl\Icu\Exception\MethodNotImplementedException;

class WriteSpreadsheetDataToDatabase
{
    public function write(Spreadsheet $spreadsheet, EntityManagerInterface $entityManager, bool $allowDuplicateInsertion = false): bool
    {
        $sheetData = $spreadsheet
            ->getActiveSheet()
            ->removeRow(1) //Supprimer la première colonne (Titre)
            ->toArray(null, true, true, true);
        
        foreach($sheetData as $row)
        {
            $compteAffaire = $row['A'];
            $compteEvenement = $row['B'];
            $compteDernierEvenement = $row['C'];
            $numeroDeFiche = $row['D'];
            $libelleCivilite = $row['E'];
            $proprieteActuelDuVehicule = $row['F'];
            $nom = $row['G'];
            $prenom = $row['H'];
            $numeroEtNomDeLaVoie = $row['I'];
            $complementAdresse1 = $row['J'];
            $codePostal = (int) $row['K'];
            $ville = $row['L'];
            $telephoneDomicile = $row['M'];
            $telephonePortable = $row['N'];
            $telephoneJob = $row['O'];
            $email = $row['P'];
            $dateDeMiseEnCirculation = $row['Q'] == null ? null : \DateTime::createFromFormat('d/m/Y', $row['Q']);
            $dateAchat = $row['R'] == null ? null : \DateTime::createFromFormat('d/m/Y', $row['R']);
            $dateDernierEvenement = $row['S'] == null ? null : \DateTime::createFromFormat('d/m/Y', $row['S']);
            $libelleMarque = $row['T'];
            $libelleModele = $row['U'];
            $version = $row['V'];
            $vin = $row['W'];
            $immatriculation = $row['X'];
            $typeProspect = $row['Y'];
            $kilometrage = $row['Z'];
            $libelleEnergie = $row['AA'];
            $vendeurVN = $row['AB'];
            $vendeurVO = $row['AC'];
            $commentaireFacturation = $row['AD'];
            $typeVNVO = $row['AE'];
            $numeroDeDossierVNVO = $row['AF'];
            $intermediaireDeVenteVN = $row['AG'];
            $dateEvenement = $row['AH'] == null ? null : \DateTime::createFromFormat('d/m/Y', $row['AH']);
            $origineEvenement = $row['AI'];

            /** 
             * Détecter s'il y a des doublons, on passe, par contre si le paramètre $allowDuplicateInsertion est à true,
             * il ne passe pas par cette vérification
             */
            if(!$allowDuplicateInsertion && $entityManager->getRepository(VehiculeInfo::class)->findOneBy([
                "compteAffaire" => $compteAffaire,
                "compteEvenement" => $compteEvenement,
                "compteDernierEvenement" =>$compteDernierEvenement,
                "numeroDeFiche" => $numeroDeFiche,
                "libelleCivilite" => $libelleCivilite,
                "proprietaireActuel" => $proprieteActuelDuVehicule,
                "nom" => $nom,
                "prenom" => $prenom,
                "numeroEtNomDeLaVoie" => $numeroEtNomDeLaVoie,
                "complementAdresse1" => $complementAdresse1,
                "codePostal" => $codePostal,
                "ville" => $ville,
                "telephoneDomicile" => $telephoneDomicile,
                "telephonePortable" => $telephonePortable,
                "telephoneJob" => $telephoneJob,
                "email" => $email,
                "dateDeMiseEnCirculation" => $dateDeMiseEnCirculation,
                "dateAchat" => $dateAchat,
                "dateDernierEvenement" => $dateDernierEvenement,
                "libelleMarque" => $libelleMarque,
                "libelleModele" => $libelleModele,
                "version" => $version,
                "vin" => $vin,
                "immatriculation" => $immatriculation,
                "typeDeProspect" => $typeProspect,
                "kilometrage" => $kilometrage,
                "libelleEnergie" => $libelleEnergie,
                "vendeurVN" => $vendeurVN,
                "vendeurVO" => $vendeurVO,
                "commentaireDeFacturation" => $commentaireFacturation,
                "typeVNVO" => $typeVNVO,
                "numeroDeDossierVNVO" => $numeroDeDossierVNVO,
                "intermediaireVenteVN" => $intermediaireDeVenteVN,
                "dateEvenement" => $dateEvenement,
                "origineEvenement" => $origineEvenement
            ])){
                continue;
            }
            
            $vehiculeInfo = new VehiculeInfo();
            $vehiculeInfo->setCodePostal($codePostal)
                ->setCommentaireDeFacturation($commentaireFacturation)
                ->setComplementAdresse1($complementAdresse1)
                ->setCompteAffaire($compteAffaire)
                ->setCompteDernierEvenement($compteDernierEvenement)
                ->setCompteEvenement($compteEvenement)
                ->setDateAchat($dateAchat)
                ->setDateDeMiseEnCirculation($dateDeMiseEnCirculation)
                ->setDateDernierEvenement($dateDernierEvenement)
                ->setDateEvenement($dateEvenement)
                ->setEmail($email)
                ->setImmatriculation($immatriculation)
                ->setIntermediaireVenteVN($intermediaireDeVenteVN)
                ->setKilometrage($kilometrage)
                ->setLibelleCivilite($libelleCivilite)
                ->setLibelleEnergie($libelleEnergie)
                ->setLibelleMarque($libelleMarque)
                ->setLibelleModele($libelleModele)
                ->setNom($nom)
                ->setNumeroDeDossierVNVO($numeroDeDossierVNVO)
                ->setNumeroDeFiche($numeroDeFiche)
                ->setNumeroEtNomDeLaVoie($numeroEtNomDeLaVoie)
                ->setOrigineEvenement($origineEvenement)
                ->setPrenom($prenom)
                ->setProprietaireActuel($proprieteActuelDuVehicule)
                ->setTelephoneDomicile($telephoneDomicile)
                ->setTelephoneJob($telephoneJob)
                ->setTelephonePortable($telephonePortable)
                ->setTypeDeProspect($typeProspect)
                ->setTypeVNVO($typeVNVO)
                ->setVendeurVN($vendeurVN)
                ->setVendeurVO($vendeurVO)
                ->setVersion($version)
                ->setVille($ville)
                ->setVin($vin)
            ;

            $entityManager->persist($vehiculeInfo);
            $entityManager->flush();
        }
        
        return true;
    }
}