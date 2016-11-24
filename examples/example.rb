require 'net/http'
uri = URI.parse("http://activity.local.dev?token=test")
response = Net::HTTP.post_form(uri, {"activityType" => "1", "activityTitle" => "Ruby", "activityIP" => "127.0.0.1", "activityUserAgent" => "Ruby"})
