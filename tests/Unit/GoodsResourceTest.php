<?php

namespace Tests\Unit;

use App\Http\Resources\GoodsResource;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Tests\TestCase;

class GoodsResourceTest extends TestCase
{
    use DatabaseTransactions;

    protected GoodsResource $resource;

    protected function setUp(): void
    {
        $request = \Mockery::mock(Request::class)->makePartial();
        $this->resource = new GoodsResource($request);
    }

    public function test_formatPrice_succ()
    {
        $this->assertEquals('1 500 ₽', $this->resource->formatPrice(1500, 'RUR'));
        $this->assertEquals('$1.67', $this->resource->formatPrice(150, 'USD'));
        $this->assertEquals('€2.00', $this->resource->formatPrice(200, 'EUR'));
    }

    public function test_formatPrice_fail()
    {
        $this->expectException(\Exception::class);
        $this->assertEquals('100 ₽', $this->resource->formatPrice(100, 'ABC'));
    }
}
