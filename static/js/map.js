/**
 * Created with JetBrains PhpStorm.
 * User: WEIDONG MENG
 * Date: 13-11-6
 * Time: 下午3:19
 * To change this template use File | Settings | File Templates.
 */

function addPointCode(map, points, name, pointCode) {

    var polygon = new BMap.Polygon(points, {strokeColor: "red", fillColor: "red", strokeWeight: 2, strokeOpacity: 0.5, fillOpacity: 0.3});
    map.addOverlay(polygon);
}

//加载天津地图
function loadTianjinMap()
{
	var map = new BMap.Map("allmap");
    var point = new BMap.Point(120.193914,35.965320);
    map.centerAndZoom(point, 15);
    map.enableScrollWheelZoom(true);
	map.setCurrentCity("青岛");  
	
    addPointCode(map,[
        new BMap.Point(120.181384,35.982274),		
        new BMap.Point(120.178995,35.977462),		
        new BMap.Point(120.171916,35.979872),		
        new BMap.Point(120.169953,35.970019),
		new BMap.Point(120.176008,35.970019),
		new BMap.Point(120.178972,35.968953),
		new BMap.Point(120.181865,35.961708),
		new BMap.Point(120.172271,35.958962),
        new BMap.Point(120.174624,35.948166),
        new BMap.Point(120.17987,35.941504),
        new BMap.Point(120.199561,35.951322),
        new BMap.Point(120.209227,35.954799),
        new BMap.Point(120.208041,35.959678),
        new BMap.Point(120.207897,35.964235),
        new BMap.Point(120.206855,35.968354),
        new BMap.Point(120.204268,35.967974),
        new BMap.Point(120.201214,35.96961),
        new BMap.Point(120.199777,35.972385),
        new BMap.Point(120.199202,35.976095),
        new BMap.Point(120.199202,35.976095),
		new BMap.Point(120.181402,35.98227)],
        '开发区','hdq');
}