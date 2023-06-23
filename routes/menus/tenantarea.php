<?php

declare(strict_types=1);

use Cortex\Oauth\Models\Client;
use Rinvex\Menus\Models\MenuGenerator;

Menu::register('tenantarea.cortex.auth.account.sidebar', function (MenuGenerator $menu) {
    $menu->route(['tenantarea.cortex.oauth.clients.index'], trans('cortex/oauth::common.clients'), null, 'fa fa-user')->activateOnRoute('tenantarea.cortex.oauth.clients');
});

Menu::register('tenantarea.cortex.oauth.clients.tabs', function (MenuGenerator $menu, Client $client) {
    $menu->route(['tenantarea.cortex.oauth.clients.create'], trans('cortex/oauth::common.create_client'))->if(Route::is('tenantarea.cortex.oauth.clients.create'));
    $menu->route(['tenantarea.cortex.oauth.clients.edit', ['client' => $client]], trans('cortex/oauth::common.details'))->if($client->exists);
    $menu->route(['tenantarea.cortex.oauth.clients.auth_codes', ['client' => $client]], trans('cortex/oauth::common.auth_codes'))->if($client->exists);
    $menu->route(['tenantarea.cortex.oauth.clients.access_tokens', ['client' => $client]], trans('cortex/oauth::common.access_tokens'))->if($client->exists);
});
