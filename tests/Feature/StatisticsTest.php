<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatisticsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testChartDataFor7Days()
    {
        // Create a mock request with the desired dashboard value
        $request = [
            'dashboard_value' => '7day',
        ];

        // Assuming there are relevant statistics records in the database
        $statisticsRecords = [
            // Sample statistics records here...
        ];

        // Mock the Statistics model and its methods
        $statisticsModel = $this->getMockBuilder(Statistics::class)
            ->disableOriginalConstructor()
            ->getMock();
            
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();

        // Set up the expected query parameters
        $expectedParams = [
            'order_date' => ['>=', $sub7days],
        ];

        // Set up the mock to return the mocked statistics records
        $statisticsModel->expects($this->once())
            ->method('where')
            ->with($expectedParams)
            ->willReturnSelf();

        $statisticsModel->expects($this->once())
            ->method('orderBy')
            ->with('order_date', 'ASC')
            ->willReturnSelf();

        $statisticsModel->expects($this->once())
            ->method('get')
            ->willReturn($statisticsRecords);

        // Replace the actual Statistics model with the mock
        $this->app->instance(Statistics::class, $statisticsModel);

        // Call the API endpoint or method that handles the code
        $response = $this->post('/your-endpoint', $request);

        // Assertions
        $response->assertStatus(200);
        $response->assertJson($statisticsRecords);
    }
}
