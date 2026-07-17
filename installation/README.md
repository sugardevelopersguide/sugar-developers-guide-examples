# Installation

Examples for configuring a Sugar installation.

## Silent installation

`examples/config_si.php` is a sanitized silent-installer configuration from
[Installing Sugar](https://sugardevelopersguide.substack.com/p/installing-sugar),
adapted to include standard database, logging, and Elasticsearch settings.
Copy it to the Sugar application root as `config_si.php`, replace every
placeholder, and protect it as a secret because it contains credential fields.

Application-specific database managers, service endpoints, cache configuration,
and post-install settings belong in your project's private configuration—not in
this portable example.

Do not commit a configured `config_si.php` file.
