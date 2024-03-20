<?php

namespace App\Entity;

use App\Repository\VehiculeInfoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeInfoRepository::class)]
class VehiculeInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $compteAffaire = null;

    #[ORM\Column(length: 11, nullable: true)]
    private ?string $compteEvenement = null;

    #[ORM\Column(length: 11, nullable: true)]
    private ?string $compteDernierEvenement = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroDeFiche = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $libelleCivilite = null;

    #[ORM\Column(length: 70, nullable: true)]
    private ?string $proprietaireActuel = null;

    #[ORM\Column(length: 70, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 70, nullable: true)]
    private ?string $numeroEtNomDeLaVoie = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $complementAdresse1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $codePostal = null;

    #[ORM\Column(length: 70, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $telephoneDomicile = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $telephonePortable = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $telephoneJob = null;

    #[ORM\Column(length: 70, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDeMiseEnCirculation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateAchat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDernierEvenement = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $libelleMarque = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $libelleModele = null;

    #[ORM\Column(length: 70, nullable: true)]
    private ?string $version = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $vin = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $typeDeProspect = null;

    #[ORM\Column(nullable: true)]
    private ?int $kilometrage = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $libelleEnergie = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $vendeurVN = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $vendeurVO = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaireDeFacturation = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $typeVNVO = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $numeroDeDossierVNVO = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $intermediaireVenteVN = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateEvenement = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $origineEvenement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteAffaire(): ?string
    {
        return $this->compteAffaire;
    }

    public function setCompteAffaire(string $compteAffaire): static
    {
        $this->compteAffaire = $compteAffaire;

        return $this;
    }

    public function getCompteEvenement(): ?string
    {
        return $this->compteEvenement;
    }

    public function setCompteEvenement(?string $compteEvenement): static
    {
        $this->compteEvenement = $compteEvenement;

        return $this;
    }

    public function getCompteDernierEvenement(): ?string
    {
        return $this->compteDernierEvenement;
    }

    public function setCompteDernierEvenement(?string $compteDernierEvenement): static
    {
        $this->compteDernierEvenement = $compteDernierEvenement;

        return $this;
    }

    public function getNumeroDeFiche(): ?int
    {
        return $this->numeroDeFiche;
    }

    public function setNumeroDeFiche(?int $numeroDeFiche): static
    {
        $this->numeroDeFiche = $numeroDeFiche;

        return $this;
    }

    public function getLibelleCivilite(): ?string
    {
        return $this->libelleCivilite;
    }

    public function setLibelleCivilite(?string $libelleCivilite): static
    {
        $this->libelleCivilite = $libelleCivilite;

        return $this;
    }

    public function getProprietaireActuel(): ?string
    {
        return $this->proprietaireActuel;
    }

    public function setProprietaireActuel(?string $proprietaireActuel): static
    {
        $this->proprietaireActuel = $proprietaireActuel;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumeroEtNomDeLaVoie(): ?string
    {
        return $this->numeroEtNomDeLaVoie;
    }

    public function setNumeroEtNomDeLaVoie(?string $numeroEtNomDeLaVoie): static
    {
        $this->numeroEtNomDeLaVoie = $numeroEtNomDeLaVoie;

        return $this;
    }

    public function getComplementAdresse1(): ?string
    {
        return $this->complementAdresse1;
    }

    public function setComplementAdresse1(?string $complementAdresse1): static
    {
        $this->complementAdresse1 = $complementAdresse1;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(?int $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephoneDomicile(): ?string
    {
        return $this->telephoneDomicile;
    }

    public function setTelephoneDomicile(?string $telephoneDomicile): static
    {
        $this->telephoneDomicile = $telephoneDomicile;

        return $this;
    }

    public function getTelephonePortable(): ?string
    {
        return $this->telephonePortable;
    }

    public function setTelephonePortable(?string $telephonePortable): static
    {
        $this->telephonePortable = $telephonePortable;

        return $this;
    }

    public function getTelephoneJob(): ?string
    {
        return $this->telephoneJob;
    }

    public function setTelephoneJob(?string $telephoneJob): static
    {
        $this->telephoneJob = $telephoneJob;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDateDeMiseEnCirculation(): ?\DateTimeInterface
    {
        return $this->dateDeMiseEnCirculation;
    }

    public function setDateDeMiseEnCirculation(?\DateTimeInterface $dateDeMiseEnCirculation): static
    {
        $this->dateDeMiseEnCirculation = $dateDeMiseEnCirculation;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(?\DateTimeInterface $dateAchat): static
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getDateDernierEvenement(): ?\DateTimeInterface
    {
        return $this->dateDernierEvenement;
    }

    public function setDateDernierEvenement(?\DateTimeInterface $dateDernierEvenement): static
    {
        $this->dateDernierEvenement = $dateDernierEvenement;

        return $this;
    }

    public function getLibelleMarque(): ?string
    {
        return $this->libelleMarque;
    }

    public function setLibelleMarque(?string $libelleMarque): static
    {
        $this->libelleMarque = $libelleMarque;

        return $this;
    }

    public function getLibelleModele(): ?string
    {
        return $this->libelleModele;
    }

    public function setLibelleModele(?string $libelleModele): static
    {
        $this->libelleModele = $libelleModele;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(?string $vin): static
    {
        $this->vin = $vin;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): static
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getTypeDeProspect(): ?string
    {
        return $this->typeDeProspect;
    }

    public function setTypeDeProspect(?string $typeDeProspect): static
    {
        $this->typeDeProspect = $typeDeProspect;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(?int $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getLibelleEnergie(): ?string
    {
        return $this->libelleEnergie;
    }

    public function setLibelleEnergie(?string $libelleEnergie): static
    {
        $this->libelleEnergie = $libelleEnergie;

        return $this;
    }

    public function getVendeurVN(): ?string
    {
        return $this->vendeurVN;
    }

    public function setVendeurVN(?string $vendeurVN): static
    {
        $this->vendeurVN = $vendeurVN;

        return $this;
    }

    public function getVendeurVO(): ?string
    {
        return $this->vendeurVO;
    }

    public function setVendeurVO(?string $vendeurVO): static
    {
        $this->vendeurVO = $vendeurVO;

        return $this;
    }

    public function getCommentaireDeFacturation(): ?string
    {
        return $this->commentaireDeFacturation;
    }

    public function setCommentaireDeFacturation(?string $commentaireDeFacturation): static
    {
        $this->commentaireDeFacturation = $commentaireDeFacturation;

        return $this;
    }

    public function getTypeVNVO(): ?string
    {
        return $this->typeVNVO;
    }

    public function setTypeVNVO(?string $typeVNVO): static
    {
        $this->typeVNVO = $typeVNVO;

        return $this;
    }

    public function getNumeroDeDossierVNVO(): ?string
    {
        return $this->numeroDeDossierVNVO;
    }

    public function setNumeroDeDossierVNVO(?string $numeroDeDossierVNVO): static
    {
        $this->numeroDeDossierVNVO = $numeroDeDossierVNVO;

        return $this;
    }

    public function getIntermediaireVenteVN(): ?string
    {
        return $this->intermediaireVenteVN;
    }

    public function setIntermediaireVenteVN(?string $intermediaireVenteVN): static
    {
        $this->intermediaireVenteVN = $intermediaireVenteVN;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(?\DateTimeInterface $dateEvenement): static
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getOrigineEvenement(): ?string
    {
        return $this->origineEvenement;
    }

    public function setOrigineEvenement(?string $origineEvenement): static
    {
        $this->origineEvenement = $origineEvenement;

        return $this;
    }
}
