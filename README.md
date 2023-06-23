# Cortex OAuth

**Cortex OAuth** is a frontend layer for the OAuth server Laravel package, for API management.

[![Packagist](https://img.shields.io/packagist/v/cortex/oauth.svg?label=Packagist&style=flat-square)](https://packagist.org/packages/cortex/oauth)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/rinvex/cortex-oauth.svg?label=Scrutinizer&style=flat-square)](https://scrutinizer-ci.com/g/rinvex/cortex-oauth/)
[![Travis](https://img.shields.io/travis/rinvex/cortex-oauth.svg?label=TravisCI&style=flat-square)](https://travis-ci.org/rinvex/cortex-oauth)
[![StyleCI](https://styleci.io/repos/93621990/shield)](https://styleci.io/repos/93621990)
[![License](https://img.shields.io/packagist/l/cortex/oauth.svg?label=License&style=flat-square)](https://github.com/rinvex/cortex-oauth/blob/develop/LICENSE)


## Installation and Usage

This is a **[Rinvex Cortex](https://github.com/rinvex/cortex)** module, that's still not yet documented, but you can use it on your own responsibility.

To be documented soon..!

### Example Usage

```PHP
Route::middleware(['web'])->get('adminarea/oauth/redirect', function (\Illuminate\Http\Request $request) {
    $request->session()->put('state', $state = \Str::random(40));

    $query = http_build_query([
        'client_id' => '51',
        'redirect_uri' => 'http://cortex.rinvex.test/adminarea/oauth/callback',
        'response_type' => 'code',
        'scope' => 'place-orders check-status',
        'state' => $state,
    ]);

    return redirect('http://cortex.rinvex.test/adminarea/oauth/authorize?'.$query);
});

Route::middleware(['web'])->get('adminarea/oauth/callback', function (\Illuminate\Http\Request $request) {
    $state = $request->session()->pull('state');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );

    //dd($request->code);
    // For easy testing, we can temporary change `Route::post('token')` to `Route::get('token')`
    //return redirect('http://cortex.rinvex.test/adminarea/oauth/token?'.http_build_query([
    //        'grant_type' => 'authorization_code',
    //        'client_id' => '51',
    //        'client_secret' => 'bLGQa2fTqzVSonJvyT5CzHDD1JNEUevUm2esqVIy',
    //        'redirect_uri' => 'http://cortex.rinvex.test/adminarea/oauth/callback',
    //        'code' => $request->code,
    //    ]));

    $http = new GuzzleHttp\Client;

    $response = $http->post('http://cortex.rinvex.test/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '48',
            'client_secret' => 'bLGQa2fTqzVSonJvyT5CzHDD1JNEUevUm2esqVIy',
            'redirect_uri' => 'http://cortex.rinvex.test/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});
```

## Changelog

Refer to the [Changelog](CHANGELOG.md) for a full history of the project.


## Support

The following support channels are available at your fingertips:

- [Chat on Slack](https://bit.ly/rinvex-slack)
- [Help on Email](mailto:help@rinvex.com)
- [Follow on Twitter](https://twitter.com/rinvex)


## Contributing & Protocols

Thank you for considering contributing to this project! The contribution guide can be found in [CONTRIBUTING.md](CONTRIBUTING.md).

Bug reports, feature requests, and pull requests are very welcome.

- [Versioning](CONTRIBUTING.md#versioning)
- [Pull Requests](CONTRIBUTING.md#pull-requests)
- [Coding Standards](CONTRIBUTING.md#coding-standards)
- [Feature Requests](CONTRIBUTING.md#feature-requests)
- [Git Flow](CONTRIBUTING.md#git-flow)


## Security Vulnerabilities

If you discover a security vulnerability within this project, please send an e-mail to [security@rinvex.com](security@rinvex.com). All security vulnerabilities will be promptly addressed.


## About Rinvex

Rinvex is a software solutions startup, specialized in integrated enterprise solutions for SMEs established in Alexandria, Egypt since June 2016. We believe that our drive The Value, The Reach, and The Impact is what differentiates us and unleash the endless possibilities of our philosophy through the power of software. We like to call it Innovation At The Speed Of Life. That’s how we do our share of advancing humanity.


## License

This software is released under [The MIT License (MIT)](LICENSE).

(c) 2016-2022 Rinvex LLC, Some rights reserved.
