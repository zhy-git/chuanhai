var BMapApplication = {
    'map' : null,
    'panorama' : null,
    'sPoint' : null,
    'pPoint' : null,
    'pageSize' : 20,
    'count' : 0,
    'resultList' : [],
    'listShowState' : true,
    'init' : function (args){
        var lng = args.lng ? args.lng : 0;
        var lat = args.lat ? args.lat : 0;
        var mapContainerId = args.mapContainerId ? args.mapContainerId : '';
        var streetContainerId = args.streetContainerId ? args.streetContainerId : '';
        if (mapContainerId != '')
        {
            this.setBmapContainer(mapContainerId);
            this.setSPoint(lng, lat);
        }
        if (streetContainerId != '')
        {
            this.setPanoramaContainer(streetContainerId);
            this.setPPoint(lng, lat);
        }
    },
	    'setBmapContainer' : function (elemId){
        elemId = elemId == undefined ? 'allmap' : elemId;
        this.map = (this.map == null) ? new BMap.Map(elemId) : this.map;
    },
	'clearBmapContainer' : function (){
        this.map = null;
    },
	'setPanoramaContainer' : function (elemId){
        this.panorama = (this.panorama == null) ? new BMap.Panorama(elemId, {
            albumsControl: true
        }) : this.panorama;
    },
	'setSPoint' : function (lng, lat){
        this.sPoint = (this.sPoint == null) ? new BMap.Point(lng, lat) : this.sPoint;
    },
	'setPPoint' : function (lng, lat){
        this.pPoint = (this.pPoint == null) ? new BMap.Point(lng, lat) : this.pPoint;
    },
	'getSquareBounds' : function (centerPoi, r){
        var a = Math.sqrt(2) * r;
        mPoi = this.getMecator(centerPoi);
        var x0 = mPoi.x, y0 = mPoi.y;
        var x1 = x0 + a / 2 , y1 = y0 + a / 2;
        var x2 = x0 - a / 2 , y2 = y0 - a / 2;
        var ne = this.getPoi(new BMap.Pixel(x1, y1)), sw = this.getPoi(new BMap.Pixel(x2, y2));
        return new BMap.Bounds(sw, ne);
    },
	'getMecator' : function (poi){
        return this.map.getMapType().getProjection().lngLatToPoint(poi);
    },
	'getPoi' : function (mecator){
        return this.map.getMapType().getProjection().pointToLngLat(mecator);
    },
	'showResultToPage' : function (keyword, result, iconFlagClass){
        $('#bmap-keyword').text(keyword);
        $('#result-count').text('(' + result.length + ')');
        var markContainer = $('.assort-distance ul:first');
        var markElem = markContainer.find('li:first').clone();
        markContainer.find('li').remove();
        if (result.length > 0)
        {
            for(var i = 0; i < result.length; i++)
            {
                var list = result[i].split(',');
                markElem.find('.digit').text((i + 1) + '.');
                markElem.find('.text').text(list[0].length > 10 ? list[0].substr(0, 10) + '...' : list[0]);
                markElem.find('.text').attr('title', list[0]);
                markElem.find('.distance').text(list[1] + '米');
                markContainer.append('<li>' + markElem.html() + '</li>');
            }
        }
        else
        {
            markElem.find('.digit').text('');
            markElem.find('.text').text('');
            markElem.find('.text').attr('title', '');
            markElem.find('.distance').text('');
            markContainer.append(markElem);
        }
        this.replaceIconClass(iconFlagClass);
    },
	'replaceIconClass' : function (iconFlagClass){
        var containerElem = $('.assort-distance');
        var classList = $('.assort-distance:first').attr('class').split(' ');
        if (classList.length > 1)
        {
            classList[1] = iconFlagClass;
        }
        containerElem.attr('class', classList.join(' '));
    },
	'closeResultElem' : function (){
        var containerElem = $('.assort-distance');
        var elemList = containerElem.children();
        if (elemList.length > 1)
        {
            for (var i = 1; i < elemList.length; i++)
            {
                $(elemList[i]).css('display', 'none');
            }
            $(elemList[0]).removeClass('hide');
        }
        containerElem.addClass('fixed-side');
        this.listShowState = false;
    },
	'openResultElem' : function (){
        var containerElem = $('.assort-distance');
        var elemList = containerElem.children();
        if (elemList.length > 1)
        {
            for (var i = 1; i < elemList.length; i++)
            {
                $(elemList[i]).css('display', 'block');
            }
            $(elemList[0]).addClass('hide');
        }
        containerElem.removeClass('fixed-side');
        this.listShowState = true;
    },
	'getAreaMap' : function (keyword, iconFlagClass){
        var ePoint = '';
        var distance = 0;
        var _this = this;
        this.map.disableScrollWheelZoom();
        this.map.centerAndZoom(this.sPoint,14);
        this.map.clearOverlays();
        var circle = new BMap.Circle(this.sPoint, 3000, {fillColor:"blue", strokeWeight: 1 ,fillOpacity: 0.1, strokeOpacity: 0.1});
        this.map.addOverlay(circle);
        var marker = new BMap.Marker(this.sPoint); 
        this.map.addOverlay(marker);
        var top_left_navigation = new BMap.NavigationControl();
        this.map.addControl(top_left_navigation);
		this.map.enableScrollWheelZoom();
        var options = {
            onSearchComplete: function(results){
                _this.resultList = [];
				
                if (local.getStatus() == BMAP_STATUS_SUCCESS)
                {
                    _this.count = results.getCurrentNumPois();
                    for (var i = 0; i < results.getCurrentNumPois(); i ++)
                    {
						//alert(results.getPoi(i).point.lng);
						//var lngss= results.getPoi(i).point.lng+0.01;
                        ePoint = new BMap.Point(results.getPoi(i).point.lng, results.getPoi(i).point.lat);
                        distance = parseInt(_this.map.getDistance(_this.sPoint, ePoint));
                        _this.resultList.push(results.getPoi(i).title + ', ' + distance);
                    }
                }
                _this.showResultToPage(results.keyword, _this.resultList, iconFlagClass);
            },
            pageCapacity: this.pageSize,
            renderOptions : {
                map : _this.map,
                'autoViewport' : false
            }
        };
        var local = new BMap.LocalSearch(this.map, options);
        var bounds = this.getSquareBounds(circle.getCenter(), circle.getRadius());
        local.searchInBounds(keyword, bounds);
    },
	'getStreetMap' : function (){
        this.panorama.setPosition(this.pPoint);
        this.panorama.setPov({pitch: 5, heading: 343.92});
       
        this.panorama.setOptions({
            albumsControlOptions: {
                anchor: BMAP_ANCHOR_BOTTOM_LEFT
            }
        });
		this.panorama.setOptions({
            albumsControlOptions: {
                offset: new BMap.Size(0, 0)
            }
        });
        
		this.panorama.setOptions({
            albumsControlOptions: {
                maxWidth: '60%',
                imageHeight: 80,
                border:0
            }
        });
    }
};
var BMapSearchDetail = {
    'query' : '',
    'radius' : 1000,
    'lng' : 0,
    'lat' : 0,
    'scope' : 1,
    'pageSize' : 20,
    'pageNum' : 0,
	'setPageSize' : function (pageSize){
        this.pageSize = pageSize;
    },
	'setPageNum' : function (pageNum){
        this.pageNum = pageNum;
    },
	'setScope' : function (scope){
        this.scope = scope;
    },
	'setRadius' : function (radius){
        this.radius = radius;
    },
	'getSearchResult' : function (query, lng, lat, url, callBack){
        this.query = query;
        this.lng = lng;
        this.lat = lat;
        this.execSearch(url, callBack);
    },
	'getTotal' : function (){
        return this.total;
    },
	'execSearch' : function (url, callBack){
        var _this = this;
        $.ajax({
            'url' : url,
            'type' : 'post',
            'data' : {
                'query' : _this.query,
                'radius' : _this.radius,
                'lng' : _this.lng,
                'lat' : _this.lat,
                'scope' : _this.scope,
                'pageSize' : _this.pageSize,
                'pageNum' : _this.pageNum
            },
            'dataType' : 'json',
            'success' : function (msg){
                if (msg.state == 0)
                {
                    callBack(msg.data);
                }
            },
            'error' : function (){
				callBack({'status' : 99, 'message' : 'The Ajax request failed'});
            }
        });
    }
};