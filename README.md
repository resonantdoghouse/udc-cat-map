# UDC Cat Map

## Live Demo
- [Map Page][1]
- [Add Cat Page][2]
## File Structure

- `app/` contains code for the database and php slim application.
- `public/map/` contains code relevant to the map front-end and knockout.js  `public/maps/js/main.js` and `public/maps/js/map.js`
- For review the code in `public/map/` is where the knockout.js is used e.g. `public/map/js/main.js`
	- The `app` folder contains routing and database settings for the backend, used to create JSON output for the map front-end. If you want to setup the backend edit `app/db.php` and update the database settings to match your own.
	- I’ve added the table SQL at the bottom, you can run this in phpmyadmin or any mysql interface used with your database.
	- If you don’t want to bother with the php app and database, you can modify the code in `app/public/map/js/main.js`, change the connection which is: `$.getJSON('//catmap.catkittycat.com/api/cats'` to reference the locations.json file instead.

## running local

- To run locally install composer dependencies with composer.json
- You will also need a database in order to connect
- Database used is mysql
- The SQL for the required table is: 
		CREATE TABLE IF NOT EXISTS cats (
		  id int(11) NOT NULL AUTO\_INCREMENT,
		  name varchar(255) NOT NULL,
		  description text,
		  img\_url varchar(255) DEFAULT NULL,
		  created\_date timestamp NOT NULL DEFAULT CURRENT\_TIMESTAMP,
		  lat float(10,6) NOT NULL,
		  lng float(10,6) NOT NULL,
		  PRIMARY KEY (id)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO\_INCREMENT=7 ;


  


[1]:	http://catmap.catkittycat.com/public/map/
[2]:	http://catmap.catkittycat.com/addcat.html