#!/usr/bin/python
# coding:utf-8
import requests
import json

url = 'http://0.0.0.0:5000/api'
headers = {"Content-Type": "application/json"}
# data = {
#     "jsonrpc": 2.0,
#     "method": "idc.create",
#     "id": 1,
#     "auth": None,
#     "params": {
#         "name": "xiaoming",
#         "idc_name": "blueshit_idc",
#         "address": "shandong",
#         "phone": "13887654321",
#         "email": "blueshit@lanxiang.com",
#         "user_phone": "b13812345678",
#         "rel_cabinet_num": 80,
#         "pact_cabinet_num": 88,
#         "user_interface":"kane "
#     }}
data = {
    "jsonrpc": 2.0,
    "method": "status.update",
    "id": 4,
    "auth": None,
    "params": {
        "data":{"name":"我要改4的名字"},
        "where":{"id":4}
    }}
# data = {
#     "jsonrpc": 2.0,
#     "method": "idc.get",
#     "id": 1,
#     "auth": None,
#     "params": {
#         "output":[]
#     }}
# data = {
#     "jsonrpc": 2.0,
#     "method": "idc.create",
#     "id": 1,
#     "auth": None,
#     "params": {
#         "name": "aaa",
#         "idc_name":"BBB"
 
#     }}
# data = {
#     "jsonrpc": 2.0,
#     "method": "status.create",
#     "id": 4,
#     "auth": None,
#     "params":{"name":"再再来一次" }}
    # r=requests.get(url,data=json.dumps({"abc":2123}),headers = headers)
r = requests.post(url, json=json.dumps(data), headers=headers)
print r.content
print r.headers
