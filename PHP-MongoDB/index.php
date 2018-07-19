<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);

	require 'vendor/autoload.php';
	$m = new MongoDB\Client("mongodb://localhost:27017");
	// $m = new MongoClient();// connects to localhost:27017

	echo "Connection to database sucessfully";
	$db = $m->test;
	echo "<br/>";

	echo "Database test is selected";
	echo "<br/>";

	$collection = $db->users;
	echo "Collection selected : users";
	echo "<br/>";

	// $document = array (
	// 	"firstname" => 'Test',
	// 	'lastname' => 'Testing'
	// );
	// $collection->insertOne($document);
	// echo "Document inserted successfully";
	
	echo "<hr/>";
	$cursor = $collection->find();
	foreach ($cursor as $doc) {
		echo  $doc['_id'] . " | " . $doc['firstname'] . " | " . $doc['lastname'] . "<br/>";
	}
	echo "<hr/>";

	// $collection->deleteOne(array("_id" => new MongoDB\BSON\ObjectId("5b5097c40726987ef8789872")));
	// echo "<br/>";
	// echo "document with _id : 5b5097c40726987ef8789872 deleted successfully";

	// $collection->updateOne(["_id" => new MongoDB\BSON\ObjectId("5b5082340726987ef63f6a23")], ['$set' => ['firstname' => 'Test']]);
	// echo "<br/>";
	// echo "document with _id : 5b5082340726987ef63f6a23 updated its firstname to Tester";


	echo "<hr/>";
	$cursor = $collection->find();
	foreach ($cursor as $doc) {
		echo  $doc['_id'] . " | " . $doc['firstname'] . " | " . $doc['lastname'] . "<br/>";
	}
	echo "<hr/>";

	// phpinfo();

	/*
	
	Learnings :

	1. MongoClient with composer do not support methods like insert and remove, you have to use 
		insert()  :  insertOne()/insertMany()
		remove()  :  deleteOne()/deleteMany()
		update()  :  updateOne()

		References : 
			i.   CRUD operations - https://docs.mongodb.com/php-library/current/tutorial/crud/#update-one-document
			ii.  To execute database commands which are not mentioned in helper methods
				 	 https://docs.mongodb.com/php-library/current/tutorial/commands/
			iii. More detailed documentation
					 https://docs.mongodb.com/php-library/current/reference/method/MongoDBCollection-findOne/

	2. Note that $set in updateOne() is enclosed with single quotes ('). If you use double quotes (") it will throw error that set is defined variable in PHP. Single-quotes makes it part of db query and Double-quotes makes it part of PHP variable.

	*/

?>