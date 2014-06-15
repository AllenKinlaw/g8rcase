<?php

// connect
$m = new MongoClient();


// select a database
$db = $m->g8rcase;

// select a collection (analogous to a relational database's table)
$collection = $db->cases;
$collection->remove();
// add a record
$document = array( "docket" => "abc-123-sc-2014",
"title" => "Spuds v Alex",
 "Client" => "a7a2aadc-7622-8db4-d81e-53950f1b6a48",
 "type" => "Civil",
 "claims" => "defamation",
 "status" => "Filed",
 // "Notes" => "",
//"Resolution"=>"",
"partytype" => "plaintiff",
 //"coparty"=>""
"datefiled" => new MongoDate()
);
$collection->insert($document);

$document = array("docket" => "abc-123-sc-2014",
    "title" => "Spuds v State",
    "Client" => "a7a2aadc-7622-8db4-d81e-53950f1b6a48",
    "type" => "Criminal",
    "claims" => "dui",
    "status" => "Verdict",
    // "Notes" => "",
    "resolution" => "Guilty - Fine $2500  - Time Served",
    "partytype" => "defendant",
    //"coparty"=>""
    "datefiled" => new MongoDate(strtotime("2010-01-30 00:00:00"))
);
$collection->insert($document);
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
    'client' => "a7a2aadc-7622-8db4-d81e-53950f1b6a48"
);

$cursor = $collection->find($filter);

// iterate through the results
foreach ($cursor as $document) {
    echo '' . $document["title"] . '"/n"';
    //echo $document["author"] . '\n'";
}
?> 