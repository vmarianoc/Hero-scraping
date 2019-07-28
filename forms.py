# -*- coding: utf-8 -*-
"""
Created on Sat Jul 27 22:56:22 2019

@author: vitor
"""

from wtforms import Form, RadioField
import pandas as pd

class DistanciaForm(Form):
    
    metodo = RadioField(u'Metodo de Distância', choices=[('jaccard', 'Jaccard'), ('dice', '2-Dice'), ('sokal', 'Sokal Michener')])
    features = SelectMultipleField(u'Características', choices=[()])