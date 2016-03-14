#coding:utf-8
__author__= "songxiang"

def check_field_exists(obj,data,field_none=[]):
	"""
	验证字段是否合法
	:param data   需要验证的数据
	:param field_none 可以为空的字段
	:return:
	"""
	for field in data.keys():
		if not hasattr(obj, field):
		# 验证字段是否存在
			raise Exception("params error: {}".format(field))
		if not data.get(field,None):
		# 验证字段是否为none
			if data[field] not in field_none:
				raise Exception("{}不能为空".format(data[field]))
def process_result(data,output):
	black = ['_sa_instance_state']
	ret = []
	for obj in data:
		if output:
			tmp = {}
			for f in output:
				tmp[f] = getattr(obj, f)
			ret.append(tmp)
		else:
			tmp = obj.__dict__
			for p in black:
				try:	
					tmp.pop(p)
				except:pass
			ret.append(tmp)
	return ret

def check_order_by(obj, order_by=''):
	order_by = order_by.split()
	if len(order_by)!=2:
		raise Exception("order_by参数不正确")

	field,order = order_by
	order_list = ["asc","desc"]
	if order.lower() not in order_list:
		raise Exception("排序参数不正确，值可以为{}".format(order_list))
	if not hasattr(obj, order.lower()):
		raise Exception("排序字段不在该表中")
def check_limit(limit):
	if not str(limit).isdigit():
		raise Exception("limit值必须为数字")

















