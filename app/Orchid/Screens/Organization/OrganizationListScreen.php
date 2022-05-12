<?php

namespace App\Orchid\Screens\Organization;

use Orchid\Screen\Screen;
use App\Models\Organization;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use App\Orchid\Layouts\Organization\OrganizationEditLayout;
use App\Orchid\Layouts\Organization\OrganizationFiltersLayout;
use App\Orchid\Layouts\Organization\OrganizationListLayout;

class OrganizationListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'organizations' => Organization::get()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Organizations';
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
     * @param Organization $organization
     *
     * @return array
     */
    public function asyncGetOrganization(Organization $organization): iterable
    {
        return [
            'organization' => $organization,
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
            OrganizationFiltersLayout::class,
            OrganizationListLayout::class,

            Layout::modal('asyncEditOrganizationModal', OrganizationEditLayout::class)
                ->async('asyncGetOrganization'),
        ];
    }

}
