#!/usr/bin/env python
# coding:utf-8
from app import db


class switch_pirpost(db.Model):
    __tablename__ = 'reboot_test'
    id = db.Column(db.Integer, primary_key=True)
    purpose = db.Column(db.String(100), nullable=False, default='')


class User(db.Model):
    __tablename__ = 'user'
    id = db.Column(db.Integer, primary_key=True)
    user_name = db.Column(db.String(50), nullable=False, default='')
















