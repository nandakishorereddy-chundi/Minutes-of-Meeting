response.title = 'Minutes of Meeting'
response.subtitle = 'manage your meetings here'
response.meta.author = '%s <%s>' % (settings.author, settings.author_email)
response.meta.keywords = 'test'
response.meta.description = 'test'
response.menu = [
    (T('Index'),URL('index')==URL(),URL('index'),[]),
    (T('Calendar'),URL('mycal')==URL(),URL('mycal'),[]),
	(T('email'),URL('emailusers')==URL(),URL('emailusers'),[])
]
