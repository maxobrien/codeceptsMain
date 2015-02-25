

var data = (function() {
        var json = null;
        $.ajax({
            'async': false,
            'global': false,
            'url': "https://gdata.youtube.com/feeds/api/users/thatmumbojumbo/uploads?v=2&alt=json",
            'dataType': "json",
            'success': function (data) {
                json = data;
            }
        });
        return json;
    })();


function test() {
  for (i = 0; i < 20; i++) {
        var comments_url = data.feed.entry[i].gd$comments.gd$feedLink.href + '&alt=json';
        /*var comments = (function() {
            var json = null;
            $.ajax({
                'async': false,
                'global': false,
                'url': comments_url,
                'dataType': "json",
                'success': function (data) {
                    json = data;
                }
            });
            return json;
        })();*/

    //console.log(comments);
    //console.log(comments_url);
    //console.log(comments.feed.entry[0].author[0].name.$t)
    $('#video-container').html($('#video-container').html() + '<a href="' + data.feed.entry[i].link[0].href + '">' + data.feed.entry[i].title.$t + '</a> - Views:' + data.feed.entry[i].yt$statistics.viewCount + '<br><img src="' + data.feed.entry[i].media$group.media$thumbnail[1].url + '"><div id="youtube_comments' + i + '"><h3>Comments</h3>')
    
        /*for (i2 = 0; i2 < comments.feed.entry.length; i2++) {
            console.log(comments.feed.entry.length);
            $('#youtube_comments' + i).html($('#youtube_comments' + i).html() + '<h4>' + comments.feed.entry[i2].author[0].name.$t + '</h4><p>' + comments.feed.entry[i2].content.$t + '</p></div><br>')
        }*/
    
      
  }
};
$(document).ready(function(){test()})
 