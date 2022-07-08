<?php

use Mailchimp\Mailchimp;

require_once 'vendor/autoload.php';

$mailchimp = new Mailchimp('a64c2c9fee25f6481d734b1438ef55ee-us10');

echo (var_export($mailchimp->root->get(['account_id']), 1));

echo "\n";
