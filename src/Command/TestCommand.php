<?php

namespace App\Command;

use App\Entity\SoccerMatch;
use App\Entity\SoccerTeam;
use App\Enum\PlayStage;
use App\ValueObject\Winner;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:test',
    description: 'Add a short description for your command',
)]
class TestCommand extends Command
{
    public EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct();

    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $socccerTeam = new SoccerTeam();
        $soccerMatch = new SoccerMatch();

        $socccerTeam->setTeamName("A");
        $socccerTeam->setTeamGroup("e");

        $soccerMatch->setHomeTeam($socccerTeam);
        $soccerMatch->setAwayTeam($socccerTeam);
        $soccerMatch->setPlayStage("R16");
        $soccerMatch->setWinner("draw");
        $soccerMatch->setStartDateTime(new \DateTime());
        $soccerMatch->setEndDateTime(new \DateTime());

        $this->entityManager->persist($socccerTeam);
        $this->entityManager->persist($soccerMatch);

        $this->entityManager->flush();

        $winner = new Winner('draw');

        return Command::SUCCESS;
    }
}
