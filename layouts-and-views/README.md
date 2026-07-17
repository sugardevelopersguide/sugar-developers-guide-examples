# Layouts and Views

Examples for customizing Sidecar layouts, views, and related client-side files.

The `custom/` directory mirrors Sugar's deployment paths.

## Extracted examples

Examples from [Layouts and Views | Part II](https://sugardevelopersguide.substack.com/p/layouts-and-views-part-ii):

- `custom/modules/Accounts/clients/base/views/record/` adds an Accounts panel,
  header button, and Sidecar event handler.
- `custom/modules/JobQueue/clients/base/` defines a custom kickoff layout,
  navigation item, controller, and Handlebars template.

The JobQueue examples require a `JobQueue` module and its `kickoffOptions` API;
replace those dependencies when adapting them to another module.

`custom/Extension/modules/Accounts/Ext/Dependencies/hide_panels_based_upon_record_type.php`
comes from [What's the Simplest Thing I Can Do?](https://sugardevelopersguide.substack.com/p/whats-the-simplest-thing-i-can-do).
Replace the record-type IDs and panel labels with values from your instance.

## Build a Module Loadable Package

```sh
php bin/pack.php layouts-and-views 26.7.0
```

The archive is written to `layouts-and-views/builds/`.
