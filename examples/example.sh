if [ ! -x /usr/bin/curl ] ; then
    command -v wget >/dev/null 2>&1 || { echo >&2 "Please install cURL or set it in your path. Aborting."; exit 1; }
fi
curl -X POST -F 'activityType=1' -F 'activityTitle=Test' -F 'activityIP=127.0.0.1' -F 'activityUserAgent=Test' http://YOUR_URL?token=YOUR_TOKEN
