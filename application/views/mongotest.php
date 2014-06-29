<?php

// connect
$m = new MongoClient();


// select a database
$db = $m->g8rcase;

$collection = $db->contacts_ABC_sdf_XYZ;
$collection->remove();
// add a record
$document = array("type" => "client",
    "salutation" => "Mr.",
    "firstName" => "Spud",
    "lastName" => "Mckensie",
    "middleName" => "S.",
    "phone" => array('primary' => '555-555-1212'),
    "email" => array('primary' => 'spuds@coors,com'),
    "address" => array('primary' => array('street' => '123',
            'city' => 'golden',
            'state' => 'CO',
            'postalcode' => '23456',
            'country' => 'USA')),
    "datefiled" => new MongoDate()
);
$collection->insert($document);
// select a collection (analogous to a relational database's table)
$filter = array(
    'lastName' => "Mckensie"
);

$cursor = $collection->find($filter);

// iterate through the results
foreach ($cursor as $client) {
    echo '' . $client["firstName"] .' '. $client["lastName"] .'"/n"';
    //echo $document["author"] . '\n'";
    $collection2 = $db->cases_ABC_sdf_XYZ;
$collection2->remove();
// add a record
$document = array("docket" => "abc-123-sc-2014",
    "title" => "Spuds v Alex",
    "Client" => $client["_id"]  ,
    "type" => "Civil",
    "claims" => "defamation",
    "status" => "Filed",
    // "Notes" => "",
//"Resolution"=>"",
    "partytype" => "plaintiff",
    //"coparty"=>""
    "datefiled" => new MongoDate()
);
$collection2->insert($document);

$document = array("docket" => "abc-123-sc-2014",
    "title" => "Spuds v State",
    "Client" => $client["_id"] ,
    "type" => "Criminal",
    "claims" => "dui",
    "status" => "Verdict",
    // "Notes" => "",
    "resolution" => "Guilty - Fine $2500  - Time Served",
    "partytype" => "defendant",
    //"coparty"=>""
    "datefiled" => new MongoDate(strtotime("2010-01-30 00:00:00"))
);
$collection2->insert($document);
//
//// add another record, with a different "shape"
//$document = array( "title" => "XKCD", "online" => true );
//$collection->insert($document);
//
//// add another record, with a different "shape"
//$document = array( "title" => "Beavis and Butthead", "online" => true, "author"=>"Genius" );
//$collection->insert($document);
//// find everything in the collection
$filter = array(
    'client' => $client["_id"] 
);

$cursor = $collection2->find($filter);

// iterate through the results
foreach ($cursor as $document) {
    echo '' . $document["title"] . '"/n"';
    //echo $document["author"] . '\n'";
}
}

?> 