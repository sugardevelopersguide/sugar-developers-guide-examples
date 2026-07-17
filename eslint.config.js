const js = require('@eslint/js');
const globals = require('globals');

module.exports = [
  js.configs.recommended,
  {
    files: ['eslint.config.js'],
    languageOptions: {
      globals: globals.node,
    },
  },
  {
    files: ['**/*.js'],
    languageOptions: {
      globals: {
        ...globals.browser,
      },
    },
  },
  {
    ignores: ['node_modules/', 'vendor/'],
  },
];
