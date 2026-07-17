# Vardefs

Examples for adding and extending Sugar module metadata.

- `custom/` contains files ready to copy into Sugar.
- `examples/` contains focused reference implementations.

## Extracted examples

Examples from [Vardefs Deep Dive: Fields, Relationships, and Schema
Control](https://sugardevelopersguide.substack.com/p/vardefs-deep-dive-fields-relationships):

- `custom/Extension/modules/MyModule/Ext/Vardefs/mail_tracking_number.php`
  adds a module-owned tracking field.
- `custom/Extension/modules/MyModule/Ext/Vardefs/sugarfield_mail_tracking_number.php`
  overrides an existing Studio or Module Loadable Package field.
- `custom/Extension/application/Ext/Language/en_us.payment_status.php` registers
  the `payment_status_list` dropdown.

Replace `MyModule` and its field labels with values from your target module, then
run Quick Repair and Rebuild.

## Build a Module Loadable Package

```sh
php bin/pack.php vardefs 26.7.0
```

The archive is written to `vardefs/builds/`.
