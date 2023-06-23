<?php

declare(strict_types=1);

use Illuminate\Contracts\Auth\Access\Authorizable;

Broadcast::channel('cortex.auth.managers.clients', function (Authorizable $user) {
    return $user->can('list', app('rinvex.oauth.client'));
});

Broadcast::channel('cortex.auth.managers.auth_codes', function (Authorizable $user) {
    return $user->can('list', app('rinvex.oauth.auth_code'));
});

Broadcast::channel('cortex.auth.managers.access_tokens', function (Authorizable $user) {
    return $user->can('list', app('rinvex.oauth.access_token'));
});
