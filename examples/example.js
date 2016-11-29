var request = require('request');

// Set the headers
var headers = {
    'User-Agent':       'Super Agent/0.0.1',
    'Content-Type':     'application/x-www-form-urlencoded'
}

// Configure the request
var options = {
    url: 'http://activity.local.dev?token=test',
    method: 'POST',
    headers: headers,
    form: {'activityType': '1', 'activityTitle': 'NodeJS', 'activityIP': '127.0.0.1', 'activityUserAgent': 'NodeJS'}
}

// Start the request
request(options, function (error, response, body) {
    if (!error && response.statusCode === 200) {
        // Print out the response body
        console.log(body)
    }
})
