<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */-->



                    <?php
                    echo validation_errors();
                    $formvars =array('class' => 'ajax-form',
                                     'target-div' => 'panel-registration');
                    echo form_open('user/signupform',$formvars);
                    echo '<p> <label>Email: </label>';
                    echo form_input(array(
                        'name' => 'Email',
                        'class' => 'form-control'
                    ));
                    echo '</p>';
                    echo '<p> <label>Confirm Email: </label>';
                    echo form_input(array(
                        'name' => 'Cemail',
                        'class' => 'form-control'
                    ));
                    echo '<p> <label>First Name: </label>';
                    echo form_input(array(
                        'name' => 'first_name',
                        'class' => 'form-control'
                    ));
                    echo '<p> <label>Last Name: </label>';
                    echo form_input(array(
                        'name' => 'last_name',
                        'class' => 'form-control'
                    ));

                    echo '</p>';
                    echo '<p>';
                    echo form_submit('login_submit', 'Sign Me Up!');
                    echo '</p>';
                    echo form_close();
                    ?>

          