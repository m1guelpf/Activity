import requests
post_data = {'activityType':'1', 'activityTitle':'Python', 'activityIP':'127.0.0.1', 'activityUserAgent':'Python'}
requests.post(url='http://activity.local.dev?token=test', data=post_data)
