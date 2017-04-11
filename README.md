# UDC Cat Map

## Live Demo
[Map Page][1]
[Add Cat Page][2]
## File Structure

- `app/` contains code for the backend, php slim.
- `public/map/` contains code relevant to the map front-end and knockout.js  `public/maps/js/main.js` and `public/maps/js/map.js`

## running local

- To run locally install composer dependencies with composer.json
- You will also need a database in order to connect
- The SQL for the required table is: 

	CREATE TABLE IF NOT EXISTS cats (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  name varchar(255) NOT NULL,
	  description text,
	  img_url varchar(255) DEFAULT NULL,
	  created_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  lat float(10,6) NOT NULL,
	  lng float(10,6) NOT NULL,
	  PRIMARY KEY (id)
	) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;


  


[1]:	http://catmap.catkittycat.com/public/map/
[2]:	http://catmap.catkittycat.com/addcat.html