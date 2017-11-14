<?php

namespace Stevebauman\WinPerm;

use Stevebauman\WinPerm\Exceptions\InvalidPathException;

class Scanner
{
    /**
     * The path to check.
     *
     * @var string
     */
    protected $path;

    /**
     * Constructor.
     *
     * @param string $path The path to check permissions on.
     *
     * @throws InvalidPathException
     */
    public function __construct($path = null)
    {
        if (!is_null($path)) {
            $this->setPath($path);
        }
    }

    /**
     * Sets the path to check permissions on.
     *
     * @param string $path
     *
     * @throws InvalidPathException
     */
    public function setPath($path)
    {
        if (file_exists($path)) {
            $this->path = $path;
        } else {
            throw new InvalidPathException('File or Folder does not exist.');
        }
    }

    /**
     * Returns an array of accounts with their permissions on the current directory.
     *
     * Returns false on failure.
     *
     * @return array|bool
     */
    public function getAccounts()
    {
        if ($output = $this->execute('icacls', $this->path)) {
            // The first element will always include the path, we'll
            // remove it before passing the output to the parser.
            $output[0] = str_replace($this->path, '', $output[0]);

            // The last element will always contain the success / failure message.
            array_pop($output);

            // We'll also remove blank lines from the output array.
            $output = array_filter($output);

            // Finally, we'll pass the output to the parser.
            return $this->newParser($output)->parse();
        }

        return false;
    }

    /**
     * Returns the current paths unique ID.
     *
     * @return string|null
     */
    public function getId()
    {
        if ($output = $this->execute('fsutil file queryfileid', $this->path)) {
                if ((bool) preg_match('/(\d{1}[x].*)/', $output[0], $matches)) {
                return $matches[0];
            }
        }
    }

    /**
     * @param string $command
     * @param string $path
     *
     * @return array|null
     */
    protected function execute($command, $path)
    {
        $command = sprintf('%s "%s"', $command, $path);

        exec($command, $output, $return);

        if ($return === 0 && is_array($output)) {
            return $output;
        }
    }

    /**
     * Returns a new parser instance.
     *
     * @param array $output
     *
     * @return Parser
     */
    protected function newParser(array $output = [])
    {
        return new Parser($output);
    }
}
