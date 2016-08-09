Feature: game
  In order to play a game-of-life-game
  As a user
  I need to be able to start a game

  Scenario: start a default game
    Given I am in the root directory
    And and there is a Makefile
    When I run "make run"
    Then I should get:
    """
    a valid grid
    """
