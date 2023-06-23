<?php

declare(strict_types=1);

use Cortex\Auth\Models\Manager;
use Cortex\Oauth\Models\Client;
use Rinvex\Menus\Models\MenuItem;
use Rinvex\Menus\Models\MenuGenerator;

Menu::register('managerarea.sidebar', function (MenuGenerator $menu) {
    $menu->findByTitleOrAdd(trans('cortex/oauth::common.oauth'), 60, 'fa fa-lock', 'header', [], [], function (MenuItem $dropdown) {
        $dropdown->route(['managerarea.cortex.oauth.clients.index'], trans('cortex/oauth::common.clients'), 10, 'fa fa-user')->ifCan('list', app('rinvex.oauth.client'))->activateOnRoute('managerarea.cortex.oauth.clients');
    });
});

Menu::register('managerarea.cortex.auth.managers.tabs', function (MenuGenerator $menu, Manager $manager) {
    $menu->route(['managerarea.cortex.auth.managers.clients', ['manager' => $manager]], trans('cortex/oauth::common.clients'))->ifCan('list', app('rinvex.oauth.client'))->if($manager->exists);
    $menu->route(['managerarea.cortex.auth.managers.auth_codes', ['manager' => $manager]], trans('cortex/oauth::common.auth_codes'))->ifCan('list', app('rinvex.oauth.auth_code'))->if($manager->exists);
    $menu->route(['managerarea.cortex.auth.managers.access_tokens', ['manager' => $manager]], trans('cortex/oauth::common.access_tokens'))->ifCan('list', app('rinvex.oauth.access_token'))->if($manager->exists);
});

Menu::register('managerarea.cortex.oauth.clients.tabs', function (MenuGenerator $menu, Client $client) {
    $menu->route(['managerarea.cortex.oauth.clients.create'], trans('cortex/oauth::common.create_client'))->ifCan('create', $client)->if(Route::is('managerarea.cortex.oauth.clients.create'));
    $menu->route(['managerarea.cortex.oauth.clients.edit', ['client' => $client]], trans('cortex/oauth::common.details'))->if($client->exists);
    $menu->route(['managerarea.cortex.oauth.clients.auth_codes', ['client' => $client]], trans('cortex/oauth::common.auth_codes'))->if($client->exists);
    $menu->route(['managerarea.cortex.oauth.clients.access_tokens', ['client' => $client]], trans('cortex/oauth::common.access_tokens'))->if($client->exists);
});
