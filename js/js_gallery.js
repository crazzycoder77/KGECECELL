$.getScript('https://cdn.rawgit.com/yairEO/photobox/master/photobox/jquery.photobox.js', function()
{
    
    
!(function(){
    'use strict';

	var numOfImages = window.location.search ? parseInt(window.location.search.match(/\d+$/)[0]) : 70,
		gallery = $('#gallery'),count1=0;	
		
    // Get some photos from Flickr for the demo
    $.ajax({
        url: 'https://api.flickr.com/services/rest/',
        data: {
            format: 'json',
            //method: 'flickr.interestingness.getList',
            method:'flickr.people.getPublicPhotos',
			per_page : numOfImages,
            //api_key: 'b51d3a7c3988ba6052e25cb152aecba2'
            api_key: 'f40a824daa31d2bb7df98c9926d0a9d2', // this is my own API key, please use yours
            user_id: '140366858@N05',
        },
	    dataType: 'jsonp',
        jsonp: 'jsoncallback'
    })
	.done(function (data){
        var loadedIndex = 1, isVideo;
        $.each( data.photos.photo, function(index, photo){
			isVideo = photo.thumb ? true : false;
            var url = 'http://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret,
			img = document.createElement('img');
			count1=count1+1;
			// lazy show the photos one by one
			img.onload = function(e){
				img.onload = null;
				var link = document.createElement('a'),
				li = document.createElement('li')
				link.href = this.largeUrl;

				link.appendChild(this);
				if( this.isVideo ){
					link.rel = 'video';
					li.className = 'video'
				}
				li.appendChild(link);
				gallery[0].appendChild(li);
			
				setTimeout( function(){ 
					$(li).addClass('loaded');
				}, 25*loadedIndex++);
			};
			
			img['largeUrl'] = isVideo ? photo.url : url + '_b.jpg';
			img['isVideo'] = isVideo;
			img.src = isVideo ? photo.thumb : url + '_b.jpg';
            img.title = photo.title;
            
        });
       
		// finally, initialize photobox on all retrieved images
		$('#gallery').photobox('a', { thumbs:true }, callback);
		// using setTimeout to make sure all images were in the DOM, before the history.load() function is looking them up to match the url hash
		setTimeout(window._photobox.history.load, 1000);
		function callback(){
			console.log('callback for loaded content:', this);
		};
    });
})();    


});