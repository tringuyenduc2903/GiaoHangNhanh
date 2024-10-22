<?php

namespace TriNguyenDuc\GiaoHangNhanh\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanhServiceProvider;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app): void
    {
        //
    }

    protected function getPackageProviders($app): array
    {
        return [
            GiaoHangNhanhServiceProvider::class,
        ];
    }
}
