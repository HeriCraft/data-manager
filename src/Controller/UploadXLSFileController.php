<?php

namespace App\Controller;

use App\Service\Upload\UploadXLS;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints\File;

class UploadXLSFileController extends AbstractController
{
    #[Route('/upload/xls', name: 'upload_xls_file', methods: ['GET', 'POST'])]
    public function index(
        Request $request,
        UploadXLS $uploader
    ): Response
    {

        $form = $this->createFormBuilder()
                    ->add(
                        'file', 
                        FileType::class, 
                        [
                            'required' => true,
                            'label' => 'Data (en format XLS ou XLSX)',
                            'constraints' => [
                                new File([
                                    'maxSize' => '1024k',
                                    'mimeTypes' => [
                                        'application/vnd.ms-excel',
                                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                    ],
                                    'mimeTypesMessage' => 'Veuillez sélectionner un fichier Excel valide (XLS ou XLSX)',
                                ])
                            ],
                            'attr' => [
                                'class' => 'form-control'
                            ]
                        ]
                    )
                    ->add(
                        'upload',
                        SubmitType::class,
                        [
                            'attr' => [
                                'class' => 'btn btn-outline-primary'
                            ]
                        ]
                    )
                    ->getForm()

        ;

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //dd($form->getData());
            $spreadsheet = $uploader->upload($form->getData()['file']);

            dd($spreadsheet);
        }

        return $this->render('upload_xls_file/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
