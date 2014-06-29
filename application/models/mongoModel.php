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

    function getMongoData($doccol, $filter = '') {

// select a collection (analogous to a relational database's table)
        $mongodb = $this->connectMongo();
        $colname = $doccol . '_ABC_sdf_XYZ';
        $collection = $mongodb->$colname;
        if ($filter) {
            $cursor = $collection->find($filter);
        } else {
            $cursor = $collection->find();
        };
        return $cursor;
    }

    function getMongoDatabyId($doccol, $filter) {

// select a collection (analogous to a relational database's table)
        $mongodb = $this->connectMongo();
        $colname = $doccol . '_ABC_sdf_XYZ';
        $collection = $mongodb->$colname;
        $cursor = $collection->findOne($filter);

        foreach ($cursor as $key => $value) {
            if (strpos($key, 'Date') !== false || strpos($key, 'date') !== false) {

                $datefield = date('Y-M-d', $value->sec);
                $fields[$key] = $datefield;
            } else {
                $fields[$key] = $value;
            }
        }
        return $fields;
    }

    function setMongoData($doccol, $filter, $values) {

// select a collection (analogous to a relational database's table)
        $mongodb = $this->connectMongo();
        $colname = $doccol . '_ABC_sdf_XYZ';
        $collection = $mongodb->$colname;
        $tmpid ='';
        if (isset($filter['_id'])) {
            if (isset($values['_id'])) {
                $tmpid = $values['_id'];
                unset($values['_id']);
            }
            $collection->update($filter, array('$set' => $values));
        } else {
            $values['_id'] = new MongoId();
            $collection->insert($values);
        }
        //$cursor = $collection->find($filter);
        return (isset($values['_id']) ? $values['_id'] : $tmpid);
    }

}
