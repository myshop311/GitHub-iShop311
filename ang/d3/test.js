//Width and height
            var margin = {top: 20, right: 20, bottom: 30, left: 40};           
            var width = 600 - margin.left - margin.right;
            var height= 500-margin.top -margin.bottom;
            var w = width;
            var h = height;


            var dataset = [ 5, 10, 13, 19, 21, 25, 22, 18, 15, 13,
                            11, 12, 15, 20, 18, 17, 16, 18, 23, 25 ];

            var labels = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t"];
            var xScale = d3.scale.ordinal()
            .domain(labels)
                            .rangeRoundBands([margin.left, width], 0.05);
            var xAxis = d3.svg.axis().scale(xScale).orient("bottom");


            var yScale = d3.scale.linear()
                            .domain([0, d3.max(dataset)])
                            .range([h,0]);


            //Create SVG element
            var svg = d3.select("body")
                        .append("svg")
                        .attr("width", w)
                        .attr("height", h);

            //Create bars
            svg.selectAll("rect")
               .data(dataset)
               .enter()
               .append("rect")
               .attr("x", function(d, i) {
                    return xScale(i);
               })
               .attr("y", function(d) {
                    return yScale(d);
               })
               .attr("width", xScale.rangeBand())
               .attr("height", function(d) {
                    return h - yScale(d);
               })
               .attr("fill", function(d) {
                    return "rgb(0, 0, 0)";
               });

            svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + 0 + ")")
      .call(xAxis);

            //Create labels
            svg.selectAll("text")
               .data(dataset)
               .enter()
               .append("text")
               .text(function(d) {
                    return d;
               })
               .attr("x", function(d, i) {
                    return xScale(i) + xScale.rangeBand() / 2;
               })
               .attr("y", function(d) {
                    return h - yScale(d) + 14;
               });