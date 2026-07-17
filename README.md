# Sugar Developers Guide Examples

Official companion code for the Sugar Developers Guide Substack. Each topic contains
copy-ready, upgrade-safe Sugar customization examples.

## Topics

- [Extension Framework](extension-framework/README.md)
- [Vardefs](vardefs/README.md)
- [Layouts and Views](layouts-and-views/README.md)
- [Logic Hooks](logic-hooks/README.md)
- [Scheduler Jobs](scheduler-jobs/README.md)

## Development tools

```sh
composer install
npm install
```

- `composer format` formats PHP with PHP CS Fixer.
- `composer format:check` checks PHP formatting without changing files.
- `npm run format` formats JavaScript, JSON, and Markdown with Prettier.
- `npm run lint` lints JavaScript with ESLint.
