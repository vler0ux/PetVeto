<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:purge-animal-care')]
class PurgeAnimalCareCommand extends Command
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $conn = $this->entityManager->getConnection();
        $conn->executeQuery('SET FOREIGN_KEY_CHECKS=0');
        $conn->executeQuery('TRUNCATE TABLE care');
        $conn->executeQuery('TRUNCATE TABLE animal');
        $conn->executeQuery('SET FOREIGN_KEY_CHECKS=1');

        $output->writeln('<info>Tables care et animal vidées !</info>');

        return Command::SUCCESS;
    }
}
