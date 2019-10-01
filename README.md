# Laravel Reportable

[![Build Status](https://img.shields.io/travis/artisanry/Reportable/master.svg?style=flat-square)](https://travis-ci.org/artisanry/Reportable)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/artisanry/reportable.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/artisanry/Reportable.svg?style=flat-square)](https://github.com/artisanry/Reportable/releases)
[![License](https://img.shields.io/packagist/l/artisanry/Reportable.svg?style=flat-square)](https://packagist.org/packages/artisanry/Reportable)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require artisanry/reportable
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="Artisanry\Reportable\ReportableServiceProvider" && php artisan migrate
```

## Usage

## Setup a Model
``` php
<?php

namespace App;

use Artisanry\Reportable\HasReports;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasReports;
}
```

## Examples

#### The User Model reports the Post Model
``` php
$post->report([
    'reason' => \Str::random(10),
    'meta' => ['some more optional data, can be notes or something'],
], $user);
```

#### Create a conclusion for a Report and add the User Model as "judge" (useful to later see who or what came to this conclusion)
``` php
$report->conclude([
    'conclusion' => 'Your report was valid. Thanks! We\'ve taken action and removed the entry.',
    'action_taken' => 'Record has been deleted.', // This is optional but can be useful to see what happend to the record
    'meta' => ['some more optional data, can be notes or something'],
], $user);
```

#### Get the conclusion for the Report Model
``` php
$report->conclusion;
```

#### Get the judge for the Report Model (only available if there is a conclusion)
``` php
$report->judge(); // Just a shortcut for $report->conclusion->judge
```

#### Get an array with all Judges that have ever "judged" something
``` php
Report::allJudges();
```

#### Get unjudged reports (those without conclusions)
``` php
Report::unjudged(); // returns query builder.
```

#### Changing the user reporter model
``` php
Set your user model in the config('auth.providers.users.model');
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## License

Mozilla Public License Version 2.0 ([MPL-2.0](./LICENSE)).
