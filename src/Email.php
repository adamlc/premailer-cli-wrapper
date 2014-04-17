<?php namespace Adamlc\Premailer;

/**
 * Email builder class.
 */
class Email
{
    /**
     * @var Adamlc\Premailer\Command
     * @access private
     */
    private $command;

    /**
     * HTML body of the email
     *
     * @var string
     * @access private
     */
    private $body;

    /**
     * __construct function. You must pass a command object
     *
     * @access public
     * @param Adamlc\Premailer\Command $command
     * @return void
     */
    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    /**
     * Set the HTML body of the email.
     *
     * @access public
     * @param string $html
     * @return void
     */
    public function setBody($html)
    {
        $this->body = $html;
    }

    /**
     * Get the HTML body of the Premailer'd email.
     *
     * @access public
     * @return string
     */
    public function getHtml()
    {
        return $this->command->getOutput(
            Command::HTML,
            $this->body
        );
    }

    /**
     * Get the Text body of the Premailer'd email.
     *
     * @access public
     * @return string
     */
    public function getText()
    {
        return $this->command->getOutput(
            Command::TEXT,
            $this->body
        );
    }
}
