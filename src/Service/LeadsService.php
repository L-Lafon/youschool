<?php

namespace App\Service;

use App\Entity\Leads;
use Doctrine\Persistence\ManagerRegistry;

class LeadsService

{
    public function __construct(private ManagerRegistry $doctrine)
    {
    }

    public function createLeads($data)
    {
        $nom = $data[2] ?? null;
        $prenom = $data[3] ?? null;
        $email = $data[4] ?? null;
        $numero = $data[5] ?? null;
        $date_reception = $data[1] ?? null;
        $source = $data[6] ?? null;

        if (!$nom || !$prenom || !$email || !$numero || !$date_reception || !$source)
        {
            return ["error" => "Donnée manquante"];
        }

        $leads = new Leads($nom,$prenom,$email,$numero,$date_reception,$source);

        $this->doctrine->getManager()->persist($leads);
        $this->doctrine->getManager()->flush();


    }


}