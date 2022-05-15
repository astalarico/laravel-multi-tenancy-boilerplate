<?php

namespace App\Orchid\Screens\Organization;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;
use App\Models\Organization;
use App\Orchid\Layouts\Organization\OrganizationEditLayout;

class OrganizationEditScreen extends Screen
{

    /**
     * @var Organization
     */
    public $organization;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Organization $organization): iterable
    {
       
        return [
            'organization' => $organization,
        ];
        
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Edit Organization';
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
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
         
            Layout::block(OrganizationEditLayout::class)
                ->title(__('Profile Information'))
                ->description(__('Update your account\'s profile information and email address.'))
                ->commands(
                    Button::make(__('Save'))
                    ->type(Color::DEFAULT())
                    ->icon('check')
                    ->canSee($this->organization->exists)
                    ->method('save')
            ),
        
        ];
    }
}
