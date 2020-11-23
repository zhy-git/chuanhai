var buildPriceS;
var areaPriceS;
var compareDate;
var maxPrice;
var minPrice;
var buildName;
var areaName;
$(document).ready(function(){	
	//走势图属性赋值start
	var btext = $("#buildPrices").val();
	var atext = $("#areaPriceS").val();
	var datetext = $("#compareDate").val();
	buildPriceS = eval('[' + btext + ']'); 
	areaPriceS  = eval('[' + atext + ']');
	compareDate  = eval('[' + datetext + ']');
	maxPrice = $("#maxPrice").val();
	minPrice = $("#minPrice").val();
	buildName = $("#bname").val()+"房价";
	areaName = $("#areaName").val()+"房价";
	fangjiatu();//走势图方法
	//走势图属性赋值end
});
function fangjiatu(){
	$('#container').highcharts({
        title: {
            text: '',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: compareDate,
			labels: {
						style: {
							fontSize: "14px"
						},
						y: 25,
						enabled: true
			},
			gridLineWidth: 0,
			tickColor: '#fff',
            tickWidth: 1,
			lineWidth:1,
			lineColor:'#ddd'
        },
		yAxis: {
			title:'enabled',
			opposite: true,
			labels: {
						formatter: function() {
							return this.value + "元"
						},
						style: {
							fontSize: "14px",
							color: "#666"
						},
						y: 3
			},
			max : maxPrice ,
			min : minPrice ,
			tickPixelInterval: 100
        },
        tooltip: {
            valueSuffix: '元/平米',
			crosshairs:{
				 width:'2px',
				 color:'#5e5b5a'
			},
			shared:true,
			backgroundColor:'rgba(0,0,0,0.7)',
			borderColor:'rgba(0,0,0,0.7)',
			borderWidth:0,
			style:{
			   color:'#fff'
			},
			shape:'callout',
			headerFormat: '<small>'+'{point.key}</small><br />'
        },
        series: [{
            name: buildName,
			data: buildPriceS,
			color:'#00a5e3',
			marker:{
				symbol:'circle'
			}
			
        }, {
            name: areaName,
            data: areaPriceS,
			color:'#ed603d'
        }],
		credits : { 
		   enable:false ,
		   text:''
		},
		legend : {
		   enabled:false	
		}
    });  
}
