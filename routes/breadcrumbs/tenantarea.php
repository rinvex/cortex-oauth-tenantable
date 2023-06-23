<?php

declare(strict_types=1);

use Cortex\Oauth\Models\Client;
use Diglactic\Breadcrumbs\Generator;
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('tenantarea.cortex.oauth.clients.index', function (Generator $breadcrumbs) {
    $breadcrumbs->parent('tenantarea.home');
    $breadcrumbs->push(trans('cortex/oauth::common.clients'), route('tenantarea.cortex.oauth.clients.index'));
});

Breadcrumbs::for('tenantarea.cortex.oauth.clients.create', function (Generator $breadcrumbs) {
    $breadcrumbs->parent('tenantarea.cortex.oauth.clients.index');
    $breadcrumbs->push(trans('cortex/oauth::common.create_client'), route('tenantarea.cortex.oauth.clients.create'));
});

Breadcrumbs::for('tenantarea.cortex.oauth.clients.edit', function (Generator $breadcrumbs, Client $client) {
    $breadcrumbs->parent('tenantarea.cortex.oauth.clients.index');
    $breadcrumbs->push(strip_tags($client->name), route('tenantarea.cortex.oauth.clients.edit', ['client' => $client]));
});

Breadcrumbs::for('tenantarea.cortex.oauth.clients.auth_codes', function (Generator $breadcrumbs, Client $client) {
    $breadcrumbs->parent('tenantarea.cortex.oauth.clients.edit', $client);
    $breadcrumbs->push(trans('cortex/oauth::common.auth_codes'), route('tenantarea.cortex.oauth.clients.auth_codes', ['client' => $client]));
});

Breadcrumbs::for('tenantarea.cortex.oauth.clients.access_tokens', function (Generator $breadcrumbs, Client $client) {
    $breadcrumbs->parent('tenantarea.cortex.oauth.clients.edit', $client);
    $breadcrumbs->push(trans('cortex/oauth::common.access_tokens'), route('tenantarea.cortex.oauth.clients.access_tokens', ['client' => $client]));
});
