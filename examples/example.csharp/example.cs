using System.Collections.Generic;
using System.Net.Http;

namespace example.csharp
{
  class Example
  {
    static void Main(string[] args)
    {
      var client = new HttpClient();
      var request = new HttpRequestMessage(HttpMethod.Post, @"http://YOUR_URL?token=YOUR_TOKEN");

      request.Content = new FormUrlEncodedContent(GetFormFields());
      var task = client.SendAsync(request, HttpCompletionOption.ResponseContentRead);
      task.Wait();
    }

    private static IEnumerable<KeyValuePair<string, string>> GetFormFields()
    {
      yield return new KeyValuePair<string, string>("activityType", "1");
      yield return new KeyValuePair<string, string>("activityTitle", "Test Title");
      yield return new KeyValuePair<string, string>("activityIP", "127.0.0.1");
      yield return new KeyValuePair<string, string>("activityUserAgent", "Test UserAgent");
    }
  }
}
