<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Contacts_Layouts {

    function listViewDefs($list) {
        $listViewDefs['contactslist'] = array(
            '1' => array(
                'salutation',
                'first_name',
                'last_name',
            ),
            '2' => array(
                'title',
            ),
            '3' => array(
                'email1',
            ),
            '4' => array(
                'id'
            )
        );
        $listViewDefs['contactsdisplay'] = array(
            'NAME' => array(
                'width' => '20%',
                'label' => 'LBL_LIST_NAME',
                'ftype' => 'group',
                'class' => 'well',
                'prefix' => '<div class="name-group">',
                'postfix' => '</div> </div></div>',
                'js' => '',
                'fields' => array(
                    'description' => array('label' => '',
                        'ftype' => 'text',
                        'js' => '',
                        'prefix' => '<div class="clearfix"><span class="chat-img pull-left"> <img class="img-thumbnail" src="',
                        'postfix' => '"></span>',),
                    'salutation' => array('label' => '',
                        'ftype' => 'text',
                        'js' => '',
                        'prefix' => '<div class="chat-body clearfix display-name"><p class="lead name-txt">',
                        'postfix' => '',),
                    'first_name' => array('label' => '',
                        'ftype' => 'text',
                        'js' => '',
                        'prefix' => ' ',
                        'postfix' => ''),
                    'last_name' => array('label' => '',
                        'ftype' => 'text',
                        'js' => '',
                        'prefix' => ' ',
                        'postfix' => ', </p>'),
                    'title' => array(
                        'label' => '',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'prefix' => '<h3 class="emp-title-txt in-line"> <small> ',
                        'postfix' => '</small> </h3>  '),
                    'primary_address_street' => array(
                        'label' => '',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'prefix' => '<div class="address"><strong> ',
                        'postfix' => '</strong> <br>'),
                    'primary_address_city' => array(
                        'label' => '',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'prefix' => '<strong> ',
                        'postfix' => ', </strong> '),
                    'primary_address_state' => array(
                        'label' => '',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'prefix' => '<strong> ',
                        'postfix' => '</strong> <br>'),
                    'primary_address_postalcode' => array(
                        'label' => '',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'prefix' => '<strong> ',
                        'postfix' => '</strong> <br>'),
                    'phone_work' => array(
                        'label' => 'LBL_PHONE_NUM',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'prefix' => '<abbr title="Work Phone"> W: </abbr>',
                        'postfix' => '</div>'),
                ),
            ),
        );

        /* 'EEMPLOYMENTGROUP' => array(
          'width' => '20%',
          'label' => 'LBL_EMPLOYMENT',
          'ftype' => 'group',
          'class' => 'accordian',
          'js' => '',
          'rules' => '',
          'related_fields' => array('TITLE' => array(
          'width' => '15%',
          'label' => 'LBL_LIST_TITLE',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => 'required'),
          'DEPARTMENT' => array(
          'width' => '10',
          'label' => 'LBL_DEPARTMENT',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),),), */
        /* 'ACCOUNT_NAME' => array(
          'width' => '34%',
          'label' => 'LBL_LIST_ACCOUNT_NAME',
          'module' => 'Accounts',
          'id' => 'ACCOUNT_ID',
          'link' => true,
          'contextMenu' => array('objectType' => 'sugarAccount',
          'metaData' => array('return_module' => 'Contacts',
          'return_action' => 'ListView',
          'module' => 'Accounts',
          'return_action' => 'ListView',
          'parent_id' => '{$ACCOUNT_ID}',
          'parent_name' => '{$ACCOUNT_NAME}',
          'account_id' => '{$ACCOUNT_ID}',
          'account_name' => '{$ACCOUNT_NAME}'),
          ),
          'default' => true,
          'sortable' => true,
          'ACLTag' => 'ACCOUNT',
          'related_fields' => array('account_id')),
          'EMAIL' => array(
          'width' => '20%',
          'label' => 'LBL_EMAIL',
          'ftype' => 'group',
          'class' => 'accordian',
          'js' => '',
          'related_fields' => array(
          'EMAIL1GROUP' => array(
          'label' => 'LBL_EMAIL1',
          'ftype' => 'group',
          'class' => 'well',
          'js' => '',
          'related_fields' => array(
          'EMAIL1' => array(
          'width' => '15%',
          'label' => 'LBL_LIST_EMAIL_ADDRESS',
          'ftype' => 'text',
          'class' => 'form-control email',
          'js' => '',
          'rules' => 'required|valid_email'),
          'OPT_OUT' => array(
          'width' => '10',
          'label' => 'LBL_EMAIL_OPT_OUT',
          'ftype' => 'checkbox',
          'checked' => '1',
          'default' => '',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'INVALID_EMAIL' => array(
          'width' => '10',
          'label' => 'LBL_EMAIL_VALID',
          'ftype' => 'checkbox',
          'checked' => '1',
          'default' => '',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''))),
          'EMAIL2GROUP' => array(
          'label' => 'LBL_EMAIL2',
          'ftype' => 'group',
          'class' => 'well',
          'js' => '',
          'related_fields' => array('EMAIL2' => array(
          'width' => '15',
          'label' => 'LBL_LIST_EMAIL_ADDRESS',
          'ftype' => 'text',
          'class' => 'form-control email',
          'js' => '',
          'rules' => 'valid_email'),
          'OPT_OUT' => array(
          'width' => '10',
          'label' => 'LBL_EMAIL_OPT_OUT',
          'ftype' => 'checkbox',
          'checked' => '0',
          'default' => '',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'INVALID_EMAIL' => array(
          'width' => '10',
          'label' => 'LBL_EMAIL_VALID',
          'ftype' => 'checkbox',
          'checked' => '0',
          'default' => '',
          'class' => 'form-control',
          'js' => '',
          'rules' => '')),),),
          ), */
        /* 'PHONEGOUP' => array(
          'label' => 'LBL_PHONE',
          'ftype' => 'group',
          'class' => 'accordian',
          'js' => '',
          'related_fields' => array(
          'WORKPHONEGROUP' => array(
          'label' => 'LBL_OFFICE_PHONE',
          'ftype' => 'group',
          'class' => 'well',
          'js' => '',
          'related_fields' => array(
          'PHONE_WORK' => array(
          'width' => '15%',
          'label' => 'LBL_PHONE_NUM',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => '',
          'rules' => ''),
          'DO_NOT_CALL' => array(
          'width' => '10',
          'label' => 'LBL_DO_NOT_CALL',
          'ftype' => 'checkbox',
          'checked' => '1',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),),),
          'HOMEPHONEGROUP' => array(
          'label' => 'LBL_HOME_PHONE',
          'ftype' => 'group',
          'class' => 'well',
          'js' => '',
          'related_fields' => array(
          'PHONE_HOME' => array(
          'width' => '10',
          'label' => 'LBL_PHONE_NUM',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'DO_NOT_CALL' => array(
          'width' => '10',
          'label' => 'LBL_DO_NOT_CALL',
          'ftype' => 'checkbox',
          'checked' => '1',
          'class' => 'form-control',
          'js' => '',
          'rules' => '')),),
          'MOBILEPHONEGROUP' => array(
          'label' => 'LBL_MOBILE_PHONE',
          'ftype' => 'group',
          'class' => 'well',
          'js' => '',
          'related_fields' => array(
          'PHONE_MOBILE' => array(
          'width' => '10',
          'label' => 'LBL_PHONE_NUM',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'DO_NOT_CALL' => array(
          'width' => '10',
          'label' => 'LBL_DO_NOT_CALL',
          'ftype' => 'checkbox',
          'checked' => '1',
          'class' => 'form-control',
          'js' => '',
          'rules' => '')),),
          'OTHERPHONEGROUP' => array(
          'label' => 'LBL_OTHER_PHONE',
          'ftype' => 'group',
          'class' => 'well',
          'js' => '',
          'related_fields' => array(
          'PHONE_OTHER' => array(
          'width' => '10',
          'label' => 'LBL_PHONE_NUM',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'DO_NOT_CALL' => array(
          'width' => '10',
          'label' => 'LBL_DO_NOT_CALL',
          'ftype' => 'checkbox',
          'checked' => '1',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),),),
          'FAXPHONEGROUP' => array(
          'label' => 'LBL_FAX_PHONE',
          'ftype' => 'group',
          'class' => 'well',
          'js' => '',
          'related_fields' => array(
          'PHONE_FAX' => array(
          'width' => '10',
          'label' => 'LBL_PHONE_NUM',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),),),),),
          'PRIMARYADDRESSGROUP' => array(
          'label' => 'LBL_PRIMARY_ADDRESS',
          'ftype' => 'group',
          'class' => 'accordian',
          'js' => '',
          'related_fields' => array(
          'PRIMARY_ADDRESS_STREET' => array(
          'width' => '10',
          'label' => 'LBL_PRIMARY_ADDRESS_STREET',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'PRIMARY_ADDRESS_CITY' => array(
          'width' => '10',
          'label' => 'LBL_PRIMARY_ADDRESS_CITY',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'PRIMARY_ADDRESS_STATE' => array(
          'width' => '10',
          'label' => 'LBL_PRIMARY_ADDRESS_STATE',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'PRIMARY_ADDRESS_POSTALCODE' => array(
          'width' => '10',
          'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'PRIMARY_ADDRESS_COUNTRY' => array(
          'width' => '10',
          'label' => 'LBL_ALT_ADDRESS_COUNTRY',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),),),
          'ALTADDRESSGROUP' => array(
          'label' => 'LBL_ALT_ADDRESS',
          'ftype' => 'group',
          'class' => 'accordian',
          'js' => '',
          'related_fields' => array(
          'ALT_ADDRESS_COUNTRY' => array(
          'width' => '10',
          'label' => 'LBL_ALT_ADDRESS_COUNTRY',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'ALT_ADDRESS_STREET' => array(
          'width' => '10',
          'label' => 'LBL_ALT_ADDRESS_STREET',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'ALT_ADDRESS_CITY' => array(
          'width' => '10',
          'label' => 'LBL_ALT_ADDRESS_CITY',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'ALT_ADDRESS_STATE' => array(
          'width' => '10',
          'label' => 'LBL_ALT_ADDRESS_STATE',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          'ALT_ADDRESS_POSTALCODE' => array(
          'width' => '10',
          'label' => 'LBL_ALT_ADDRESS_POSTALCODE',
          'ftype' => 'text',
          'class' => 'form-control',
          'js' => '',
          'rules' => ''),
          ),),
          'ADMINGROUP' => array(
          'label' => 'LBL_ADMIN',
          'ftype' => 'group',
          'class' => 'accordian',
          'collapse' => ' collapse',
          'js' => '',
          'related_fields' => array(
          'CREATED_BY_NAME' => array(
          'width' => '10',
          'label' => 'LBL_CREATED',
          'ftype' => 'text',
          'class' => 'input-group',
          'js' => '',
          'rules' => ''),
          'ASSIGNED_USER_NAME' => array(
          'width' => '10',
          'label' => 'LBL_LIST_ASSIGNED_USER',
          'ftype' => 'text',
          'class' => 'input-group',
          'js' => '',
          'module' => 'Employees',
          'id' => 'ASSIGNED_USER_ID',
          'rules' => ''),
          'MODIFIED_BY_NAME' => array(
          'width' => '10',
          'label' => 'LBL_MODIFIED',
          'ftype' => 'text',
          'class' => 'input-group',
          'js' => '',
          'rules' => ''),
          'SYNC_CONTACT' => array(
          'type' => 'bool',
          'label' => 'LBL_SYNC_CONTACT',
          'ftype' => 'text',
          'class' => 'input-group',
          'js' => '',
          'rules' => ''
          ),
          'DATE_ENTERED' => array(
          'width' => '10',
          'label' => 'LBL_DATE_ENTERED',
          'ftype' => 'text',
          'class' => 'input-group',
          'js' => '',
          'rules' => '')
          ),) */
//);

        $listViewDefs['contacts'] = array(
            'NAME' => array(
                'width' => '20%',
                'label' => 'LBL_LIST_NAME',
                'ftype' => 'group',
                'class' => 'accordian',
                'js' => '',
                'rules' => '',
                'related_fields' => array(
                    'first_name' => array('label' => 'LBL_FIRST_NAME',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => 'required',),
                    'last_name' => array('label' => 'LBL_LAST_NAME',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => 'required',),
                    'salutation' => array('label' => 'LBL_SALUTATION',
                        'ftype' => 'drop-down',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => '',
                        'dropdownvalues' => array(
                            '' => '',
                            'Mr.' => 'Mr.',
                            'Ms.' => 'Ms.',
                            'Mrs.' => 'Mrs.',
                            'Dr.' => 'Dr.',
                            'Prof.' => 'Prof.',
                            'Honerable' => 'Honerable',
                        )),
                )
//'account_name',
//'account_id'),
            ),
            'EEMPLOYMENTGROUP' => array(
                'width' => '20%',
                'label' => 'LBL_EMPLOYMENT',
                'ftype' => 'group',
                'class' => 'accordian',
                'js' => '',
                'rules' => '',
                'related_fields' => array('TITLE' => array(
                        'width' => '15%',
                        'label' => 'LBL_LIST_TITLE',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => 'required'),
                    'DEPARTMENT' => array(
                        'width' => '10',
                        'label' => 'LBL_DEPARTMENT',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),),),
            /* 'ACCOUNT_NAME' => array(
              'width' => '34%',
              'label' => 'LBL_LIST_ACCOUNT_NAME',
              'module' => 'Accounts',
              'id' => 'ACCOUNT_ID',
              'link' => true,
              'contextMenu' => array('objectType' => 'sugarAccount',
              'metaData' => array('return_module' => 'Contacts',
              'return_action' => 'ListView',
              'module' => 'Accounts',
              'return_action' => 'ListView',
              'parent_id' => '{$ACCOUNT_ID}',
              'parent_name' => '{$ACCOUNT_NAME}',
              'account_id' => '{$ACCOUNT_ID}',
              'account_name' => '{$ACCOUNT_NAME}'),
              ),
              'default' => true,
              'sortable' => true,
              'ACLTag' => 'ACCOUNT',
              'related_fields' => array('account_id')),
              'EMAIL' => array(
              'width' => '20%',
              'label' => 'LBL_EMAIL',
              'ftype' => 'group',
              'class' => 'accordian',
              'js' => '',
              'related_fields' => array(
              'EMAIL1GROUP' => array(
              'label' => 'LBL_EMAIL1',
              'ftype' => 'group',
              'class' => 'well',
              'js' => '',
              'related_fields' => array(
              'EMAIL1' => array(
              'width' => '15%',
              'label' => 'LBL_LIST_EMAIL_ADDRESS',
              'ftype' => 'text',
              'class' => 'form-control email',
              'js' => '',
              'rules' => 'required|valid_email'),
              'OPT_OUT' => array(
              'width' => '10',
              'label' => 'LBL_EMAIL_OPT_OUT',
              'ftype' => 'checkbox',
              'checked' => '1',
              'default' => '',
              'class' => 'form-control',
              'js' => '',
              'rules' => ''),
              'INVALID_EMAIL' => array(
              'width' => '10',
              'label' => 'LBL_EMAIL_VALID',
              'ftype' => 'checkbox',
              'checked' => '1',
              'default' => '',
              'class' => 'form-control',
              'js' => '',
              'rules' => ''))),
              'EMAIL2GROUP' => array(
              'label' => 'LBL_EMAIL2',
              'ftype' => 'group',
              'class' => 'well',
              'js' => '',
              'related_fields' => array('EMAIL2' => array(
              'width' => '15',
              'label' => 'LBL_LIST_EMAIL_ADDRESS',
              'ftype' => 'text',
              'class' => 'form-control email',
              'js' => '',
              'rules' => 'valid_email'),
              'OPT_OUT' => array(
              'width' => '10',
              'label' => 'LBL_EMAIL_OPT_OUT',
              'ftype' => 'checkbox',
              'checked' => '0',
              'default' => '',
              'class' => 'form-control',
              'js' => '',
              'rules' => ''),
              'INVALID_EMAIL' => array(
              'width' => '10',
              'label' => 'LBL_EMAIL_VALID',
              'ftype' => 'checkbox',
              'checked' => '0',
              'default' => '',
              'class' => 'form-control',
              'js' => '',
              'rules' => '')),),),
              ), */
            'PHONEGOUP' => array(
                'label' => 'LBL_PHONE',
                'ftype' => 'group',
                'class' => 'accordian',
                'js' => '',
                'related_fields' => array(
                    'WORKPHONEGROUP' => array(
                        'label' => 'LBL_OFFICE_PHONE',
                        'ftype' => 'group',
                        'class' => 'well',
                        'js' => '',
                        'related_fields' => array(
                            'PHONE_WORK' => array(
                                'width' => '15%',
                                'label' => 'LBL_PHONE_NUM',
                                'ftype' => 'text',
                                'class' => 'form-control',
                                'js' => '',
                                'rules' => '',
                                'rules' => ''),
                            'DO_NOT_CALL' => array(
                                'width' => '10',
                                'label' => 'LBL_DO_NOT_CALL',
                                'ftype' => 'checkbox',
                                'checked' => '1',
                                'class' => 'form-control',
                                'js' => '',
                                'rules' => ''),),),
                    'HOMEPHONEGROUP' => array(
                        'label' => 'LBL_HOME_PHONE',
                        'ftype' => 'group',
                        'class' => 'well',
                        'js' => '',
                        'related_fields' => array(
                            'PHONE_HOME' => array(
                                'width' => '10',
                                'label' => 'LBL_PHONE_NUM',
                                'ftype' => 'text',
                                'class' => 'form-control',
                                'js' => '',
                                'rules' => ''),
                            'DO_NOT_CALL' => array(
                                'width' => '10',
                                'label' => 'LBL_DO_NOT_CALL',
                                'ftype' => 'checkbox',
                                'checked' => '1',
                                'class' => 'form-control',
                                'js' => '',
                                'rules' => '')),),
                    'MOBILEPHONEGROUP' => array(
                        'label' => 'LBL_MOBILE_PHONE',
                        'ftype' => 'group',
                        'class' => 'well',
                        'js' => '',
                        'related_fields' => array(
                            'PHONE_MOBILE' => array(
                                'width' => '10',
                                'label' => 'LBL_PHONE_NUM',
                                'ftype' => 'text',
                                'class' => 'form-control',
                                'js' => '',
                                'rules' => ''),
                            'DO_NOT_CALL' => array(
                                'width' => '10',
                                'label' => 'LBL_DO_NOT_CALL',
                                'ftype' => 'checkbox',
                                'checked' => '1',
                                'class' => 'form-control',
                                'js' => '',
                                'rules' => '')),),
                    'OTHERPHONEGROUP' => array(
                        'label' => 'LBL_OTHER_PHONE',
                        'ftype' => 'group',
                        'class' => 'well',
                        'js' => '',
                        'related_fields' => array(
                            'PHONE_OTHER' => array(
                                'width' => '10',
                                'label' => 'LBL_PHONE_NUM',
                                'ftype' => 'text',
                                'class' => 'form-control',
                                'js' => '',
                                'rules' => ''),
                            'DO_NOT_CALL' => array(
                                'width' => '10',
                                'label' => 'LBL_DO_NOT_CALL',
                                'ftype' => 'checkbox',
                                'checked' => '1',
                                'class' => 'form-control',
                                'js' => '',
                                'rules' => ''),),),
                    'FAXPHONEGROUP' => array(
                        'label' => 'LBL_FAX_PHONE',
                        'ftype' => 'group',
                        'class' => 'well',
                        'js' => '',
                        'related_fields' => array(
                            'PHONE_FAX' => array(
                                'width' => '10',
                                'label' => 'LBL_PHONE_NUM',
                                'ftype' => 'text',
                                'class' => 'form-control',
                                'js' => '',
                                'rules' => ''),),),),),
            'PRIMARYADDRESSGROUP' => array(
                'label' => 'LBL_PRIMARY_ADDRESS',
                'ftype' => 'group',
                'class' => 'accordian',
                'js' => '',
                'related_fields' => array(
                    'PRIMARY_ADDRESS_STREET' => array(
                        'width' => '10',
                        'label' => 'LBL_PRIMARY_ADDRESS_STREET',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),
                    'PRIMARY_ADDRESS_CITY' => array(
                        'width' => '10',
                        'label' => 'LBL_PRIMARY_ADDRESS_CITY',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),
                    'PRIMARY_ADDRESS_STATE' => array(
                        'width' => '10',
                        'label' => 'LBL_PRIMARY_ADDRESS_STATE',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),
                    'PRIMARY_ADDRESS_POSTALCODE' => array(
                        'width' => '10',
                        'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),
                    'PRIMARY_ADDRESS_COUNTRY' => array(
                        'width' => '10',
                        'label' => 'LBL_ALT_ADDRESS_COUNTRY',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),),),
            'ALTADDRESSGROUP' => array(
                'label' => 'LBL_ALT_ADDRESS',
                'ftype' => 'group',
                'class' => 'accordian',
                'js' => '',
                'related_fields' => array(
                    'ALT_ADDRESS_COUNTRY' => array(
                        'width' => '10',
                        'label' => 'LBL_ALT_ADDRESS_COUNTRY',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),
                    'ALT_ADDRESS_STREET' => array(
                        'width' => '10',
                        'label' => 'LBL_ALT_ADDRESS_STREET',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),
                    'ALT_ADDRESS_CITY' => array(
                        'width' => '10',
                        'label' => 'LBL_ALT_ADDRESS_CITY',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),
                    'ALT_ADDRESS_STATE' => array(
                        'width' => '10',
                        'label' => 'LBL_ALT_ADDRESS_STATE',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),
                    'ALT_ADDRESS_POSTALCODE' => array(
                        'width' => '10',
                        'label' => 'LBL_ALT_ADDRESS_POSTALCODE',
                        'ftype' => 'text',
                        'class' => 'form-control',
                        'js' => '',
                        'rules' => ''),
                ),),
            'ADMINGROUP' => array(
                'label' => 'LBL_ADMIN',
                'ftype' => 'group',
                'class' => 'accordian',
                'collapse' => ' collapse',
                'js' => '',
                'related_fields' => array(
                    'CREATED_BY_NAME' => array(
                        'width' => '10',
                        'label' => 'LBL_CREATED',
                        'ftype' => 'text',
                        'class' => 'input-group',
                        'js' => '',
                        'rules' => ''),
                    'ASSIGNED_USER_NAME' => array(
                        'width' => '10',
                        'label' => 'LBL_LIST_ASSIGNED_USER',
                        'ftype' => 'text',
                        'class' => 'input-group',
                        'js' => '',
                        'module' => 'Employees',
                        'id' => 'ASSIGNED_USER_ID',
                        'rules' => ''),
                    'MODIFIED_BY_NAME' => array(
                        'width' => '10',
                        'label' => 'LBL_MODIFIED',
                        'ftype' => 'text',
                        'class' => 'input-group',
                        'js' => '',
                        'rules' => ''),
                    'SYNC_CONTACT' => array(
                        'type' => 'bool',
                        'label' => 'LBL_SYNC_CONTACT',
                        'ftype' => 'text',
                        'class' => 'input-group',
                        'js' => '',
                        'rules' => ''
                    ),
                    'DATE_ENTERED' => array(
                        'width' => '10',
                        'label' => 'LBL_DATE_ENTERED',
                        'ftype' => 'text',
                        'class' => 'input-group',
                        'js' => '',
                        'rules' => '')
                ),)
        );
        return $listViewDefs[$list];
    }

}
