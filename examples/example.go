body := strings.NewReader(`activityType=1&activityTitle=GO&activityIP=127.0.0.1&activityUserAgent=GO`)
req, err := http.NewRequest("POST", "http://activity.local.dev?token=test", body)
if err != nil {
	// handle err
}
req.Header.Set("Content-Type", "application/x-www-form-urlencoded")

resp, err := http.DefaultClient.Do(req)
if err != nil {
	// handle err
}
defer resp.Body.Close()
