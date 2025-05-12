<?php

if(isset($_POST['_method']) && $_POST['_method'] === 'DELETE')
{
    logout();
}