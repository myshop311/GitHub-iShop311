width=400,
height=400,
radius=200;

var colors = d3.scale.category10();

var piedata=[
{
	label: "Jan",
	value: 50
	},

{
	label: "Sam",
	value: 50
	},
{
	label: "Tom",
	value: 50
	}
]


var pie = d3.layout.pie()
.value(function(d){
	return d.value;
})


var arc = d3.svg.arc()
.outerRadius(radius);



var myChart = d3.select('#mychart').append('svg')
.attr('width', width)
.attr('height', height)
.select('g')
.selectAll('path').data(pie(piedata))
.enter().append('path')
.attr('transform', 'translate(' + (width -radius) + ',' +(height-radius) + ')' )
.attr('d', arc)
.attr('fill', function(d,i){
return colors(i);
})




.