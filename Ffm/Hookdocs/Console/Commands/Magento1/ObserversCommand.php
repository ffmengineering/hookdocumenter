<?php

namespace Ffm\Hookdocs\Console\Commands\Magento1;

use Ffm\Hookdocs\Display\TableInterface;
use Ffm\Hookdocs\FileHandler;
use Ffm\Hookdocs\Linktypes\None;
use Ffm\Hookdocs\Magento1\EventType;
use Ffm\Hookdocs\PhpFilterIterator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ObserversCommand extends Command
{
    protected function configure()
    {
        $this->setName('magento1:observers')
            ->setDescription('Read observer documentation')
            ->setHelp('Reads doc comments to get observer documentation');

        $this->addArgument('path', InputArgument::REQUIRED, 'path to files to test');
        $this->addArgument('linkType', InputArgument::REQUIRED, 'type of link');
        $this->addArgument('linkProject', InputArgument::REQUIRED, 'slug in url for project. Usually something like `owner/project-name`');
        $this->addArgument('linkBranch', InputArgument::REQUIRED, 'branch used for the link. Usually something like `develop` or `master`');
        $this->addArgument('output', InputArgument::REQUIRED, 'Type of output (Markdown, Html)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = DOCUMENTER_PROJECT_ROOT_DIR . $input->getArgument('path');
        $link = $input->getArgument('linkType');
        $project = $input->getArgument('linkProject');
        $branch = $input->getArgument('linkBranch');
        $outputType = $input->getArgument('output');

        $linkType = "\Ffm\Hookdocs\Linktypes\\" . ucfirst((string)$link);
        $linkClass = class_exists($linkType, true) ? new $linkType($project, $branch) : new None($project, $branch) ;

        $records = [];
        if (is_file($path)) {
            $file = new FileHandler(new \SplFileObject($path), EventType::class, $linkClass);
            $records = $file->getDocComments();
        } elseif (is_dir($path)) {
            $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
            $Regex = new \RegexIterator($iterator, '/^.+\.php$/i', \RecursiveRegexIterator::GET_MATCH);
            foreach ($Regex as $fileInfo) {
                $fileInfo = new \SplFileObject($fileInfo[0]);

                $file = new FileHandler($fileInfo, EventType::class, $linkClass);
                $records = array_merge($records, $file->getDocComments());
            }
        } else {
            throw new InvalidArgumentException('Path not readable');
        }

        $outputClass = "\Ffm\Hookdocs\Display\\" . ucfirst((string)$outputType);
        /** @var TableInterface $outputInstance */
        $outputInstance = new $outputClass(EventType::HEADER_NAMES, $records);

        $output->write($outputInstance->getHeader().$outputInstance->getBody().$outputInstance->getFooter());
    }
}