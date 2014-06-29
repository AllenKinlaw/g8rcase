<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ContactsModel extends CI_Model {

    function getContacts() {

//        $filter = array(
//            'Client' => $id
//        );
        $cursor = $this->mongoModel->getMongoData('contacts', '');

        foreach ($cursor as $col) {
            $firstletter = $col['lastName'][0];
            $background = $this->myhelpers->getLetterBackground($firstletter);
            $rowtext1 = $col['salutation'] . ' ' . $col['firstName'] . ' ' . $col['lastName'];
            $rowtext2 = 'P. ' . $col['phone'];
            $rowtext3 = $col['email'];
            $smlabel = '';
            $smtext = $col['type'];
            $rtn[] = array('id' => $col['_id'],
                'targeturl' => base_url() . 'contacts/details/' . $col['_id'],
                'background' => $background,
                'letter' => $firstletter,
                'rowtext1' => $rowtext1,
                'rowtext2' => $rowtext2,
                'rowtext3' => $rowtext3,
                'smlabel' => $smlabel,
                'smtext' => $smtext);
        }

        return $rtn;
    }

    function updateContact($fields) {

        $filter = array();

        if (isset($fields['_id'])) {
            if ($fields['_id']) {
                $filter = array(
                    '_id' => new MongoId($fields['_id'])
                );
            }
        }
        $rtn = $this->mongoModel->setMongoData('contacts', $filter, $fields);
        return $rtn;
    }

}
