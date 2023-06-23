<?php

declare(strict_types=1);

use Cortex\Auth\Models\Admin;
use Cortex\Auth\Models\Member;
use Cortex\Auth\Models\Manager;
use Cortex\Oauth\Models\Client;
use Diglactic\Breadcrumbs\Generator;
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('managerarea.cortex.auth.managers.clients', function (Generator $breadcrumbs, Manager $manager) {
    $breadcrumbs->parent('managerarea.cortex.auth.managers.index');
    $breadcrumbs->push(strip_tags($manager->username), route('managerarea.cortex.auth.managers.edit', ['manager' => $manager]));
    $breadcrumbs->push(trans('cortex/oauth::common.clients'), route('managerarea.cortex.auth.managers.clients', ['manager' => $manager]));
});

Breadcrumbs::for('managerarea.cortex.auth.managers.auth_codes', function (Generator $breadcrumbs, Manager $manager) {
    $breadcrumbs->parent('managerarea.cortex.auth.managers.index');
    $breadcrumbs->push(strip_tags($manager->username), route('managerarea.cortex.auth.managers.edit', ['manager' => $manager]));
    $breadcrumbs->push(trans('cortex/oauth::common.auth_codes'), route('managerarea.cortex.auth.managers.auth_codes', ['manager' => $manager]));
});

Breadcrumbs::for('managerarea.cortex.auth.managers.access_tokens', function (Generator $breadcrumbs, Manager $manager) {
    $breadcrumbs->parent('managerarea.cortex.auth.managers.index');
    $breadcrumbs->push(strip_tags($manager->username), route('managerarea.cortex.auth.managers.edit', ['manager' => $manager]));
    $breadcrumbs->push(trans('cortex/oauth::common.access_tokens'), route('managerarea.cortex.auth.managers.access_tokens', ['manager' => $manager]));
});

Breadcrumbs::for('managerarea.cortex.oauth.clients.index', function (Generator $breadcrumbs) {
    $breadcrumbs->parent('managerarea.home');
    $breadcrumbs->push(trans('cortex/oauth::common.clients'), route('managerarea.cortex.oauth.clients.index'));
});

Breadcrumbs::for('managerarea.cortex.oauth.clients.create', function (Generator $breadcrumbs) {
    $breadcrumbs->parent('managerarea.cortex.oauth.clients.index');
    $breadcrumbs->push(trans('cortex/oauth::common.create_client'), route('managerarea.cortex.oauth.clients.create'));
});

Breadcrumbs::for('managerarea.cortex.oauth.clients.edit', function (Generator $breadcrumbs, Client $client) {
    $breadcrumbs->parent('managerarea.cortex.oauth.clients.index');
    $breadcrumbs->push(strip_tags($client->name), route('managerarea.cortex.oauth.clients.edit', ['client' => $client]));
});

Breadcrumbs::for('managerarea.cortex.oauth.clients.auth_codes', function (Generator $breadcrumbs, Client $client) {
    $breadcrumbs->parent('managerarea.cortex.oauth.clients.edit', $client);
    $breadcrumbs->push(trans('cortex/oauth::common.auth_codes'), route('managerarea.cortex.oauth.clients.auth_codes', ['client' => $client]));
});

Breadcrumbs::for('managerarea.cortex.oauth.clients.access_tokens', function (Generator $breadcrumbs, Client $client) {
    $breadcrumbs->parent('managerarea.cortex.oauth.clients.edit', $client);
    $breadcrumbs->push(trans('cortex/oauth::common.access_tokens'), route('managerarea.cortex.oauth.clients.access_tokens', ['client' => $client]));
});
