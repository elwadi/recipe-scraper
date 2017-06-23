<?php

namespace RecipeScraperTests\Commands;

use RecipeScraperTests\UsesTestData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ResultsDeleteCommand extends Command
{
    use UsesTestData;

    protected function configure()
    {
        $this->setName('results:delete')
            ->setDescription('Delete the results file for a given URL')
            ->addArgument('url', InputArgument::REQUIRED, 'The URL to delete');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        $file = $this->getResultsDataFilePathFromUrl($url);

        if (! file_exists($file)) {
            throw new \InvalidArgumentException(sprintf(
                'Results file [%s] for provided URL [%s] does not exist',
                $file,
                $url
            ));
        }

        // @todo Some sort of feedback? Also delete parent dir if empty?
        unlink($file);
    }
}
