<?php

namespace App\Controller;

use App\Service\Upload\UploadXLS;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UploadXLSFileController extends AbstractController
{
    #[Route('/upload/xls', name: 'upload_xls_file', methods: ['GET', 'POST'])]
    public function index(
        Request $request,
        UploadXLS $uploader
    ): Response
    {
        if($request->getMethod() == "POST"){
            //dd($request->get('file'));
            $spreadsheet = $uploader->upload($request->files->get('file'));

            dd($spreadsheet);
        }

        return $this->render('upload_xls_file/index.html.twig', [
            'controller_name' => 'UploadXLSFileController',
        ]);
    }
}
