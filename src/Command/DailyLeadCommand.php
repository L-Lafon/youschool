<?php

namespace App\Command;

use App\Service\LeadsService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


#[AsCommand(
    name: 'youschool:daily-lead',
    description: 'Permet de stocker en base de données tous les leads reçu de la veille et d’alimenter un compteur de leads par jour et par source.',
    hidden: false
)]
class DailyLeadCommand extends Command
{
    public function __construct(private ManagerRegistry $doctrine, LeadsService $leadsService)
    {
        parent::__construct();
        $this->leadsService = $leadsService;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $today = new \DateTime('now', new \DateTimeZone('Europe/Paris'));

        $datasImport = [];
        $row = 1;
        if (($handle = fopen("test_ys_import.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                /*$num = count($data);
                $output->writeln("$num fields in line $row: ");
                for ($c=0; $c < $num; $c++) {
                    $output->writeln( $data[$c]);
                }*/
                if ($row !== 1) {
                    $datasImport[] = $data;
                    $this->leadsService->createLeads($data);
                }
                $row++;
            }
            $output->writeln( $datasImport);
            fclose($handle);
        }


        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // return Command::INVALID
    }
}
