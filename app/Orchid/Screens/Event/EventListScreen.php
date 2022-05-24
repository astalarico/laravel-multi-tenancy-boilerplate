<?php

namespace App\Orchid\Screens\Event;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Screen;
use App\Models\Event;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
// use App\Orchid\Layouts\Member\MemberEditLayout;
// use App\Orchid\Layouts\Member\MemberFiltersLayout;
// use App\Orchid\Layouts\Member\MemberListLayout;

class EventListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'events' => Event::whereJsonContains('users', (string)Auth::id())->get()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Events';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }


   /**
     * Views.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('events', [
                TD::make('name', __('Name'))
                    ->sort()
                    ->cantHide()
                    ->filter(Input::make()),
                    TD::make('start_date', __('Start Date'))
                        ->sort()
                        ->cantHide()
                        ->filter(Input::make()),
                    TD::make('end_date', __('End Date'))
                        ->sort()
                        ->cantHide()
                        ->filter(Input::make()),
                TD::make('end_date'),
            ])
        ];
    }

}
