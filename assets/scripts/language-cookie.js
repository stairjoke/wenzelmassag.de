function switchLanguage(event, lang) {
	event.preventDefault();
	const maxAge = 576000
	document.cookie = `pref_lang=${lang}; max-age=${maxAge}; path=/; domain=.wenzelmassag.de; SameSite=Lax`
	window.location.reload()
}
