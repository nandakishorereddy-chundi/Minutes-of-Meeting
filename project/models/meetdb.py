#db = DAL("sqlite://storage.sqlite")
#TestDB = DAL("sqlite://storage.sqlite",auto_import=True)
DB = DAL("sqlite://storage.sqlite", auto_import=True)

db.define_table('moderator_list',Field('meeting_name'),Field('user_name'))

db.define_table('user_list',Field('meeting_name'),Field('user_name'))

db.define_table('meeting_list',Field('meeting_name'),Field('moderator_name'),Field('subject'),Field('location'),Field('date'),Field('already registered','boolean'))

db.define_table('profilepics',Field('user_name'),Field('title', unique=True),Field('file', 'upload'),format = '%(title)s')
