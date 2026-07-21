# What is `custom-kirby-kit`
Kirby is a lean and fast CMS, shipping with a well managed feature-set to ensure great performance. When building a new website, I usually need a set of plugins and additional features that is mostly the same for all sites. To make my life easier, I’ve created this `custom-kirby-kit`, which includes these modifications already. It builds on the [Kirby CMS composer kit](https://github.com/getkirby/composerkit/).

**ℹ️ Info:** This repository used to be my freelance-website "entspannt.digital". I converted it into this custom kit when I took entspannt.digital offline in order to reuse the code for my portfolio website wenzelmassag.de. I built this kit as the central point to implement features I wish every Kirby installation had, and all my Kirby websites fork it as their basis.

You might find leftovers from this repository’s time as entspannt.digital. If you do, please file an issue or clean them up and send a pull request. Thank you!

## Quick facts
- This repository uses [conventional commits.](https://www.conventionalcommits.org/en/v1.0.0/) If you plan to submit a pull request, please write your commit messages accordingly.
- That’s it for now.

## Documentation of additions and changes
Everything this custom kit does differently from vanilla Kirby is documented below.

### Language Support
Kirby supports [multilingual websites,](https://getkirby.com/docs/guide/languages) but the feature is disabled by default. This kit enables this feature and configures one language: German. This adds complexity, but also some advantages:

1. Kirby uses text-files to store data, not a database. These are named `template-name.txt` for pages and `file-name.ext.txt` for sidecar files, which may contain alt-text for images and more. With translations enabled, Kirby uses different names: `template-name.language.txt` and `file-name.ext.language.txt`. However, when turning on translations, it will _not_ rename existing content files, which means if you have a lot of content, its a lot of manual renaming to get the site working again. I have decided to enable translations from the start for all pages, including those only built in one language, to future-proof them.
2. The translations feature comes with this nifty helper: `t()`. It uses [custom language variables](https://getkirby.com/docs/guide/languages/custom-language-variables), editable in the Panel. Instead of hard-coding strings into templates, and having to repeat yourself, `t()` allows using a customisable set of translated strings in your code. Example: `t('login', "log in")` looks for the key “login” in the translations file, which will result in “anmelden” in German, and fall-back to “log in”, if the key is not found in the translations for the visitor’s selected language.

### Improved Upload Handler
By default, new files uploaded by users have no metadata, unless configured in the blueprint of the Panel page that is used to upload them. The Improved Upload Handler is a plugin. It automatically assigns a blueprint to newly uploaded files, unless it already has one assigned to it. It checks if the Kirby installation is set up with file-blueprints for audio, document, image, or video, and assigns the correct one. It will not assign file-blueprints unless they exist at the time of uploading the file. It also saves which user-account uploaded the file and when into the sidecar-file.

#### Using Custom Language Variable
See also [Custom Language Variables.](https://getkirby.com/docs/guide/languages/custom-language-variables)

- image

#### Metadata Fields
- template (defined by Kirby)
- uploadUser (the user who uploaded the file)
- uploadDate (the date and time with timezone when the file was uploaded in Y-m-d H:i:sP format)

### Markdown Customisations
The default Markdown Parser built into Kirby is replaced with a plugin which builds on [michelf/php-markdown](https://github.com/michelf/php-markdown). The plugin enables Michelf’s Markdown Extra and changes how it renders footnotes. The footnote section has a header, which uses the [language variable](https://getkirby.com/docs/guide/languages/custom-language-variables) `footnotes`.

#### Custom Language Variables used
See also [Custom Language Variables.](https://getkirby.com/docs/guide/languages/custom-language-variables)
- footnotes

### Added support for Feeds
To support adding feeds to websites, this custom kir uses the Kirby plugin [bnomei/kirby3-feed](https://github.com/bnomei/kirby3-feed).

### Added YAML validation for Kirby Blueprints
This repository contains a [YAML Schema for Kirby 4,](https://github.com/bnomei/kirby3-schema) and the configuration files to enable it in any Nova by Panic. Inc installation that uses the YAML extension: nova://extension/?id=robb-j.yaml&name=YAML

### Added support for OpenGraph metadata
The site-page on the panel contains options to set a default OpenGraph image, description, and Fediverse account. They are used in the default template. Additionally, a set of categories can be defined on the site-page, to be used by article-pages.

The article page allows setting an author, publishing date, teaser-text, category, and tags.

## About Kirby’s Composerkit
> **Kirby: the CMS that adapts to any project, loved by developers and editors alike.** The Composerkit is a minimal plainkit for Kirby that uses Composer to manage its dependencies. It uses our recommended public folder setup. All files stored or generated by Kirby, such as content, accounts, cache, sessions, logs, etc., are organised in the data folder. It is the ideal choice if you are already working with Composer and more complex setups and are looking for a solid boilerplate.
>
> You can learn more about Kirby at [getkirby.com](https://getkirby.com).
Quotes from the README.md file included in Kirby’s Composerkit.

### Licenses
#### Kirby Static Site generator
https://github.com/jonathan-reisdorf/kirby-static-site-generator/blob/main/LICENSE.txt

#### The Custom Kirby Kit
© 2025: Wenzel Massag (Entspannt.Digital). See LICENSE file included. Applicable to all features listed under "# Additional Features and Configurations" unless otherwise specified below.

#### Color Extrator
[MIT,](https://github.com/sylvainjule/kirby-colorextractor) © 2024 Sylvian Jule

#### Michelf/php-markdown
[All rights reserved](https://github.com/michelf/php-markdown/blob/lib/License.md) © 2022 Michel Fortin

#### Bnomei/kirby3-feed
[MIT License](https://github.com/bnomei/kirby3-feed/blob/master/LICENSE) © 2019 Bruno Meilick

#### Bnomei’s YAML Schema for Kirby
[MIT License](https://github.com/bnomei/kirby3-schema/blob/main/LICENSE) © 2022 Bruno Meilick

#### Kirby’s Composerkit
[MIT License](https://github.com/getkirby/composerkit/blob/main/LICENSE) © 2025 Kirby Team

#### Kirby CMS
[Kirby License](https://getkirby.com/license) © 2009 Bastian Allgeier
