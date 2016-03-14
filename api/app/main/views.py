#!/usr/bin/env python
# coding:utf-8
from __future__ import unicode_literals
from . import main
from app.core.base import JsonRpc
from flask import request,Response
import json

@main.route('/', methods=["GET","POST"])
def index():
    return 'index'

@main.route("/api", methods=["GET","POST"])
def api():
	allowed_content = {
		"application/json-rpc":"json-rpc",
		"application/json":"json-rpc",
	}
	print request.get_json()
	if allowed_content.get(request.content_type,None):
		jsonData = json.loads(request.get_json())
		jsonrpc = JsonRpc(jsonData)
		ret = jsonrpc.execute()
		print ret
		return json.dumps(ret)
	else:
		return "404",404






