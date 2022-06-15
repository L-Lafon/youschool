<?php

namespace App\Service;

use App\Entity\Source;
use Doctrine\Persistence\ManagerRegistry;

class SourceService

{
    public function __construct(private ManagerRegistry $doctrine)
    {
    }

    public function createSource($data)
    {
        $nom = $data['nom'];

        $source = new Source($nom);

        $this->doctrine->getManager()->persist($source);
        $this->doctrine->getManager()->flush();

    }


}
