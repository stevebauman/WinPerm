<?php

namespace Stevebauman\WinPerm;

use Stevebauman\WinPerm\Exceptions\FileNotFoundException;

class Permission
{
    /**
     * The command to use to check for permissions.
     *
     * @var string
     */
    protected $command = 'icacls';

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
     * @throws FileNotFoundException
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
     * @throws FileNotFoundException
     */
    public function setPath($path)
    {
        // We'll validate that the path actually exists before we set it.
        if (file_exists($path)) {
            $this->path = $path;
        } else {
            throw new FileNotFoundException('File or Folder does not exist.');
        }
    }

    /**
     * Executes and processes account permissions for the current path.
     *
     * @return array|bool
     */
    public function check()
    {
        $command = sprintf('%s "%s"', $this->command, addslashes($this->path));

        exec($command, $output, $return);

        if ($return === 0 && is_array($output)) {
            // The first element will always include the path, we'll
            // remove it before passing the output to the parser.
            $output[0] = str_replace($this->path, '', $output[0]);

            // The last element will always contain the success / failure message.
            array_pop($output);

            // We'll also remove blank lines from the output array.
            $output = array_filter($output);

            // Finally, we'll pass the output to the parser.
            return (new Parser($output))->parse();
        }

        return false;
    }
}
