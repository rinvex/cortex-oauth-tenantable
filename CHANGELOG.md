# Cortex OAuth Change Log

All notable changes to this project will be documented in this file.

This project adheres to [Semantic Versioning](CONTRIBUTING.md).


## [v4.1.0] - 2023-05-02
- aa4bc91: Add support for Laravel v11, and drop support for Laravel v9
- 6d5e610: Upgrade league/oauth2-server to v8.5 from v8.3
- 45d0eff: Upgrade nyholm/psr7 to v1.7 from v1.5
- acb5737: Upgrade yajra/laravel-datatables-oracle to v10.4 from v10.0
- c11eb54: Upgrade yajra/laravel-datatables-html to v10.0 from v9.0
- 327b1dd: Upgrade yajra/laravel-datatables-buttons to v10.0 from v9.0
- ca80c22: Upgrade proengsoft/laravel-jsvalidation to v4.8 from v4.7
- fd0bcf6: Upgrade spatie/laravel-activitylog to v4.7 from v4.4
- 7a6fc50: Update yajra/laravel-datatables-fractal to v10.0 from v9.0
- 450163c: Update phpunit to v10.1 from v9.5

## [v4.0.1] - 2023-01-10
- Fix user identifier to be like that 'admin:123' where admin is user_type & 123 is user_id

## [v4.0.0] - 2023-01-09
- Drop PHP v8.0 support and update composer dependencies
- Move Relation::morphMap to vendor core package
- Utilize PHP 8.1 attributes feature for artisan commands

## [v3.2.9] - 2022-12-30
- Whitelist datatable columns to avoid invalid columns sent from client-side which might be a security issue in some scenarios

## [v3.2.8] - 2022-10-03
- Move SetAuthDefaults middleware to cortex/auth from cortex/foundation

## [v3.2.7] - 2022-08-30
- Clean the breadcrumbs definition and utilize parent features

## [v3.2.6] - 2022-07-24
- Fix datatables checkbox select-row options
- Add missing export ability
- Refactor datatables bulk actions and check if action is enabled and authorized

## [v3.2.5] - 2022-07-02
- Fix transformer compatibility with fractal

## [v3.2.4] - 2022-06-22
- Fix datatables ajax method signature

## [v3.2.3] - 2022-06-20
- Update composer dependencies
  - league/fractal to ^0.20.0 from ^0.19.0
  - yajra/laravel-datatables-html to ^9.0.0 from ^4.41.0
  - yajra/laravel-datatables-fractal to ^9.0.0 from ^1.6.0
  - yajra/laravel-datatables-buttons to ^9.0.0 from ^4.13.0
  - yajra/laravel-datatables-oracle to ^10.0.0 from ^9.19.0

## [v3.2.2] - 2022-05-17
- Add support for menu list item attributes

## [v3.2.1] - 2022-03-12
- Update composer dependency codedungeon/phpunit-result-printer
- Add datatables routePrefix support

## [v3.2.0] - 2022-02-14
- Use PHP v8 nullsafe operator
- Update composer dependencies to Laravel v9
- Override the configurable models
- Move Relations::morphMap and RateLimiter to module bootstrap
- Fix broadcasts naming convensions
- Update routes to use class based definitions
- Drop using useless complex string variable syntax

## [v3.1.2] - 2021-10-22
- Refactor route domain variables to be accessarea specific
- Update .styleci.yml fixers

## [v3.1.1] - 2021-10-11
- Rename route parameter 'central_domain' to 'routeDomain'

## [v3.1.0] - 2021-08-22
- Drop PHP v7 support, and upgrade rinvex package dependencies to next major version

## [v3.0.1] - 2021-08-18
- Update composer dependency cortex/foundation to v7

## [v3.0.0] - 2021-08-18
- Breaking Change: Update composer dependency cortex/auth to v8
- Register routes to either central or tenant domains
- Move route binding, patterns, and middleware to module bootstrap

