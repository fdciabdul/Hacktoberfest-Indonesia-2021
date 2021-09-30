/**
*  Directives
*
* Extend HTML code
*/
(function(){
    angular.module('forksDirectives', [])

        .directive('lineGraph', ['$window',function(){
            // Runs during compile
            return {
                restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
                link: function(scope, elem, attrs, controller) {
                    // scope has access to the ForkController scope
                    // console.log(scope.forks);

                    scope.render = function(data) {
                        dates = [];
                        data.forEach(function(fork) {
                            dates.push(fork.created_at);  // fork date in iso-format YYYY-MM-DDTHH:MM:SSZ
                        });
                        // console.log(dates);
                        if (dates.length > 0) {

                            var dateFormat = d3.time.format("%Y-%m-%dT%H:%M:%SZ");
                            //alert(format.parse(dates[0]));
                            //alert(angular.elem($window)[0].innerWidth);
                            var maxDate = dateFormat.parse(dates[0]);
                            var minDate = dateFormat.parse(dates[dates.length - 1]);

                            var lastFork = scope.forksCount - (scope.currentPage - 1) * scope.perPage;
                            var firstFork = Math.max(lastFork - scope.perPage + 1, 1);  // In case there are less forks than perPage, minimun is 1
                            //alert(minDate + " " + maxDate);
                            d3.select(".chart").remove();  // Clean before drawing

                            var h = 400;  /* also set in stylesheet */
                            var pad = {
                                left: 60,
                                bottom: 80
                            }

                            var svg = d3.select(elem[0])
                                        .append('svg')
                                        .attr('class', 'chart')
                                        .style('width', '100%')
                                        .style('height', h)
                                        .style('padding-left','10px');

                            // When applied to a data array, returns coordinate points that will be joined
                            var lineFunction = d3.svg.line()
                                                    .x(function(d, i) { return xScale(dateFormat.parse(d)); })
                                                    .y(function(d, i) { return yScale(firstFork + i); })
                                                    .interpolate("step-after");


                            var xScale = d3.time.scale()
                                            .domain([minDate, maxDate])
                                            .range([pad.left, parseInt(svg.style("width"), 10) - pad.bottom]);

                            var yScale = d3.scale.linear()
                                            .domain([lastFork, firstFork])
                                            .range([pad.left, h - pad.bottom]);

                            var xAxis = d3.svg.axis()
                                            .scale(xScale)
                                            .orient("bottom")
                                            .tickFormat(d3.time.format('%b %-d'));

                            var yAxis = d3.svg.axis()
                                            .scale(yScale)
                                            .orient("left");
                            
                            // Draw X axis
                            svg.append("g")
                                .attr("class", "axis")
                                .attr("transform", "translate(0," + (h - pad.bottom) + ")")
                                .call(xAxis)
                                .selectAll("text")
                                .attr("y", 9)
                                .attr("x", 9)
                                .attr("dy", ".35em")
                                .attr("transform", "rotate(45)")
                                .style("text-anchor", "start");

                            // Draw Y axis
                            svg.append("g")
                                .attr("class", "axis")
                                .attr("transform", "translate(" + pad.left + ", 0)")
                                .call(yAxis);

                            // Draw data tips in graph
                            var tip = d3.tip()
                                .attr('class', 'd3-tip')
                                .offset([120, 40])
                                .html(function(d,i) {
                                    var amount = firstFork + i;
                                    var date = d3.time.format('%I:%M %b %-d, %Y')(dateFormat.parse(d));
                                    var resultString = "Forks count: "+amount;
                                    resultString += "</br>";
                                    resultString += "Date: " + date;
                                    return resultString;
                                });

                            svg.call(tip); 

                            // Draw graph Y axis label
                            svg.append("text")
                              .attr("class", "ylabel")
                              .attr("y", 0) // x and y switched due to rotation!!
                              .attr("x", 0 - (h / 2))
                              .attr("dy", "1em")
                              .attr("transform", "rotate(-90)")
                              .style("text-anchor", "middle")
                              .text("Total forks count");

                            // Draw graph X axis label
                            svg.append("text")
                              .attr("class", "xlabel")
                              .attr("y", h - 10)
                              .attr("x", parseInt(svg.style("width"))/2)
                              .style("text-anchor", "middle")
                              .text("Time");   

                            // Draw graph lines
                            svg.append("path")
                                .attr("d", lineFunction(dates.reverse()))
                                .attr("stroke", "blue")
                                .attr("stroke-width", 2)
                                .attr("fill", "none");

                            // Draw circles
                            svg.selectAll(".dot")
                                  .data(dates)
                                  .enter().append("circle")
                                  .attr('class', 'datapoint')
                                  .attr('cx', function(d) { return xScale(dateFormat.parse(d)); })
                                  .attr('cy', function(d,i) { return yScale(firstFork + i); })
                                  .attr('r', 6)
                                  .attr('fill', 'white')
                                  .attr('stroke', 'steelblue')
                                  .attr('stroke-width', '3')
                                  .on('mouseover', tip.show)
                                  .on('mouseout', tip.hide);

                        }
                        
                    }

                    // Watch for changes in forks in the ForksController
                    scope.$watch('forks', function(newVal, oldVal) {
                        console.log("Forks have been updated");
                        // console.log(newVal[0].created_at);
                        // From here we will render the graph
                        scope.render(newVal);
                    });

                    // Re render the graph after resizing the screen
                    window.onresize = function() {
                        scope.render(scope.forks);
                    };
                }
            };
        }]);
})();