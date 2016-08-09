<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class CliContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given /^I am in the ([^"]*) directory$/
     *
     */
    public function iAmInTheDirectory($directory)
    {
        if (strtolower($directory) == 'root') {
            $directory = __DIR__;
        }

        if (!file_exists($directory)) {
            mkdir($directory);
        }
        chdir($directory);
    }

    /**
     * @Given and there is a Makefile
     */
    public function andThereIsAMakefile()
    {
        throw new PendingException();
    }

    /**
     * @When I run :arg1
     */
    public function iRun($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get:
     */
    public function iShouldGet(PyStringNode $string)
    {
        throw new PendingException();
    }
}
