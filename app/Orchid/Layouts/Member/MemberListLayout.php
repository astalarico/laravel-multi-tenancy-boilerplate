<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Member;

use App\Models\Member;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class MemberListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'members';

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
                ->render(function (Member $member) {
                    return ModalToggle::make($member->email)
                        ->modal('asyncEditUserModal')
                        ->modalTitle($member->name)
                        ->method('saveMember')
                        ->asyncParameters([
                            'member' => $member->id,
                        ]);
                }),

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(function (Member $member) {
                    return $member->updated_at->toDateTimeString();
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Member $member) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Edit'))
                                ->route('platform.systems.users.edit', $member->id)
                                ->icon('pencil'),

                            Button::make(__('Delete'))
                                ->icon('trash')
                                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                ->method('remove', [
                                    'id' => $member->id,
                            ]),
                            Button::make(__('Add User'))
                            ->icon('user-follow')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $member->id,
                            ]),
                        ]);
                }),
        ];
    }
}
