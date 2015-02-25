var datacrobey = (function() {
        var json = null;
        $.ajax({
            'async': false,
            'global': false,
            'url': "https://gdata.youtube.com/feeds/api/users/divisioncrobey/uploads?v=2&alt=json",
            'dataType': "json",
            'success': function (data) {
                json = data;
            }
        });
        return json;
    })();
var dataobworld = (function() {
        var json = null;
        $.ajax({
            'async': false,
            'global': false,
            'url': "https://gdata.youtube.com/feeds/api/users/divisionobworld/uploads?v=2&alt=json",
            'dataType': "json",
            'success': function (data) {
                json = data;
            }
        });
        return json;
    })();
var datarobdub01 = (function() {
        var json = null;
        $.ajax({
            'async': false,
            'global': false,
            'url': "https://gdata.youtube.com/feeds/api/users/divisionrobdub01/uploads?v=2&alt=json",
            'dataType': "json",
            'success': function (data) {
                json = data;
            }
        });
        return json;
    })();
function crobey() {
  for (i = 0; i < 10; i++) {
        /*var comments_url = data.feed.entry[i].gd$comments.gd$feedLink.href + '&alt=json';
        var comments = (function() {
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
    $('#video-container-crobey').html($('#video-container-crobey').html() + '<a href="' + datacrobey.feed.entry[i].link[0].href + '">' + datacrobey.feed.entry[i].title.$t + '</a> - Views:' + datacrobey.feed.entry[i].yt$statistics.viewCount + '<br><img src="' + datacrobey.feed.entry[i].media$group.media$thumbnail[1].url + '"><div id="youtube_comments' + i + '">')
    
        /*for (i2 = 0; i2 < comments.feed.entry.length; i2++) {
            console.log(comments.feed.entry.length);
            $('#youtube_comments' + i).html($('#youtube_comments' + i).html() + '<h4>' + comments.feed.entry[i2].author[0].name.$t + '</h4><p>' + comments.feed.entry[i2].content.$t + '</p></div><br>')
        }*/
    
      
  }
};
function obworld() {
  for (i = 0; i < 10; i++) {
        /*var comments_url = data.feed.entry[i].gd$comments.gd$feedLink.href + '&alt=json';
        var comments = (function() {
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
    $('#video-container-obworld').html($('#video-container-obworld').html() + '<a href="' + dataobworld.feed.entry[i].link[0].href + '">' + dataobworld.feed.entry[i].title.$t + '</a> - Views:' + dataobworld.feed.entry[i].yt$statistics.viewCount + '<br><img src="' + dataobworld.feed.entry[i].media$group.media$thumbnail[1].url + '"><div id="youtube_comments' + i + '">')
    
        /*for (i2 = 0; i2 < comments.feed.entry.length; i2++) {
            console.log(comments.feed.entry.length);
            $('#youtube_comments' + i).html($('#youtube_comments' + i).html() + '<h4>' + comments.feed.entry[i2].author[0].name.$t + '</h4><p>' + comments.feed.entry[i2].content.$t + '</p></div><br>')
        }*/
    
      
  }
};
function robdub01() {
  for (i = 0; i < 10; i++) {
        /*var comments_url = data.feed.entry[i].gd$comments.gd$feedLink.href + '&alt=json';
        var comments = (function() {
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
    $('#video-container-robdub01').html($('#video-container-robdub01').html() + '<a href="' + datarobdub01.feed.entry[i].link[0].href + '">' + datarobdub01.feed.entry[i].title.$t + '</a> - Views:' + datarobdub01.feed.entry[i].yt$statistics.viewCount + '<br><img src="' + datarobdub01.feed.entry[i].media$group.media$thumbnail[1].url + '"><div id="youtube_comments' + i + '">')
    
        /*for (i2 = 0; i2 < comments.feed.entry.length; i2++) {
            console.log(comments.feed.entry.length);
            $('#youtube_comments' + i).html($('#youtube_comments' + i).html() + '<h4>' + comments.feed.entry[i2].author[0].name.$t + '</h4><p>' + comments.feed.entry[i2].content.$t + '</p></div><br>')
        }*/
    
      
  }
};

$(document).ready(function(){
    crobey();
    obworld();
    robdub01();
});
 