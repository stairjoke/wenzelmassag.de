# Tentative checklist to use this repository

To use this custom Kirby kit, you must create your own repository and set the kit as upstream. Then pull in versions as you need them. Versions are annotated as tags.

## Setting up

1. Create a new GIT repository with the GIT provider of your choice. DO NOT INITIALISE it, it should be empty. Add it to your SDK, etc. like always.
2. **This repository uses GIT Large file storage, so make sure you have git-lfs installed!**
2. Set [Enstpannt-Digital/custom-kirby-kit](https://codeberg.org/Entspannt-Digital/custom-kirby-kit) as upstream: `git remote add upstream https://codeberg.org/Entspannt-Digital/custom-kirby-kit`.
3. Create your `develop` branch. I recommend you develop on this branch and merge it into `main` for releases of your website.
4. Follow the "Update" steps 1, 2, and 3
5. Run `git push origin --all` to save your work to your git server

## Update

1. Fetch all the latest releases: `git fetch upstream --tags` - This repository uses tags to version, learn more about tags here: [Git Basics - Tagging](https://git-scm.com/book/en/v2/Git-Basics-Tagging). You can see all tags, and filter the list for versions like so: `git tag -l "v1.*"`. This shows all v1.X releases.
2. To get the version of your choice, checkout your `develop` branch and merge the release into it. Example for version 1.0: `git checkout develop && git merge v1.0`
3. Run `composer install` to install the latest version of all dependencies, including Kirby itself.

## Publish a version of your site

Of course you could, at any time, just copy the `data`, `public`, `site`, and `vendor` directories to your web server, but you might want to do your future self the favour to version your releases. I recommend, whenever you are ready to publish an update, to follow these steps:

1. Ensure you’re on your staging branch and you have no uncommitted changes. Download the `content` directory from your web server and commit those changes.
2. Test (and fix) your site with its up-to-date content.
3. Merge your release from `develop` to `main`.
4. Publish your site from main to your web server
