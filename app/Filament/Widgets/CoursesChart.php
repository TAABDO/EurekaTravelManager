<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class CoursesChart extends ChartWidget
{
    protected static ?string $heading = 'Courses Chart';

    protected function getData(): array
    {
        // Manually create the query to count courses per month
        $data = Course::select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Prepare the dataset for the chart
        $dataset = $data->map(fn ($row) => $row->count)->toArray();
        $labels = $data->map(fn ($row) => Carbon::createFromFormat('Y-m', $row->month)->format('M'))->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Courses',
                    'data' => $dataset,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
