// target elements with the "draggable" class
            interact('.draggable')
            .draggable({
                       // enable inertial throwing
                       inertia: true,
                       // keep the element within the area of it's parent
                       restrict: {
                       restriction: "parent",
                       endOnly: true,
                       elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
                       },
                       // enable autoScroll
                       autoScroll: true,
                       
                       // call this function on every dragmove event
                       onmove: dragMoveListener,
                       // call this function on every dragend event
                       onend: function (event) {
                       var textEl = event.target.querySelector('p');
                       
                       textEl && (textEl.textContent =
                                  'moved a distance of '
                                  + (Math.sqrt(event.dx * event.dx +
                                               event.dy * event.dy)|0) + 'px');
                       }
                       });
                       
                       function dragMoveListener (event) {
                           var target = event.target,
                           // keep the dragged position in the data-x/data-y attributes
                           x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
                           y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;
                           
                           // translate the element
                           target.style.webkitTransform =
                           target.style.transform =
                           'translate(' + x + 'px, ' + y + 'px)';
                           
                           // update the posiion attributes
                           target.setAttribute('data-x', x);
                           target.setAttribute('data-y', y);
                       }
        
        // this is used later in the resizing and gesture demos
        window.dragMoveListener = dragMoveListener;
        
        
        var saveid = new Array(); 
        
            var Shenk=0;
        // enable draggables to be dropped into this
        interact('.dropzone').dropzone({
            
         
                                       // only accept elements matching this CSS selector
                                       accept: '.draggable',
                                       // Require a 75% element overlap for a drop to be possible
                                       overlap: 0.75,
                                       
                                       // listen for drop related events:
                                       
                                       ondropactivate: function (event) {
                                       // add active dropzone feedback
                                       event.target.classList.add('drop-active');
                                       
                                       },
                                       ondragenter: function (event) {
                                       var draggableElement = event.relatedTarget,
                                       dropzoneElement = event.target;
                                       
                                       // feedback the possibility of a drop
                                       dropzoneElement.classList.add('drop-target');
                                       draggableElement.classList.add('can-drop');
                                       //draggableElement.textContent = 'Dragged in';
                                       },
                                       ondragleave: function (event) {
                                       // remove the drop feedback style
                                       event.target.classList.remove('drop-target');
                                       event.relatedTarget.classList.remove('can-drop');
                                       //event.relatedTarget.textContent = 'Dragged out';
                                          console.log('out the box detected');
                                          saveid.splice(saveid.indexOf(event.relatedTarget.id),1);
                                          console.log("final list: ");
                                        for(var o=0;o<saveid.length;o++){
                                          console.log(saveid[o]);
                                            
                                        }
                                        Shenk=0;
                                       },
                                          
                                       ondrop: function (event) {
                                       //event.relatedTarget.textContent = 'Dropped';
                                     //  console.log(event.relatedTarget.id);
                                      //console.log('pushed ');
                                            
                                       for(var i = 0; i< saveid.length; i++){
                                           if(saveid[i]==event.relatedTarget.id){
                                                console.log('already in the list');
                                                    Shenk=1;
                                           }
                                           //console.log('pushed1 ');
                                           
                                       }
                                    if(Shenk==0){
                                            
                                            saveid.push(event.relatedTarget.id);
                                          
                                        }
                                        for(var o=0;o<saveid.length;o++){
                                          console.log(saveid[o]);
                                            
                                        }
                                             //console.log('pushed2 ');
                                             Shenk=0;
                                      //  console.log('pushed '+event.relatedTarget.id+' to list');
                                        
                                       },
                                       ondropdeactivate: function (event) {
                                       // remove active dropzone feedback
                                       event.target.classList.remove('drop-active');
                                       event.target.classList.remove('drop-target');
                                       }
                                       });


      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
         'Western', 'Literature', { role: 'annotation' } ],
        ['2010', 10, 24, 20, 32, 18, 5, ''],
        ['2020', 16, 22, 23, 30, 16, 9, ''],
        ['2030', 28, 19, 29, 30, 12, 13, '']
      ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
         isStacked: true,
          bars: 'horizontal' // Required for Material Bar Charts.
         
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
