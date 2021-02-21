<?php
echo form_open('Home/verify');
echo form_input('first_name');
echo form_input('last_name');
echo form_input('email');
echo form_submit('submit','OK');
echo validation_errors('<p class="error">');
?>
