<?php

namespace TriNguyenDuc\GiaoHangNhanh\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh
 */
class GiaoHangNhanh extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh::class;
    }
}
