# edspc/composer-ignore-platform-req-env-plugin
##### Add environment variables to ignore platform-req.
___

### Installation:
**Requires Composer 2.**

Install globally:
```shell
composer global require edspc/ignore-env-composer-plugin
```
___
This plugin adds functionality to ignore platform requirements (`php`, `hhvm`, `lib-*` and `ext-*`) for `require`, `update`, `install` operations.

It works just like options `--ignore-platform-reqs` or `--ignore-platform-req` for those ops.

**Env variable name** – `COMPOSER_IGNORE_PLATFORM_REQ`.\
Possible values:
- `1`, `all`, `full` – ignoring ALL requirements;
- space-separated string of requirements to ignore.
