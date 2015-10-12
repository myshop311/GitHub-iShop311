 

var bardata = [];
    d3.tsv('data/data.tsv', function(data) {
      //  console.log(data);

        for (key in data) {//console.log(data[key].value);
            bardata.push(Math.round(data[key].value));
        } 


bardata.sort(function compareNumbers(a,b){
return a-b;
});

var margin ={ top: 30, right: 30, bottom: 40, left: 50}
 

 var width =600 - margin.left - margin.right,
 height= 400 - margin.top - margin.bottom,
 barwidth=20,
 barOffset=5;
 
var yScale = d3.scale.linear()
.domain([0, d3.max(bardata)])
.range([0, height]);


var yGuideScale = d3.scale.linear()
.domain([0, d3.max(bardata)])
.range([height, 0]);


var xScale = d3.scale.ordinal()
.domain(d3.range(0, bardata.length))
.rangeBands([0, width], .2);

var colors=  d3.scale.linear()
.domain([0, bardata.length *.33, bardata.length *.66, bardata.length])
.range(['#B58929','#C61C6F', '#268BD2', '#85992C'])


var tooltip = d3.select('body').append('div')
.style('position', 'absolute')
.style('padding', '0 10px')
.style('opacity', 0)
	.style('fill', 'white')

	var myChart = d3.select('#chart')

	.attr('width', width +135 + margin.left + margin.right)
	.attr('height', height + margin.top + margin.bottom)
	.style('background', '#eeeeee')
	.append('svg')
	.attr('width', width)
	.attr('height', height + margin.top + margin.bottom)
	.append('g')

	
	.style('background', '#eeeeee')
	.selectAll('rect').data(bardata) 
	.enter().append('rect')
	.style('fill', function(d,i){
		return colors(i);
	})  
	.attr('width', xScale.rangeBand()) 
	.attr('x', function(d,i){
		return xScale(i);
	}) 
     .attr('height',0) 
	.attr('y', 0)   
	.on('mouseover', function(d){
		 tempColor = this.style.fill;

		 tooltip
		 .style('opacity', .9)
.style('left', (d3.event.pageX-35) +'px')
.style('top', (d3.event.pageY -30) +'px')
.html(d)
.style('font-family', 'helvetica')

//console.log(d3.event.pageY);

		d3.select(this) 
		.style('opacity', .5)
		.style('fill', 'yellow');
	})
	.on('mouseout', function(){

			 tooltip.style('opacity', 0);

		d3.select(this) 
		.style('opacity', 1)
		.style('fill', tempColor);
	});

	myChart
	.transition(1000)
    .attr("transform", "translate(" + (margin.left) + "," +  (margin.top) + ")")
    .attr('height',  function(d){
		return yScale(d);
	}) 
	.attr('y',  function(d){
		return height -yScale(d);
	})   
.delay(function(d, i){
return i* 10;
})
.duration(500) 


var vAxis = d3.svg.axis()
.scale(yGuideScale)
.orient('left')
.ticks(10);

var vGuide = d3.select('svg').append('g');

vAxis(vGuide)

vGuide
.attr("transform", "translate(" +  margin.left + ","  + margin.top + ")")
.style('fill', 'none')
.style('stroke','#000');

console.log(bardata.length);


var hAxis = d3.svg.axis()
.scale(xScale)
.orient('bottom')
.tickValues(xScale.domain().filter(function(d,i){
// console.log(Math.round(bardata.length/5));
var temp =Math.round(bardata.length/5);
var reminder = temp % 5;
temp = temp - reminder;
	 //console.log(i % Math.round(bardata.length/5));
return !(i % temp);
}));

var hGuide = d3.select('svg').append('g');

hAxis(hGuide)

console.log("translate(10, " + (height -35) + ")");

hGuide
.attr("transform", "translate(" + margin.left +"," + (height + margin.top) + ")")
.style('fill', 'none')
.style('stroke','#000');




        
}); 


 













