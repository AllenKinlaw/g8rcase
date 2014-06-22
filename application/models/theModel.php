<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MongoModel extends CI_Model {

    function connectMongo() {
        $m = new MongoClient();

// select a database
        $mongodb = $m->g8rcase;
        return $mongodb;
    }

    function getMongoData($doccol, $filter) {

// select a collection (analogous to a relational database's table)
        $mongodb = $this->connectMongo();
        $collection = $mongodb->$doccol;
        $cursor = $collection->find($filter);
        return $cursor;
    }

    function getMongoDatabyId($doccol, $filter) {

// select a collection (analogous to a relational database's table)
        $mongodb = $this->connectMongo();
        $collection = $mongodb->$doccol;
        $cursor = $collection->findOne($filter);
        return $cursor;
    }

    function setMongoData($doccol, $filter, $values) {

// select a collection (analogous to a relational database's table)
        $mongodb = $this->connectMongo();
        $collection = $mongodb->$doccol;
        $collection->update($filter, array('$set' => $values));
        //$cursor = $collection->find($filter);
        return;
    }

}
