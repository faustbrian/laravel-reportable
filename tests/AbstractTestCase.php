<?php

namespace BrianFaust\Tests\Reportable;

use GrahamCampbell\TestBench\AbstractPackageTestCase;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass($app)
    {
        return \BrianFaust\Reportable\ServiceProvider::class;
    }
}