## [v2.0.17] - 2021-08-07
- Upgrade spatie/laravel-activitylog to v4

## [v2.0.16] - 2021-08-06
- Simplify route prefixes
- Enforce request()->get() method usage consistency
- Fix wrong middleware spelling
- Update composer dependencies
- Update codedungeon/phpunit-result-printer requirement

## [v2.0.15] - 2021-06-20
- Fix namespace naming convention

## [v2.0.14] - 2021-05-25
- Replace deprecated `Breadcrumbs::register` with `Breadcrumbs::for`
- Update composer dependencies diglactic/laravel-breadcrumbs to v7

## [v2.0.13] - 2021-05-24
- Drop common blade views in favor for accessarea specific views
- Remove duplicate button options, it's already merged from default config

## [v2.0.12] - 2021-05-07
- Upgrade to GitHub-native Dependabot
- Rename migrations to always run after rinvex core packages

## [v2.0.11] - 2021-03-15
- fix create member, admin and manager
- Remove oauth 'authorizations.' route name prefix

## [v2.0.10] - 2021-03-02
- Autoload artisan commands

## [v2.0.9] - 2021-03-02
- Fix user parsed scopes for API authorization request
- Change middleware order

## [v2.0.8] - 2021-02-28
- Whitelist ussueToken method from middleware
- Enforce consistency
- Append `SetAuthDefaults` middleware on `api` middleware group
- Simplify and utilize request()->user() and request()->guard()
- Use overridden `FormRequest` instead of native class
- Rename `id` column to `identifier` for refresh token, access token, and auth codes, and drop primary index, just make unique
- Add timestamps for refresh token, access token, and auth codes
- Add missing menu permissions
- Fix parent controller for AuthorizationController
- Fix authorized controllers to use abilities correctly
- Remove useless obscure features from models since the primary ids are hashed already (not numeric anyway)
- Register middleware
- Enforce consistency
- Refactor "scopes" and use "abilities" instead
- Refactor provider to user_type

## [v2.0.7] - 2021-02-11
- Expect hashed client ID, and resolve it
- Fix user provider features and conventions
- Simplify datatables ResourceUserScope
- Fix wrong datatables route names
- Refactor broadcasting channels
- Replace form timestamps with common blade view

## [v2.0.6] - 2021-02-07
- Replace silber/bouncer package with custom modified tmp version
- Generate encryption keys and create personal access & password clients on installation
- Skip publishing module resources unless explicitly specified, for simplicity

## [v2.0.5] - 2021-01-15
- Add model replication feature

## [v2.0.4] - 2021-01-02
- Move cortex:autoload & cortex:activate commands to cortex/foundation module responsibility

## [v2.0.3] - 2021-01-01
- Move cortex:autoload & cortex:activate commands to cortex/foundation module responsibility
  - This is because :autoload & :activate commands are registered only if the module already autoloaded, so there is no way we can execute commands of unloaded modules
  - cortex/foundation module is always autoloaded, so it's the logical and reasonable place to register these :autoload & :activate module commands and control other modules from outside

## [v2.0.2] - 2020-12-31
- Rename seeders directory
- Enable StyleCI risky mode
- Add module activate, deactivate, autoload, unload artisan commands

## [v2.0.1] - 2020-12-25
- Add support for PHP v8

## [v2.0.0] - 2020-12-22
- Upgrade to Laravel v8
- Add missing composer dependency
- Merge tag 'v1.0.1' into develop

## [v1.0.1] - 2020-12-12
- Move example usage routes to README
- Fix wrong route method
- Update composer dependencies
- Fix code style & enforce consistency

## v1.0.0 - 2020-12-12
- Tag first release

