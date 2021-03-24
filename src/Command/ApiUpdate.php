<?php


namespace App\Command;

use App\Controller\BinController;
use App\Repository\BinRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ApiUpdate extends Command
{

    private $entityManager;
    private $BinRepository;

    public function __construct(EntityManagerInterface $entityManager, BinRepository $BinRepository)
    {
        $this->entityManager = $entityManager;
        $this->BinRepository = $BinRepository;

        parent::__construct();
    }

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:ApiUpdate';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Mise à jour des bennes')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('Cette commande permet mettre à jour la BDD')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $get = new BinController();

        $output->writeln([
            'Updating',
            '============',
            '',
        ]);

        $i = $get->update($this->entityManager, $this->BinRepository);

        $output->writeln('Whoa ! ' . $i);

        // this method must return an integer number with the "exit status code"
        // of the command.

        // return this if there was no problem running the command
        return 0;

        // or return this if some error happened during the execution
        // return 1;
    }
}