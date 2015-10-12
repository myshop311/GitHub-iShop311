


var w =900,
h =400;

var circlewidth =5;

 
var palette = {
      "lightgray": "#819090",
      "gray": "#708284",
      "mediumgray": "#536870",
      "darkgray": "#475B62",

      "darkblue": "#0A2933",
      "darkerblue": "#042029",

      "paleryellow": "#FCF4DC",
      "paleyellow": "#EAE3CB",
      "yellow": "#A57706",
      "orange": "#BD3613",
      "red": "#D11C24",
      "pink": "#C61C6F",
      "purple": "#595AB7",
      "blue": "#2176C7",
      "green": "#259286",
      "yellowgreen": "#738A05"
  }

  var nodes =[
  {name: 'Parent'},
{name: 'Child1'},
{name: 'Child2', target: [0]},
{name: 'Child3', target: [0]},
{name: 'Child4', target: [1]},
{name: 'Child5', target: [0,1,2,3,4]}
  ]


var links=[];

for(var i=0; i< nodes.length; i++){
      if(nodes[i].target !=undefined){
            for(var x =0; x< nodes[i].target.length; x++){
        links.push({
            source: nodes[i],
            target: nodes[nodes[i].target[x]]
            })
      }
}


force = d3.layout.force()
.gravity(.2)
.charge(-1000)


var mychart = d3.select('#mychart').append('svg')
.attr('width', w)
.attr('height', h)
.append('g')


var node = mychart.selectAll('circle')
.data(nodes)
.enter().append('circle')
.attr('cx', function(d){return d.x})
.attr('cy', function(d){return d.y})
.attr('fill', '#f00')
.attr('r', circlewidth)
.call(force.drag)


var link = mychart.selectAll('line')
.data(links)
.enter().append('line')
.attr('x1', function(d){return d.source.x})
.attr('y1', function(d){return d.source.y})
.attr('x2', function(d){return d.target.x})
.attr('y2', function(d){return d.target.y})


var text = node.append('text')
.text(function(d){return d.name})
.attr('fill', '#f00')
.attr('font-weight', '1.8em')

force.on('tick', function(e){
node.attr('transform', function(d){
      return 'translate(' + d.x + ',' + d.y + ')';
})
})


 







