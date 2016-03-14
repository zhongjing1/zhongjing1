# coding:utf-8
__author__ ='songxiang'

from app.models import db,Idc
from app.utils import check_field_exists,process_result,check_order_by,check_limit

def create(**kwargs):
	# 1.获取参数信息
	# return kwargs
	check_field_exists(Idc,kwargs)
	# 传参的可个数验证
	# 2.处理
	# 3.通过数据实例化Idc
	idc = Idc(**kwargs)
	# 4.插入到数据库
	db.session.add(idc)
	try:
		db.session.commit()
	except Exception, e:
		raise Exception(e.message.split(")")[1])
	return idc.id

def get(**kwargs):
	output = kwargs.get("output",[])
	limit = kwargs.get("limit",10)
	order_by = kwargs.get("order_by",'id desc')

	if not isinstance(output, list):
		raise Exception('output必须是列表')

	for field in output:
		if not hasattr(Idc, field):
			raise Exception("{}这个输出字段不存在".format(field))
	check_order_by(Idc,order_by)
	check_limit(limit)
	data = db.session.query(Idc).order_by(order_by).limit(limit).all()
	db.session.close()
	ret = process_result(data, output)
	return ret

def update(**kwargs):
	data = kwargs.get('data',{})
	where = kwargs.get("where",{})

	if not data:
		raise Exception("没有需要的")

	for field in data.keys():
		if not hasattr(Idc, field):
			raise Exception("需要更新的{}字段不存在".format(field))
	if not where:
		raise Exception("需要提供where条件")

	if not where.get('id',None):
		raise Exception("需要提供id作为条件")

	try:
		id = int(where["id"])
		if id <=0:
			raise Exception("条件id的值不能为负数")
	except ValueError:
		raise Exception("条件id的值必须为int")

	ret=db.session.query(Idc).filter_by(**where).update(data)
	db.session.commit()
	return ret

















