# Changelog

#v0.3
- Add ability to change locale with `fake('de_DE')`
    > This will add an optional parameter to the `fake()` method to change the locale.
    All previous set provider (which are not depending on locale) will be available.

#v0.2
- Change `Faker` invocation from `getFaker()` to `fake()` to match `Prophet` implementation and `prophesize()`

#v0.1.1

- Resolve issue where `bin/phpunit-seed` didn't find `vendor/autoload.php`
- Change `phpunit` requirement to `^5.0 || ^6.0`

#v0.1
- Initial release