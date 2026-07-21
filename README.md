# What is `custom-kirby-kit`
[Kirby is a lean and fast CMS,](https://getkirby.com/) shipping with a well managed feature-set to ensure great performance. To publish a site with Kirby, you need to purchase a license; this repository is a personal side-project and not part of Kirby. When building a new website, I usually need a set of plugins and additional features that is mostly the same for all sites. To make my life easier, I’ve created this `custom-kirby-kit`, which includes the modifications I always apply in all my Kirby projects. It builds on the [Kirby CMS composer kit.](https://github.com/getkirby/composerkit/)

**ℹ️ Info:** This repository used to be my freelance-website "entspannt.digital". I converted it into this custom kit when I took entspannt.digital offline in order to reuse the code for my portfolio website wenzelmassag.de. I built this kit as the central point to implement features I wish every Kirby installation had, and all my Kirby websites fork it as their basis.

You might find leftovers from this repository’s time as entspannt.digital. If you do, please file an issue or clean them up and send a pull request. Thank you!

## Quick facts
- This repository uses [git lfs.](https://git-lfs.com) Before cloning, you must install it on your workstation!
- This repository uses [conventional commits.](https://www.conventionalcommits.org/en/v1.0.0/) If you plan to submit a pull request, please write your commit messages accordingly.
- To use this kit, I recommend you fork or clone this repository, depending on whether you wish to be able to pull in changes I make in the future. You also need to familiarise yourself with the [Kirby CMS composer kit.](https://github.com/getkirby/composerkit/)

## Documentation of additions and changes
Everything this custom kit does differently from vanilla Kirby is documented below.

### Language Support
Kirby supports [multilingual websites,](https://getkirby.com/docs/guide/languages) but the feature is disabled by default. This kit enables this feature and configures one language: German. This adds complexity, but also some advantages:

1. Kirby uses text-files to store data, not a database. These are named `template-name.txt` for pages and `file-name.extension.txt` for sidecar files storing metadata of uploaded assets, such as alt-text for an image. With translations enabled, Kirby uses different names: `template-name.language.txt` and `file-name.extension.language.txt`. However, when turning on translations, it will _not_ rename existing files, which means if you have a lot of content, its a lot of manual renaming to get the site working again. I have decided to enable translations from the start for all pages, including those only built in one language, to future-proof them.
2. The translations feature comes with this nifty helper: `t()`. It uses [custom language variables](https://getkirby.com/docs/guide/languages/custom-language-variables), editable in the Panel. Instead of hard-coding strings into templates, and having to repeat yourself, `t()` allows using a customisable set of translated strings in your code.

**👉 Example:** `t('example', "example")` looks for the key “example” in the currently active language-file and global-configuration-file. For German this will result in “Beispiel”. `t()` uses the second parameter as fall-back, in no translation is available.

### Improved Upload Handler
By default, new files uploaded by users have no metadata, unless configured in the blueprint of the Panel page that is used to upload them. The Improved Upload Handler is a plugin. It automatically assigns a blueprint to newly uploaded files, unless it already has one assigned to it. It checks if the Kirby installation is set up with file-blueprints for audio, document, image, or video, and assigns the correct one. It will not assign file-blueprints unless they exist at the time of uploading the file. It also saves which user-account uploaded the file, and when, into the sidecar-file.

### Improved Markdown rendering
To render footnotes from Markdown files nicely, I’ve replaced Kirby’s markdown parser with [michelf/php-markdown](https://github.com/michelf/php-markdown) and configured some changes. I bundled this into the plugin "custom-markdown". The plugin renders footnotes at the end of the markdown-block and uses the custom language variable `footnotes` to add a headline above them.

Licensing info: [All rights reserved © 2022 Michel Fortin](https://github.com/michelf/php-markdown/blob/lib/License.md)

### Added support for Feeds
To support feeds (RSS, Atom, and JSON), the Kirby plugin [bnomei/kirby3-feed](https://github.com/bnomei/kirby3-feed) comes pre-installed with this kit. To add a feed, create a new page and select the "feed"-template. The field 'childrenOf' may be used to define the page of which the children should be added to the feed. If left empty, the feed will contain the children of the feed-page’s parent page.

**⚠️ Warning:** Currently, this kit does not contain a feed-blueprint, so you’ll have to create the feed-page manually and can’t use the Panel for that. [See issue #15 for more information.](https://codeberg.org/Entspannt-Digital/custom-kirby-kit/issues/15)

**👉 Example:**: Create a page of type "feed" as a blog-post. This will add a feed listing the last ten published blog-posts.

Licensing info: [MIT License © 2019 Bruno Meilick](https://github.com/bnomei/kirby3-feed/blob/master/LICENSE)

### Added support for OpenGraph metadata
The site-page on the panel contains options to set a default OpenGraph image, description, and Fediverse account, which will be used for OpenGraph by default. Additionally, a set of categories can be defined on the site-page, to be used by article-pages.

The article page allows setting an author, publishing date, teaser-text, category, and tags.

See also [issue #16](https://codeberg.org/Entspannt-Digital/custom-kirby-kit/issues/16)

## Kirby licensing infomrmation
- [Kirby’s Composerkit](https://github.com/getkirby/composerkit/blob/main/LICENSE)
- [Kirby License](https://getkirby.com/license)
