# Snap Card Game
> Game Rules
 
This is a two player game. 
Each player is dealt with the same number of cards from a shuffled deck at the start of the game. 
Each player takes it in turn to place their next card on a pile between them.
If the two top cards on the pile match in value (eg A=A) the last player to place a card takes all the cards in the pile.
The game continues until one player is out of cards.
 
### Prerequisites
```
  Make sure to use a version of php >= 7.3.9 (php -v).
  Make sure you have composer installed. 
```

### How to use
 - Download (as zip) and extract or git clone the project under your web server's root directory.
 
 - Install dependencies with `Composer` first:
   ```bash
   $ composer install
   ```
 - To run the tests use `phpunit`:   
   ```bash
   $ ./vendor/bin/phpunit --testdox tests
   ```
 - To run to application use `php`: 
    ```bash   
    $ php index.php
    ```  
 If `php` command not working in your terminal/command line, then you might need to add it to your environment Path.