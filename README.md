Premailer CLI Wrapper
=====================

This library is a PHP CLI wrapper for [Premailer](https://github.com/premailer/premailer). Premailer is a tool to inline all of your CSS to ensure best compatibility with email clients.

Premailer is written in Ruby, but can be accessed via a CLI. You will first need to install the Rubygem:

```bash
sudo gem install premailer
```


## Install via Composer

To install AddressFormat as a Composer package add this to your composer.json:

```json
"adamlc/premailer-cli-wrapper": "0.0.*"
```

Run `composer update`


## Usage Instructions

WARNING! This library currently doesn't have any unit tests and very much error checking. It will develop over time as I begin to use it in Production.

```php
<?php

use Adamlc\Premailer\Command;
use Adamlc\Premailer\Email;

//Path to Premailer Binary
$command = new Command('/usr/bin/premailer');

//Create a new email instance, passing the Command instance
$email = new Email($command);

//Set the body of the Email
$email->setBody('<h1>Hello world</h1>');

//Get the parsed body of the email
$html = $email->getHtml();
$text = $email->getText();

```

Thats pretty much it!

##TODO
* Write some unit tests.
* Error checking / Exceptions
* Use filesystem abstraction library
* Additional Premailer options. Such as remove scripts etc
