<?php

namespace App\Orchid\Screens\Member;

use Orchid\Screen\Screen;
use App\Models\Member;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use App\Orchid\Layouts\Member\MemberEditLayout;
use App\Orchid\Layouts\Member\MemberFiltersLayout;
use App\Orchid\Layouts\Member\MemberListLayout;

class MemberListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'members' => Member::get()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Members';
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
     * @param Member $member
     *
     * @return array
     */
    public function asyncGetMember(Member $member): iterable
    {
        return [
            'member' => $member,
        ];
    }

   /**
     * Views.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            MemberFiltersLayout::class,
            MemberListLayout::class,

            Layout::modal('asyncEditMemberModal', MemberEditLayout::class)
                ->async('asyncGetMember'),
        ];
    }

}
