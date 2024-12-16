# Edge of the Empire Dice Roller Online

**I made this app to play Fantasy Flight Game's [Star Wars Edge of the Empire RPG](https://www.fantasyflightgames.com/en/products/star-wars-edge-of-the-empire/) game online. This is a chat that allows you to roll FFG's custom dices and it displays results in a form of a list.**

Most of the logics are parsed by JS. Every dice type expands the Dice class. Rolls and results are send to a DB via AJAX. Next they are requested from DB also via AJAX and presented by jQuery on the page. Two databases are used. One for rolls and results and another for Desiny Points current pool.  
  
JavaScript classes are obvoiusly ES6 feature. I used Babel's online [*Try it out*](https://babeljs.io/repl/) for browsers compatibility. 

## App features
* Click to select dices from the list. You can then subtract them and add comment (i.e. *I attack Jabba the Hutt with my lightsaber!*).  
* Last five results will be printet in the list on the right.  
* You can be logged in as user or as admin. Admin has extra feature to manipulate Destiny Points pool.   
* Every action is confirmed by an alert (green for success, red for error and blue when Destiny Points pool changes).   
   
   
* Dices images and icons are made by [w4malinie](http://w4malinie.tk/). 
 
---
## Picures
   
These are above mentioned FFG's custom Star Wars dices:   
![EotE dices](https://raw.githubusercontent.com/BugBear6/PHP-EotE-Dice-Roller/master/desc/SWDice.jpg)   
   
Standard log in page:   
![Log in page](https://raw.githubusercontent.com/BugBear6/PHP-EotE-Dice-Roller/master/desc/EotE_login.jpg)   
   
Admin view:   
![Admin view](https://raw.githubusercontent.com/BugBear6/PHP-EotE-Dice-Roller/master/desc/EotE_admin.jpg)   
   
User view:   
![User view](https://raw.githubusercontent.com/BugBear6/PHP-EotE-Dice-Roller/master/desc/EotE_user.jpg)   
