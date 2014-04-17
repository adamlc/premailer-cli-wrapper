<?php namespace Adamlc\Premailer;

use AdamBrett\ShellWrapper\Command\Builder as CommandBuilder;
use AdamBrett\ShellWrapper\Runners\Exec;

/**
 * Command class. This handles the interaction with the CLI
 */
class Command
{
    /**
     * @var AdamBrett\ShellWrapper\Command\Builder
     * @access private
     */
    private $command;

    /**
     * @var AdamBrett\ShellWrapper\Runners\Exec
     * @access private
     */
    private $shell;

    const HTML = 'html';
    const TEXT = 'txt';

    /**
     * @access public
     * @param string $premailerCmd - The path to the premailer binary
     * @return void
     */
    public function __construct($premailerCmd)
    {
        $this->command = new CommandBuilder($premailerCmd);

        $this->shell = new Exec();
    }

    /**
     * Get the output of the body.
     *
     * @access public
     * @param string $type - Either Command::HTML or Command::TEXT
     * @param mixed $body
     * @return void
     */
    public function getOutput($type, $body)
    {
        //Set output type to $type
        $this->command->addArgument(
            'mode',
            $type
        );

        //Create a tmp file for input
        $this->command->addParam(
            $this->getTmpFile($body)
        );

        $this->shell->run($this->command);

        return implode("\n", $this->shell->getOutput());
    }

    /**
     * Get a path to a tmp file with the body of the email.
     *
     * @access private
     * @param string $body
     * @return string - File path
     */
    private function getTmpFile($body)
    {
        $tempFileName = tempnam(sys_get_temp_dir(), 'Premailer');

        file_put_contents($tempFileName, $body);

        return $tempFileName;
    }
}
