<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Branch;
use App\Models\Director;
use App\Models\Document;
use App\Models\MeetingSchedule;
use App\Models\Report;
use App\Models\Terminal;
use App\Models\User;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ResourceStatsOverview extends StatsOverviewWidget
{
    protected ?string $heading = 'Data Overview';

    public function getSectionContentComponent(): Section
    {
        return parent::getSectionContentComponent()
            ->extraAttributes([
                'class' => 'fi-wi-stats-overview-dark',
            ]);
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Articles', Article::count())
                ->icon(Heroicon::OutlinedRectangleStack),
            Stat::make('Branches', Branch::count())
                ->icon(Heroicon::OutlinedBuildingOffice),
            Stat::make('Directors', Director::count())
                ->icon(Heroicon::OutlinedUserGroup),
            Stat::make('Documents', Document::count())
                ->icon(Heroicon::OutlinedDocument),
            Stat::make('Meeting Schedules', MeetingSchedule::count())
                ->icon(Heroicon::OutlinedCalendar),
            Stat::make('Reports', Report::count())
                ->icon(Heroicon::OutlinedChartBar),
            Stat::make('Terminals', Terminal::count())
                ->icon(Heroicon::OutlinedMap),
            Stat::make('Users', User::count())
                ->icon(Heroicon::OutlinedUsers),
        ];
    }
}
