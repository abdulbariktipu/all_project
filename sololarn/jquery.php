
<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    </head>
    <body>
        <h1>1.Overview-Getting Started</h1>
        <h1>Getting Started</h1>
        <div id="start">Start</div>
        <script>
            $(function() {
                $("#start").html("Go!");
            });
        </script>
        <h1>-------------------------</h1>
        <p>jQuery is used to select (query) HTML elements and perform "actions" on them.
            Basic syntax is: $("selector").action()
            - The $ accesses jQuery.
            - The (selector) finds HTML elements.
            - The action() is then performed on the element(s).
        </p>
        <p id="demo">Data show</p>
        <script>
            $("p").hide()  // hides all <p> elements
            $(".demo").hide()  // hides all elements with class="demo"
            $("#demo").show()  // hides the element with id="demo"
        </script>
       <h1>-------------------------</h1>
        <h1>1.Overview- Selectors</h1>
        <p class="foot">Some of text</p>
        <img src="/Selectors.png" />
        <script>
            $(".foot").
        </script>
        <h1>-------------------------</h1>
        <h1>2.Attributes and Content - Get  Set Attribute Values</h1>
        <a class="a" href="https://www.sololearn.com/">Click here</a> 
        <script>
            $(function(){
                var test = $(".a").attr("href");
                //alert(test);    
            });            
        </script>
        <h1>-------------------------</h1>
        <a id="test2" href="https://www.sololearn.com/">Click here</a>
        <script>
            $(function(){
                var t = $(".test2").attr("href", "http://www.google.com");
                //alert(t);    
            });            
        </script>
        <h1>-------------------------</h1>
        <h1>Attributes and Content - Removing Attributes</h1>
        <table border="5" class="tbl" >
           <tr>
               <td id="error_msg">one</td>
               <td>two</td>
           </tr>
           <tr>
               <td>three</td>
               <td>four</td>
           </tr>
       </table>
       <script>
        $(function() {
            $("table").removeAttr("border");
            $("table").removeAttr("class"); 
        });
        </script>
        <h1>-------------------------</h1>
        <h1>Attributes and Content - Get & Set Content</h1>
        <h2>Get Content</h2>
        <p id="get">JQuery is <b>fun</b></p>
        <script>
            $(function() {
                var val = $("#get").html();// .text()
                //alert(val);
            });
        </script>
        <h1>-------------------------</h1> 
        <h2>Set Content</h2> 
        <div id="test">
            <p>Hi</p>
            <p id="tipu">some text</p>
        </div>       
         <script>
            $(function(){
               $("#tipu").text("hello!"); 
            });
         </script>
         <h1>-------------------------</h1>
         <h1>Attributes and Content - val()</h1>
         <input type="text" id="name" value="">
         <script>
            $(function(){   
               $("#name").val(); 
            });
         </script>
         <h1>-------------------------</h1>
         <h1>Attributes and Content - Adding Content</h1>
         <p>
            Adding Content

            As we have seen in the previous lessons, the html() and 
            text() methods can be used to get and set the content of a selected element. 
            However, when these methods are used to set content, the existing content is lost.
            jQuery has methods that are used to add new content to a selected element 
            without deleting the existing content: 
            append() inserts content at the end of the selected elements.
            prepend() inserts content at the beginning of the selected elements.
            after() inserts content after the selected elements.
            before() inserts content before the selected elements.
         </p>
         <p id="addContent">Hi </p>
         <script>
            $(function(){   
               $("#addContent").append("Tipu "); 
               //append() inserts content at the end of the selected elements. Inline
               //prepend() inserts content at the beginning of the selected elements.
               //after() inserts content after the selected elements
               //before() inserts content before the selected elements.
            });
         </script>
         
         
         <h1>-------------------------</h1>
         <h1>Adding New Elements</h1>
         <p>The append(), prepend(), before() and after() 
         methods can also be used to add newly created elements.</p>
         
         <p id="newele">Hello</p>
         <script>
            $(function(){   
               var txt = $("<p></p>").text("X");
               $("#newele").after(txt);
            });
         </script>
         
         
         <h1>-------------------------</h1>
         <h1>3. Manipulating CSS</h1>
         <h1>Adding & Removing Classes</h1>
         
         <p>addClass( )</p>
         <div>Some text</div>
         <style>
             .header {
                  color: blue;
                  font-size:x-large;
                }
         </style>
         <script>
            $(function(){
                $("div").addClass("header");
            })
         </script>
         
         <h6>---------</h6>
         
         <p>removeClass()</p>
         <p>removeClass()</p>
         <style>
             .addclass {
                  color: blue;
                  font-size:x-large;
                }
         </style>
         <script>
            $(function(){
                $("p").addClass("addclass")
                $("p").removeClass("addclass");
            })
         </script>
         <h6>---------</h6>
         <p>toggleClass()</p>
         <p id="toglclass">Some text</p>
         <button id="togClass">Toggle Class - Change Color</button>
         <style>
         .red { 
              color:red; 
              font-weight: bold;
            }
        </style>
         <script>
            $("button").click(function(){
                $("#toglclass").toggleClass("red");
            })
         </script>
         
         <h6>---------</h6>
         <h2>CSS Properties</h2>
         <h5>Some text</h5>
         
            <style>
            h5 
                {
                  background-color:red;
                  color: white;
                }
            </style>
            <script>
                $(function() {
                  //alert($("h5").css("background-color"));//tag hote hobe
                  $("h5").css("background-color", "blue");//tag hote hobe
                });
            </script><br />
            
            <p>To set multiple CSS properties, the css() method uses JSON syntax, which is:</p>
            <h4>Some text</h4>
            <script>
                $(function(){
                    $("h4").css({"color":"green", "font-size":"200%", "background-color":"black"});
                })
            </script>
            
         <h6>---------</h6>         
         <h2>Dimensions</h2>
         
         <div id="dimension"></div>
         <script>
             $(function() {
                $("#dimension").css("background-color", "red");
                $("#dimension").width(100);
                $("#dimension").height(100);
            });
         </script>
         
         <h6>---------</h6>
         <div id="dimension2"></div>
         <style>
            #dimension2{
                width: 300px;
                height: 100px;
                padding: 10px;
                margin: 20px;
                border: 3px solid blue;
                background-color: gold;
                color: white;
                font-size: 18px;
            }
         </style>
         <script>
             $(function() {
                var txt = "";
                txt += "width: " + $("#dimension2").width() + " ";
                txt += "height: " + $("#dimension2").height() + "<br/> ";
                txt += "innerWidth: " + $("#dimension2").innerWidth() + " ";
                txt += "innerHeight: " + $("#dimension2").innerHeight() + "<br />";
                txt += "outerWidth: " + $("#dimension2").outerWidth() + " ";
                txt += "outerHeight: " + $("#dimension2").outerHeight();
                $("#dimension2").html(txt);
            });
         </script>
         
         <h1>4. Manipulate DOM</h1>
         <p>Traversing</p>
         <div class="parent">
            <h3 class="chaild">Paragraph</h3>            
         </div>
         <script>
         $(function(){
            var ele = $(".parent").children();
            var pr = $(".chaild").parent();          
         });                     
         </script>
         
        <h6>---------</h6>
        <p>Removing Elements</p>
        
        <p style="color:red">Red</p>
        <p style="color:green">Green</p>
        <p style="color:blue">Blue</p>

        
        <script>
            $(function() {
                $("p").eq(1).remove();
            });
        </script>
        
        <h6>---------</h6>
            <p style="color:red">Red</p>
            <p style="color:green">Green</p>
            <p style="color:blue">Blue</p>
            
            <style>
                 .div {
                     background-color: green;
                     width: 300px;
                     height: 200px;
                 }
            </style>
            
            <script>
                $(function() {
                    //$("div").empty();
                });
            </script>
        
         <h6>---------</h6>
         <h1>5. Events</h1>
         <p class="Hevent">Handling Events</p>
         
           <div id="tt">Click Me</div>
          <script>//javascript
            window.onload = function() {
                var x = document.getElementById("tt");
                x.onclick = function () {
                    document.body.innerHTML = Date();
                }
            };
          </script>
                      
            <script>//JQuery
                $(function() {
                    $("#tt").click(function() {
                        $("body").html(Date());
                    });
                });
            </script>
            
            <h6>---------</h6>
            <h6>Common Events</h6>
            <p>The following are the most commonly used events:
                Mouse, Events
                click, occurs when an element is clicked.
                dblclick, occurs when an element is double-clicked.
                mouseenter, occurs when the mouse pointer is over (enters) the selected element.
                mouseleave, occurs when the mouse pointer leaves the selected element.
                mouseover, occurs when the mouse pointer is over the selected element.
                
                Keyboard Events
                keydown, occurs when a keyboard key is pressed down.
                keyup, occurs when a keyboard key is released.
                
                Form Events:
                submit, occurs when a form is submitted.
                change, occurs when the value of an element has been changed.
                focus, occurs when an element gets focus.
                blur, occurs when an element loses focus.
                
                Document Events: 
                ready, occurs when the DOM has been loaded.
                resize, occurs when the browser window changes size.
                scroll, occurs when the user scrolls in the specified element.
            </p>
            
            <input type="text" id="keyup"  />            
            <div id="msg"></div>
            <script>
                $(function(){
                    $("#keyup").keyup(function(){
                       $("#msg").html($("#keyup").val()); 
                       
                    });
                });
            </script>
            
            <h6>---------</h6>
         <p>Handling Events</p>
         <div id="demoDate">Click Me</div>
         <script>
            $(function() {
                $( "#demoDate" ).on( "click", function() {
                    $("body").html(Date());
                    //alert(Date());                   
                });
            });
         </script>
         
         <h6>---------</h6>
        <p>Handling Events off()</p>
         <div id="demoDateOff">Click Me</div>
         <script>
            $(function() {
                $("#demoDateOff").on( "click", function() {
                    $("body").html(Date());
                    //alert(Date());
                    $("#demoDateOff").off("click");
                });
            });
         </script>
         
         <h6>---------</h6>
         <p>The Event Object</p>
         <a href="https://www.sololearn.com">Click me</a>
         <script>
            $(function() {
                $( "a" ).click(function(event) {
                    alert(event.pageY);
                    event.preventDefault();
                });
            });
         </script>
         
         <h6>---------</h6>
         <p>Trigger Events</p>
         <div class="trigar">click me</div>
         <script>
            $(function() {
                $(".trigar").click(function(){
                    //alert("Clicked!");
                });
                $(".trigar").trigger("click");
            });
         </script>
         
         <h6>---------</h6>
         <h1 class="todo">Creating a To-Do List</h1>
         
        
        <textarea type="text"></textarea>
        <button id="add">Add</button>
        <ol id="mylist"></ol>
        
        <style>
            h1.todo {
                color: #1abc9c;
            }
            .rem {
                margin-left: 5px;
                background-color: white;
                color: red;
                border: none;
                cursor: pointer;
            }
        </style>
        
        <script>
            $(function() {
                $("#add").on("click", function() {
                    var val = $("textarea").val();
                    if(val !== '') {
                        var elem = $("<li></li>").text(val);
                        $(elem).append("<button class='rem'>X</button>");
                        $("#mylist").append(elem);
                        $("textarea").val("");
                        $(".rem").on("click", function() {
                            $(this).parent().remove();
                        });
                    };
                });
            });
        </script>

        <h6>---------</h6>
        <h1>6. Hide/Show, Fade, Slide</h1>
        <h3>Show/Hide</h3>

        <p id="ShowHide">Click me Show/Hide</p>
        <div id="detail">
             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>

        <script>
            $(function(){
                $("#ShowHide").click(function(){
                    $("#detail").toggle(1000);
                });
            });
        </script>

        <h6>---------</h6>
        <h3>fadeToggle In/Out</h3>

        
        <button id="fadeToggle">Click me Show/Hide</button>
        <div id="fadeToggle2">
             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>

        <script>
            $(function(){
                $("#fadeToggle").click(function(){
                    $("#fadeToggle2").fadeToggle(1000);//fadeTo(1500, 0.7);
                });
            });
        </script>

        <h6>---------</h6>
        <h3>Slide Up/Down slideToggle()</h3>

        <button id="SlideUpDown">Click me Show/Hide</button>
        <div id="SlideUpDown2">
             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>

        <script>
            $(function(){
                $("#SlideUpDown").click(function(){
                    $("#SlideUpDown2").slideToggle(1000);//fadeTo(1500, 0.7);
                });
            });
        </script>


        <h6>---------</h6>
        <h3>animate()</h3>
        
        <img id="animate" src="Selectors.png" style="width: 100px; height: 100px;">

        <script>
            $(function(){
                $("#animate").click(function(){
                    $("#animate").animate({width:'500px', height:'500px'},1000);
                    //width: '+=250px', height: '+=250px'
                    //To stop an animation before it is finished, jQuery provides the stop() method.
                });
            });
        </script>     

        <h6>---------</h6>
        <h3>Animation Queue</h3>        
        
        <div id="aniQue"></div>

        <style>
        div#aniQue {
            background:orange;
            height:80px;width:80px;
            position:absolute;
            border-radius: 50%;
            opacity: 0.5;
        }
        </style>
        <script>
            $(function() {
                $("#animate").click(function(){
                var div = $("#aniQue");
                div.animate({opacity: 1});
                div.animate({height: '+=100px', width: '+=100px', top: '+=100px'}, 500);
                div.animate({height: '-=100px', width: '-=100px', left: '+=100px'}, 500);
                div.animate({height: '+=100px', width: '+=100px', top: '-=100px'}, 500);
                div.animate({height: '-=100px', width: '-=100px', left: '-=100px'}, 500);
                div.animate({opacity: 0.5});
            
                });
            }); 
        </script>     

        <h6>---------</h6>
        <h3>Creating a Drop-Down Menu</h3>        
        
        <div class="menu">
          <div id="item">Dropdown</div>
          <div id="submenu">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
          </div>
        </div>

        <style>
            #item {
                background-color: #4CAF50;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }
            #item:hover, #item:focus {
                background-color: #3e8e41;
            }
            .menu {
                position: relative;
                display: inline-block;
            }
            #submenu {
                display: none;
                position: absolute;
                background-color: #3e8e41;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }
            #submenu a {
                color: white;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }
            #submenu a:hover {
                background-color: #4CAF50
            }
        </style>
        
        <script>
            $(function() {
                $("#item").click(function() {
                    $("#submenu").slideToggle(500);
                });
            }); 
        </script>         

    </body>
</html>



















