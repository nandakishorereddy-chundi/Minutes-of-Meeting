import os
import time

def user():
    """
    exposes:
    http://..../[app]/default/user/login
    http://..../[app]/default/user/logout
    http://..../[app]/default/user/register
    http://..../[app]/default/user/profile
    http://..../[app]/default/user/retrieve_password
    http://..../[app]/default/user/change_password
    http://..../[app]/default/user/manage_users (requires membership in
    use @auth.requires_login()
        @auth.requires_membership('group name')
        @auth.requires_permission('read','table name',record_id)
    to decorate functions that need access control
    """
    return dict(form=auth())

@auth.requires_login()
def mycal():
    rows=db(db.t_appointment.created_by==auth.user.id).select()
    return dict(rows=rows)

def index():
	return dict()

@auth.requires_login()
def first():
    print "first"
    user='%(first_name)s'%auth.user
    tableuser=DB['user_list']
    textuser= DB().select(tableuser.ALL ,orderby=tableuser.id)
    flaguser=0;
    for rows in textuser:
	print rows
	if rows.user_name == user:
		print rows.user_name+"******"
		flaguser=1
    flag=0;
    table=DB['moderator_list']
    text = DB().select(table.ALL ,orderby=table.id)

    for row in text:
	print row
	if row.user_name == user:
		print row.user_name+"******"
		flag=1
    if flaguser ==1 and flag == 0:
    	return URL(('index'))	
    table=DB['moderator_list']
    text = DB().select(table.ALL ,orderby=table.id)
    table.insert(user_name=user)
    form = SQLFORM.factory(Field('meeting_name',requires=IS_NOT_EMPTY()))
    table=DB['moderator_list']
    
    if form.process().accepted:
        name = form.vars.meeting_name
	print "first",DB.tables
	if name not in DB.tables:
	    DB.define_table(name,Field('user_name','string',requires=IS_NOT_EMPTY()),
			    Field('body','text', requires=IS_NOT_EMPTY()),Field('time','string'),migrate=True)#,format=lambda r: r.name or 'anonymous')
	    DB.define_table(name+'_'+'names',Field('user_name','string', requires=IS_NOT_EMPTY()),migrate=True)
	    DB.define_table(name+'_'+'users',Field('user_name','string', requires=IS_NOT_EMPTY()),migrate=True)
	    DB.define_table(name+'_'+'files',Field('user_name','string', requires=IS_NOT_EMPTY()),Field('file','upload'))
	redirect(URL('fourth',vars=dict(name=name)))
    return dict(form = form)

def second():
     name = request.vars.name or redirect(URL('first'))
     tb = DB[name]
     txt = DB().select(tb.ALL ,orderby=tb.id)
     redirect(URL('fourth',vars=dict(name=name)))


def fourth():
    name = request.vars.name or redirect(URL('first'))
    tb = DB[name]
    tb1 = DB[name+'_'+'names']
    tb2 = DB[name+'_'+'files']
    form1 = SQLFORM(tb2)
    form = SQLFORM.factory(Field('user_name','string',requires=IS_NOT_EMPTY()),Field('body','text',requires=IS_NOT_EMPTY()))
    if form.process(formname='form').accepted:
	tb.insert(user_name=form.vars.user_name,body=form.vars.body,time=time.strftime("%d-%a/%H:%M:%S"))
        response.flash = T("Ur notes is updated!")
    if form1.process(formname='form_one').accepted:
        response.flash = T("Ur file is uploaded!")
    text = DB().select(tb.ALL ,orderby=tb.id)
    names = DB().select(tb1.ALL,orderby=tb1.id)
    return dict(text = text,name=name,names=names,form=form,form1=form1)

def startmeeting():
    import time
    session.b=time.strftime("%H:%M:%S")
    a=session.b
    name = request.vars.name
    tb = DB[name]
    tb1 = DB[name+'_'+'names']
    text = DB().select(tb.ALL ,orderby=tb.id)
    names = DB().select(tb1.ALL,orderby=tb1.id)
    return dict(text = text,name=name,names=names,a=a)


def fileupload():
	form = SQLFORM.factory(Field('file','upload',uploadfolder=os.path.join(request.folder,'uploads')),Field('user_name',requires=IS_NOT_EMPTY()))
 	if form.vars.file and form.process().accepted:
            response.flash = T("Ur file is uploaded!")
	return dict(form=form)

def sixth():
    name = request.get_vars['start'].split('/')
    tb = DB[name[0]]
    j = tb(int(name[1])) or redirect(URL('fourth'))
    print "sixth",j
    return dict(name=j)

def seventh():
    name = request.get_vars['start'].split('/')
    tb = DB[name[0]]
    tb.insert(body=name[1],user_name=name[2])
    text = DB().select(tb.ALL ,orderby=tb.id)
    name = name[0]
    return dict(text=text,name=name)

def eight():
    name = request.get_vars['start'].split('/')
    tb = DB[name[0]]
    txt = DB().select(tb.ALL ,orderby=tb.id)
    return dict(text=txt,name=name[1])

def ninth():
    name = request.get_vars['start'].split('/')
    print name
    table_name=name[0]+'_names'
    table=DB[table_name]
    print "user_nmae",table
    text = DB().select(table.ALL ,orderby=table.id)
    print text
    flag=0
    for i in text:
        if i.user_name == name[1]:	
	    flag=1
            print "flag set"
    if flag == 0:	
        table.insert(user_name=name[1])
    response.flash=T("user added to the meeting")	
    return dict(text = text) 

@auth.requires_login()
def tenth():
	user='%(first_name)s'%auth.user
        print user
	user='%(first_name)s'%auth.user
        print user
        table=DB['moderator_list']
    	text = DB().select(table.ALL ,orderby=table.id)
    	flag=0;
    	for row in text:
		print row
		if row.user_name == user:
			print row.user_name+"******"
			flag=1
    	if flag==1:
		redirect (URL('index'))	
	form = SQLFORM.factory(Field('meeting',requires=IS_NOT_EMPTY()))
	if form.process().accepted:
		name=form.vars.meeting
		tb=DB[name+'_'+'users']
		tb.insert(user_name=user)
		print user+'i am user'
	return dict(form=form)

def search():
	return dict()

def adduser():
	meeting_name=request.vars.meeting_name	
	session.meeting_name=meeting_name
	print "addusr",meeting_name
	meeting_name=meeting_name+'_users'
	tb=DB[meeting_name]
	text = DB().select(tb.ALL ,orderby=tb.id)
	session.list=[]
	for row in text:
		flag=0
		for i in session.list:
			if i == row.user_name:
				flag=1
	        if flag is 0:
			print row.user_name
			session.list.append(row.user_name)
	return dict()


