# coding:utf-8
import os
import imp
import json
import logging
__author__ = "SONGXAING"


class AutoLoad():
    """
            1.确定目录
            2.列出目录下的所有文件
            3.循环所有文件名，找出.py的文件名
            4.需要加载的文件名和当前文件是否一致
            5.加载模块
            6.判断模块有没有制定方法
            7.返回这个方法
            8.执行这个方法
    """

    def __init__(self, module_name):
        DIR = os.path.abspath(os.path.dirname(__file__))
        self.moduleDir = os.path.join(os.path.dirname(DIR), "modules")
        self.module_name = module_name
        self.method = None

    def isValidModule(self):
        """
        判断模块是否可加载
        """
        return self._load_module()

    def isValidMethod(self, func=None):
        """
        判断方法可否使用
        """
        self.method = func
        return hasattr(self.module, self.method)

    def getCallMethod(self):
        if hasattr(self.module, self.method):
            return getattr(self.module, self.method)
        return None

    def _load_module(self):
        ret = False
        for filename in os.listdir(self.moduleDir):
            if filename.endswith('.py'):
                module_name = filename.rstrip('.py')
                if self.module_name == module_name:
                    fp, pathname, desc = imp.find_module(
                        module_name, [self.moduleDir])
                    if not fp:
                        continue
                    try:
                        self.module = imp.load_module(
                            module_name, fp, pathname, desc)
                        ret = True
                    finally:
                        fp.close()
                    break
        if not ret:
        	print "没有找到模块"
        # print os.listdir(self  .moduleDir)
        return ret


class Response(object):
    """
    定义response对象
    """

    def __init__(self):
        self.data = None  # 返回的数据
        self.errorCode = 0  # 错误码
        self.errorMessage = None  # 错误信息


class JsonRpc(object):
    def __init__(self, jsonData):
        self.VERSION = 2.0
        self._error = True
        self.jsonData = jsonData
        self._respose = {}

    def execute(self):
        if not self.jsonData.get("params", None):
            self.jsonData["id"] = None

        if self.validate():
            params = self.jsonData.get("params", None)
            auth = self.jsonData.get("auth", None)
            module, func = self.jsonData.get("method", "").split(".")
            ret = self.callMethod(module, func, params, auth)
            self.processResult(ret)
        return self._respose

    def processResult(self, respose):
        if respose.errorCode != 0:
        	self.jsonError(self.jsonData.get("id"),respose.errorCode,respose.errorMessage)
        else: 
        	self._respose = {
        		"jsonrpc": self.VERSION,
        		"result": respose.data,
        		"id":self.jsonData.get("id")
        	}

    def callMethod(self, module, func, params, auth):

        module_name = module.lower()
        func = func.lower()
        respose = Response()
        autoload = AutoLoad(module_name)
        if not autoload.isValidModule():
        	respose.errorCode = 201
        	respose.errorMessage = "指定的module不存在"
        	return respose
        if not autoload.isValidMethod(func):
        	respose.errorCode = 202
        	respose.errorMessage = "{}下没有{}方法".format(module_name,func)
        flag = self.requiedAuthentication(module, func)
        if flag:
        	if auth is None:
        		respose.errorCode = 203
        		respose.errorMessage = "该操作需要提供token"
        	else:
        		pass
        try:
        	called = autoload.getCallMethod()
        	if callable(called):
        		respose.data = called(**params)
        	else:
        		respose.errorCode = 204
        		respose.errorMessage = "{}.{}不能被调用".format(module_name, func)
        except Exception, e:
        	respose.errorCode = -1
        	respose.errorMessage = e.message
        	return respose
        return respose

    def requiedAuthentication(self, module, func):
    	# if module == "user" and func == "login":
    	# 	return False
    	# if module == "song":
    	# 	return False
        return False
    	# return True

    def validate(self):
        if not self.jsonData.get("jsonrpc", None):
            self.jsonError(self.jsonData.get("id", 0), 101, "No jsonrpc")
            return False
        if self.jsonData.get("jsonrpc", None) != self.VERSION:
            self.jsonError(self.jsonData.get(
                "id", 0), 102, "Error jsonrpcVersion should be :{}".format(self.VERSION))
            return False
        if not self.jsonData.get("method", None):
            self.jsonError(self.jsonData.get("id", 0), 103, "NO method")
            return False
        if not "." in self.jsonData.get("method", None):
        	self.jsonError(self.jsonData.get("id",0), 104, "Method Error")
        	return False
        if not isinstance(self.jsonData.get("params"), dict):
            self.jsonError(
                self.jsonData.get("id", 0), 105, "params should be dict")
            return False
        if not self.jsonData.get("params", None):
            self.jsonError(
                self.jsonData.get("id", 0), 106, "params shouldn't be empty")
            return False        
        return True

    def jsonError(self, id, err_no, errmsg):
        self.error = True
        format_err = {
            "jsonrpc": self.VERSION,
            "error": errmsg,
            "err_no": err_no,
            "id": id,
        }
        self._respose = format_err


"""
	101 jsonrpc版本无参数
	102 jsonrpc版本错误
	103 method没有
	104 jsonMethod 有错误
	105 params错误
	106 params shouldn't be empty

	201 指定的module不存在
	202 XXX下没有XXX方法
	203 该操作需要提供token
	204 XXX下的XXX不能执行
"""

if __name__ == '__main__':
    # at = AutoLoad("1233")

    # at.isValidModule()
    # at.isValidMethod("get")
    # fuc = at.getCallMethod()
    # fuc()
    data = {
        "jsonrpc":2.0,
        "method":"song.get",
        "params":{'ad':'sdf'}
    }
    jrpc = JsonRpc(data)
    ret = jrpc.execute()
    print ret
