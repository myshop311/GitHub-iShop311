width=400,
height=400,
radius=200;

innerRadius= 50;

outerRadius = radius;


var colors = d3.scale.category10();

var piedata=[
{
	label: "Jean",
	value: 50
	},
	{label: "Sam",
	value: 30
	},
	 {label: "Tony",
	value: 60
	},
{label: "Tomy",
	value: 50
	},
{label: "Tom",
	value: 50
	}
]

var pie = d3.layout.pie()
.value(function(d){
	return d.value;
})

var arc = d3.svg.arc()
.innerRadius(innerRadius)
.outerRadius(outerRadius);

var myChart = d3.select('#mychart').append('svg')
.attr('width', width)
.attr('height', height)
.append('g')
.attr('transform', 'translate(' + (width -radius) + ',' +(height-radius) + ')' )
.selectAll('path').data(pie(piedata))
.enter().append('g')
.attr('class', 'slice')


var slices = d3.selectAll('g.slice')
.append('path')
.attr('d', arc)
.attr('fill', function(d,i){
return colors(i);
})

var text = d3.selectAll('g.slice').append('text')
.text(function(d){
	console.log(d)
	return   d.data.label;
})
.attr('font-weight', '800')
.attr('font-family','sans')
.attr('fill', 'white')
.attr('text-anchor', 'middle')
.attr('transform', function(d,i){
	d.innerRadius =0;
	d.outerRadius = radius;
	return 'translate(' + arc.centroid(d)+')'
})



