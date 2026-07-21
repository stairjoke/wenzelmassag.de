# To release a version

## On branch `develop`:
- [ ] Update `site/templates/atom.php` to reflect the generator version
- [ ] Update `dev/RELEASE_NOTES.md`
- [ ] Commit

## On branch `main`
- [ ] Pull/Merge from develop to main
- [ ] Tag release, example: `git tag -a v0.1 -m "alpha testing release with known issues"`
- [ ] Push tags: `git push origin --tags`
