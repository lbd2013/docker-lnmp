import sys, json;
try:
    print json.load(sys.stdin)['total']
except:
    print -1