[v4.1.0]: https://github.com/rinvex/cortex-oauth/compare/4.0.1...v4.1.0
[v4.0.1]: https://github.com/rinvex/cortex-oauth/compare/4.0.0...v4.0.1
[v4.0.0]: https://github.com/rinvex/cortex-oauth/compare/v3.2.9...v4.0.0
[v3.2.9]: https://github.com/rinvex/cortex-oauth/compare/v3.2.8...v3.2.9
[v3.2.8]: https://github.com/rinvex/cortex-oauth/compare/v3.2.7...v3.2.8
[v3.2.7]: https://github.com/rinvex/cortex-oauth/compare/v3.2.6...v3.2.7
[v3.2.6]: https://github.com/rinvex/cortex-oauth/compare/v3.2.5...v3.2.6
[v3.2.5]: https://github.com/rinvex/cortex-oauth/compare/v3.2.4...v3.2.5
[v3.2.4]: https://github.com/rinvex/cortex-oauth/compare/v3.2.3...v3.2.4
[v3.2.3]: https://github.com/rinvex/cortex-oauth/compare/v3.2.2...v3.2.3
[v3.2.2]: https://github.com/rinvex/cortex-oauth/compare/v3.2.1...v3.2.2
[v3.2.1]: https://github.com/rinvex/cortex-oauth/compare/v3.2.0...v3.2.1
[v3.2.0]: https://github.com/rinvex/cortex-oauth/compare/v3.1.2...v3.2.0
[v3.1.2]: https://github.com/rinvex/cortex-oauth/compare/v3.1.1...v3.1.2
[v3.1.1]: https://github.com/rinvex/cortex-oauth/compare/v3.1.0...v3.1.1
[v3.1.0]: https://github.com/rinvex/cortex-oauth/compare/v3.0.1...v3.1.0
[v3.0.1]: https://github.com/rinvex/cortex-oauth/compare/v3.0.0...v3.0.1
[v3.0.0]: https://github.com/rinvex/cortex-oauth/compare/v2.0.17...v3.0.0
[v2.0.17]: https://github.com/rinvex/cortex-oauth/compare/v2.0.16...v2.0.17
[v2.0.16]: https://github.com/rinvex/cortex-oauth/compare/v2.0.15...v2.0.16
[v2.0.15]: https://github.com/rinvex/cortex-oauth/compare/v2.0.14...v2.0.15
[v2.0.14]: https://github.com/rinvex/cortex-oauth/compare/v2.0.13...v2.0.14
[v2.0.13]: https://github.com/rinvex/cortex-oauth/compare/v2.0.12...v2.0.13
[v2.0.12]: https://github.com/rinvex/cortex-oauth/compare/v2.0.11...v2.0.12
[v2.0.11]: https://github.com/rinvex/cortex-oauth/compare/v2.0.10...v2.0.11
[v2.0.10]: https://github.com/rinvex/cortex-oauth/compare/v2.0.9...v2.0.10
[v2.0.9]: https://github.com/rinvex/cortex-oauth/compare/v2.0.8...v2.0.9
[v2.0.8]: https://github.com/rinvex/cortex-oauth/compare/v2.0.7...v2.0.8
[v2.0.7]: https://github.com/rinvex/cortex-oauth/compare/v2.0.6...v2.0.7
[v2.0.6]: https://github.com/rinvex/cortex-oauth/compare/v2.0.5...v2.0.6
[v2.0.5]: https://github.com/rinvex/cortex-oauth/compare/v2.0.4...v2.0.5
[v2.0.4]: https://github.com/rinvex/cortex-oauth/compare/v2.0.3...v2.0.4
[v2.0.3]: https://github.com/rinvex/cortex-oauth/compare/v2.0.2...v2.0.3
[v2.0.2]: https://github.com/rinvex/cortex-oauth/compare/v2.0.1...v2.0.2
[v2.0.1]: https://github.com/rinvex/cortex-oauth/compare/v2.0.0...v2.0.1
[v2.0.0]: https://github.com/rinvex/cortex-oauth/compare/v1.0.1...v2.0.0
[v1.0.1]: https://github.com/rinvex/cortex-oauth/compare/v1.0.0...v1.0.1
