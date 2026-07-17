# Extension Framework

Copy-ready examples from [The Extension Framework Explained](https://sugardevelopersguide.substack.com/p/the-extension-framework-explained).
Run a Quick Repair and Rebuild after deploying files beneath `custom/Extension/`.
Never edit Sugar's compiled `*.ext.php` files.

## Examples

- `custom/Extension/modules/Contacts/Ext/Vardefs/audit_core_field.php` audits the
  core Contacts `phone_office` field.
- `custom/Extension/modules/SchedulersJobs/Ext/LogicHooks/job_failure.php`
  registers a `job_failure` logic hook.
- `custom/modules/SchedulersJobs/LogicHooks/SchedulersJobsLogicHooks.php`
  supplies the autoloaded hook class. Its example implementation logs a final
  failure; replace it with your notification delivery logic.
- `custom/Extension/application/Ext/Include/amaiza_Substack.php` registers a
  custom module bean.
- `custom/Extension/modules/Administration/Ext/Administration/amaiza_Substack.php`
  adds an Administration section and external link.
- `custom/Extension/modules/Administration/Ext/Language/en_us.amaiza_Substack.php`
  defines the labels used by the Administration example.
- `package/contact-priority/` is a Module Loadable Package that adds the
  `custom_priority_c` Contact field, its label, and its dropdown options.
- `examples/incorrect-custom-field-vardef.php` is the intentionally invalid
  plain-vardef approach from the article. Do not deploy it.

The article does not include the hook implementation class or the dropdown
options required by its package. This repository includes minimal versions so
the examples can be installed and executed.

## Build a Module Loadable Package

Build an installable archive from this example's `custom/` sources and Contact
Priority package metadata:

```sh
php bin/pack.php extension-framework 26.7.0
```

The archive is written to `extension-framework/builds/`. Its package version is
the supplied argument and it accepts Sugar 26.x Enterprise, Professional, and
Ultimate installations.
