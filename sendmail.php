<?php

require('vendor/autoload.php');

require('Mailer.php');

Mailer::instance()->html('Hey Kamna')->send('adil@biglytech.net');
