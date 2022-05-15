<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Organization;

use App\Models\Organization;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class OrganizationListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'organizations';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name', __('Name'))
                ->sort()
                ->cantHide()
                ->filter(Input::make()),


            TD::make('email', __('Email'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Organization $organization) {
                    return ModalToggle::make($organization->email)
                        ->modal('asyncEditUserModal')
                        ->modalTitle($organization->name)
                        ->method('saveOrganization')
                        ->asyncParameters([
                            'organization' => $organization->id,
                        ]);
                }),

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(function (Organization $organization) {
                    return $organization->updated_at->toDateTimeString();
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Organization $organization) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Edit'))
                                ->route('platform.organizations.edit', $organization->id)
                                ->icon('pencil'),

                            Button::make(__('Delete'))
                                ->icon('trash')
                                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                ->method('remove', [
                                    'id' => $organization->id,
                            ]),

                            Button::make(__('Add User'))
                            ->icon('user-follow')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $organization->id,
                            ]),
                        ]);
                }),
        ];
    }
}
