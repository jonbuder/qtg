# qtg
Query Table Generator
Hello world, and welcome to the readme for the Query Table Generator!


***What does it do?***
	It helps you semi-automate creating a php script that will connect to a MySQL databse using MySQLi, run a SELECT statement on specified fields, and iterate that data into an HTML table ripe for formatting and customization.

***Why does it exist?***
	This is a tool I thought of because I think the syntax for writing HTML code inside of PHP code in order to display a table filled with the results of a MySQL query is kind of a pain in the neck. 
	It took about 9 hours to create but I also gained familiarity with PHP.

***How do you use it?***
	You enter, at a minimum, a table name and at least one column in the web form and click Generate. You can fill in the variables for the database connection later if you want, since you'll be copying and pasting the PHP code anyway.

***What does it consist of?***
	The tool has only two required parts - index.html and generate.php.

	Index.html contains the form and all the text and styling. It uses a Google Fonts linked stylesheet, but can be used offline with the nearest equivelant machine font.

	Generate.php contains the code to display php code from the inputs of the form.

	I've also included some SVG graphics - a logo for the top and an example.

***Who made it?***
	Me - Jon Buder. This is my first project to go up on GitHub. As of the date of initial creation (June 26th, 2020), I'm still in the early stages of trying to teach myself web application development. I'm working on a bunch of small projects to get proficient and then hopefully I'll work my way up to the really useful stuff.
