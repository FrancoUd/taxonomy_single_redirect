# Taxonomy Single Redirect

A professional Drupal module that automatically redirects taxonomy term pages to the associated content (node) if only one item is tagged with that term.

## Features

* Dynamic Field Detection: Scans all entity_reference fields targeting taxonomy terms.
* Cache Management: Uses node_list cache tags for instant updates when content changes.
* SEO & UX Friendly: Uses 302 redirects to prevent browser caching issues during development.
* Admin Interface: Toggle the functionality via a dedicated settings page.

## Installation

### Via Composer (Recommended)

Since this module is hosted on GitHub, add the repository to your project's composer.json first:

```bash
composer config repositories.taxonomy_single_redirect vcs https://github.com/francoud/taxonomy_single_redirect
```

Then, install the module:

```bash
composer require francoud/taxonomy_single_redirect
```

### Manual Installation

1. Download or clone the repository into your modules/custom/ folder.
2. Ensure the folder name is exactly taxonomy_single_redirect.
3. Enable the module via the Drupal admin UI or using Drush:
   'drush en taxonomy_single_redirect'

## Uninstallation
To completely remove the module and its repository reference from your project, follow these steps:

1. **Uninstall the module** in Drupal (via Admin UI or Drush):
   `drush pmu taxonomy_single_redirect -y`

2. **Remove the module files** using Composer:
   `composer remove francoud/taxonomy_single_redirect`

3. **Remove the GitHub repository reference** from your composer.json:
   `composer config --unset repositories.taxonomy-single-redirect`

## Configuration

1. Navigate to Configuration > Search and metadata > Taxonomy Single Redirect (/admin/config/search/taxonomy-single-redirect).
2. Check the Enable automatic redirect box.
3. Save the configuration and clear the cache: drush cr.

## Technical Details

The module hooks into the entity view process and performs a precise query using .target_id to ensure no false positives from other reference fields (like authors or files).

## Maintainers
**Francesco Brunetta** -  [franco.brunetta@gmail.com](mailto:franco.brunetta@gmail.com)

## License

GPL-2.0-or-later


