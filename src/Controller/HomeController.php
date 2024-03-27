<?php

namespace App\Controller;

use App\Entity\VehiculeInfo;
use App\Repository\VehiculeInfoRepository;
use Doctrine\ORM\QueryBuilder;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Omines\DataTablesBundle\Column\NumberColumn;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\DataTableFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        Request $request,
        DataTableFactory $dataTableFactory,
        VehiculeInfoRepository $repository
    ): Response
    {
        $datatable = $dataTableFactory->create()
            ->add('id', NumberColumn::class, [
                'label' => 'ID',
                'render' => function($value) {
                    return sprintf('<a href="/view/%u">%u</a>', $value, $value);
                }
            ])
            ->add('libelleMarque', TextColumn::class, [
                'label' => 'Marque Vehicule'
            ])
            ->add('libelleModele', TextColumn::class, [
                'label' => 'Modèle Vehicule'
            ])
            ->add('version', TextColumn::class, [
                'label' => 'Version'
            ])
            ->add('immatriculation', TextColumn::class, [
                'label' => 'Immatriculation'
            ])
            ->add('nom', TextColumn::class, [
                'label' => 'Nom'
            ])
            ->createAdapter(ORMAdapter::class, [
                'entity' => VehiculeInfo::class,
                'query' => function (QueryBuilder $builder) {
                    $builder
                        ->select('v')
                        ->from(VehiculeInfo::class, 'v')
                    ;
                }
            ])
            ->handleRequest($request)
        ;

        if ($datatable->isCallback()) {
            return $datatable->getResponse();
        }

        return $this->render('home/index.html.twig', [ 'datatable' => $datatable ]);
    }
}
