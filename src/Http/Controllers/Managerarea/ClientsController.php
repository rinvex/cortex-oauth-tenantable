<?php

declare(strict_types=1);

namespace Cortex\Oauth\Http\Controllers\Managerarea;

use Cortex\Oauth\Models\Client;
use Cortex\Foundation\Http\FormRequest;
use Cortex\Oauth\DataTables\Managerarea\ClientsDataTable;
use Cortex\Oauth\DataTables\Managerarea\AuthCodesDataTable;
use Cortex\Oauth\Http\Requests\Managerarea\ClientFormRequest;
use Cortex\Foundation\Http\Controllers\AuthorizedController;
use Cortex\Oauth\DataTables\Managerarea\AccessTokensDataTable;
use Cortex\Oauth\Http\Requests\Managerarea\ClientFormPostRequest;

class ClientsController extends AuthorizedController
{
    /**
     * {@inheritdoc}
     */
    protected $resource = 'rinvex.oauth.models.client';

    /**
     * Get all clients for the authenticated user.
     *
     * @TODO: Add missing pusher to all needed datatables below.
     *
     * @param \Cortex\Oauth\DataTables\Managerarea\ClientsDataTable $clientsDataTable
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(ClientsDataTable $clientsDataTable)
    {
        return $clientsDataTable->with([
            'show_user' => false,
            'id' => 'managerarea-cortex-oauth-clients-index',
            'routePrefix' => 'managerarea.cortex.oauth.clients',
            'pusher' => ['entity' => 'client', 'channel' => 'cortex.oauth.clients.index'],
        ])->render('cortex/foundation::managerarea.pages.datatable-index');
    }

    /**
     * Get all auth codes for the given client.
     *
     * @param \Cortex\Oauth\DataTables\Managerarea\AuthCodesDataTable $clientsDataTable
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function authCodes(Client $client, AuthCodesDataTable $clientsDataTable)
    {
        return $clientsDataTable->with([
            'show_client' => false,
            'tabs' => 'managerarea.cortex.oauth.clients.tabs',
            'id' => "managerarea-cortex-auth-users-{$client->getRouteKey()}-auth-codes",
        ])->render('cortex/foundation::managerarea.pages.datatable-tab');
    }

    /**
     * Get all access tokens for the given client.
     *
     * @param \Cortex\Oauth\DataTables\Managerarea\AccessTokensDataTable $accessTokensDataTable
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function accessTokens(Client $client, AccessTokensDataTable $accessTokensDataTable)
    {
        return $accessTokensDataTable->with([
            'show_client' => false,
            'tabs' => 'managerarea.cortex.oauth.clients.tabs',
            'id' => "managerarea-cortex-auth-users-{$client->getRouteKey()}-access-tokens",
        ])->render('cortex/foundation::managerarea.pages.datatable-tab');
    }

    /**
     * Create new client.
     *
     * @param \Cortex\Oauth\Http\Requests\Managerarea\ClientFormRequest $request
     * @param \Cortex\Oauth\Models\Client                             $client
     *
     * @return \Illuminate\View\View
     */
    public function create(ClientFormRequest $request, Client $client)
    {
        return $this->form($request, $client);
    }

    /**
     * Edit given client.
     *
     * @param \Cortex\Oauth\Http\Requests\Managerarea\ClientFormRequest $request
     * @param \Cortex\Oauth\Models\Client                             $client
     *
     * @return \Illuminate\View\View
     */
    public function edit(ClientFormRequest $request, Client $client)
    {
        return $this->form($request, $client);
    }

    /**
     * Show client create/edit form.
     *
     * @param \Cortex\Foundation\Http\FormRequest $request
     * @param \Cortex\Oauth\Models\Client         $client
     *
     * @return \Illuminate\View\View
     */
    protected function form(FormRequest $request, Client $client)
    {
        $grantTypes = [
            'authorization_code' => trans('cortex/oauth::common.authorization_code'),
            'client_credentials' => trans('cortex/oauth::common.client_credentials'),
            'personal_access' => trans('cortex/oauth::common.personal_access'),
            'password' => trans('cortex/oauth::common.password'),
        ];

        return view('cortex/oauth::managerarea.pages.client', compact('client', 'grantTypes'));
    }

    /**
     * Store new client.
     *
     * @param \Cortex\Oauth\Http\Requests\Managerarea\ClientFormPostRequest $request
     * @param \Cortex\Oauth\Models\Client                                 $client
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(ClientFormPostRequest $request, Client $client)
    {
        return $this->process($request, $client);
    }

    /**
     * Update given client.
     *
     * @param \Cortex\Oauth\Http\Requests\Managerarea\ClientFormPostRequest $request
     * @param \Cortex\Oauth\Models\Client                                 $client
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(ClientFormPostRequest $request, Client $client)
    {
        return $this->process($request, $client);
    }

    /**
     * Process stored/updated client.
     *
     * @param \Cortex\Foundation\Http\FormRequest $request
     * @param \Cortex\Oauth\Models\Client         $client
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function process(FormRequest $request, Client $client)
    {
        // Prepare required input fields
        $data = $request->validated();

        // Save client
        $client->fill($data)->save();

        return intend([
            'url' => route('managerarea.cortex.oauth.clients.index'),
            'with' => ['success' => $client->wasRecentlyCreated
                ? trans('cortex/oauth::messages.client_created', ['identifier' => $client->getRouteKey(), 'secret_phrase' => $client->secret ? trans('cortex/oauth::messages.secret_phrase', ['secret' => $client->plainSecret]) : null])
                : trans('cortex/oauth::messages.client_updated', ['identifier' => $client->getRouteKey()]),
            ],
        ]);
    }

    /**
     * Destroy given page.
     *
     * @param \Cortex\Oauth\Http\Requests\Managerarea\ClientFormRequest $request
     * @param \Cortex\Oauth\Models\Client                             $client
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(ClientFormRequest $request, Client $client)
    {
        $client->delete();

        return intend([
            'url' => route('managerarea.cortex.oauth.clients.index'),
            'with' => ['warning' => trans('cortex/foundation::messages.resource_deleted', ['resource' => trans('cortex/oauth::common.client'), 'identifier' => $client->getRouteKey()])],
        ]);
    }

    /**
     * Revoke given page.
     *
     * @param \Cortex\Oauth\Http\Requests\Managerarea\ClientFormRequest $request
     * @param \Cortex\Oauth\Models\Client                             $client
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function revoke(ClientFormRequest $request, Client $client)
    {
        $client->revoke();

        return intend([
            'url' => route('managerarea.cortex.oauth.clients.index'),
            'with' => ['warning' => trans('cortex/foundation::messages.resource_revoked', ['resource' => trans('cortex/oauth::common.client'), 'identifier' => $client->getRouteKey()])],
        ]);
    }
}
