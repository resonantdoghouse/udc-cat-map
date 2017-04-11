<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// test
//
// Get All cats
$app->get('/api/cats', function(Request $request, Response $response){
	$sql = "SELECT * FROM cats";

	try{
		// Get Database Object
		$db = new db();
		// Connect
		$db = $db->connect();

		$stmt = $db->query($sql);
		$cats = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($cats, JSON_UNESCAPED_SLASHES);
	} catch(PDOEception $e){
		echo '{"error": {"text":'.$e->getMessage().'}}';
	}
});

// Get Single cat
$app->get('/api/cat/{id}', function(Request $request, Response $response){
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM cats WHERE id = $id";

	try{
		// Get Database Object
		$db = new db();
		// Connect
		$db = $db->connect();

		$stmt = $db->query($sql);
		$cat = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($cat, JSON_UNESCAPED_SLASHES);
	} catch(PDOEception $e){
		echo '{"error": {"text":'.$e->getMessage().'}}';
	}
});

// Add cat
$app->post('/api/cat/add', function(Request $request, Response $reponse){
	$name = $request->getParam('name');
	$description = $request->getParam('description');
	$img_url = $request->getParam('img_url');
	$lat = $request->getParam('lat');
	$lng = $request->getParam('lng');

	$sql = "INSERT INTO cats (name, description, img_url, lat, lng) VALUES (:name, :description, :img_url, :lat, :lng)";

	try{
		// Get Database Object
		$db = new db();
		// Connect
		$db = $db->connect();

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':img_url', $img_url);
		$stmt->bindParam(':lat', $lat);
		$stmt->bindParam(':lng', $lng);

		$stmt->execute();

		echo '{"notice": {"text":"cat Added"}}';

	} catch(PDOEception $e){
		echo '{"error": {"text":'.$e->getMessage().'}}';
	}
});


// Update cat
$app->put('/api/cat/update/{id}', function(Request $request, Response $reponse){
	$id = $request->getAttribute('id');
	$name = $request->getParam('name');
	$description = $request->getParam('description');

	$sql = "UPDATE cats SET
											    name = :name,
											    description = :description
											 WHERE id = $id";

	try{
		// Get Database Object
		$db = new db();
		// Connect
		$db = $db->connect();

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':description', $description);

		$stmt->execute();

		echo '{"notice": {"text":"cat: ' . $id . ' Updated"}}';

	} catch(PDOEception $e){
		echo '{"error": {"text":'.$e->getMessage().'}}';
	}
});


// Delete cat
$app->delete('/api/cat/delete/{id}', function(Request $request, Response $reponse){
		$id = $request->getAttribute('id');

		$sql = "DELETE FROM cats WHERE id = $id";

		try {
			$db = new db();
			// Connect
			$db = $db->connect();

			$stmt = $db->prepare($sql);
			$stmt->execute();
			$db = null;
			echo '{"notice": {"text":"cat: ' . $id . ' Deleted"}}';

		} catch(PDOException $e){
			echo '{"error": {"text":'.$e->getMessage().'}}';
		}
});
