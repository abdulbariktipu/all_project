<!DOCTYPE HTML>
<html>
    <head>
        <title>First Page</title>
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/demo.js"></script>

        <style>
            .test{
                color: green;
            }
        </style>
    </head>
    <body>
        <!-- Paragraph -->
        <p>This is a paragraph.</p>
        <p>This is <br> another paragraph.</p>
        <p>Some of text</p>
        <p><b>Some of text is bold</b></p>
        <p><big>Some of text is big</big></p>
        <p><i>Some of text is italic </i></p>
        <p><small>Some of text is small </small></p>
        <p><strong>Some of text is strong </strong></p>
        <p><sub>Some of text is subscripted</sub></p>
        <p><sup>Some of text is superscripted</sup></p>
        <p><ins>Some of text is inserted</ins></p>
        <p><del>Some of text is deleted </del></p>

        <!-- Headings -->
        <h1>This is headline 1</h1>
        <h2>This is headline 2</h2>
        <h3>This is headline 3</h3>
        <h4>This is headline 4</h4>
        <h5>This is headline 5</h5>
        <h6>This is headline 6</h6>

        <p>This is a paragraph.</p>
    <hr/>
        <p>This is a paragraph.</p>


        <!-- Comments -->
        <p><This is a comment: <!--This is a comment--></p>
        <p>This is a Comment.</p>

    <!-- Attributes -->
        <p align="center">
            This text is aligned to center
        </p>

        <p align="center">
            This a text <br> <hr width="10%" align="right"/> This is also text
        </p>
        <p align="center">
            This a text <br> <hr width="50%" align="left"/>
        </p>

        <!-- Attributes -->
        <p>Original Pic</p>
    <img src="img/tree.jpg">
        <p>Size height="150px" width="150px" </p>
        <img src="img/tree.jpg" height="150px" width="150px">

        <!-- The a Tag -->
        <p>The a Tag</p>
    <a href="www.l2nsoft.com" target="_blank">L2N Software Ltd Link</a>

        <!-- List -->
        <p>Order List </p>
    <ol>
        <li>Order List 1</li>
        <li>Order List 2</li>
        <li>Order List 3</li>
    </ol>
        <!--Unordered List-->
    <p>Unordered List </p>
    <ul>
        <li>Unordered List 1</li>
        <li>Unordered List 2</li>
        <li>Unordered List 3</li>
    </ul>

        <!--Creating a Table-->
        <p>Creating a Table</p>
        <table border="3">
            <tr>
                <td bgcolor="red">Read</td>
                <td bgcolor="blue">Blue</td>
                <td bgcolor="green">Green</td>
            </tr>
            <tr>
                <td>Yellow</td>
                <td colspan="2">Orange</td>
            </tr>
        </table>

<!-- Elements -->
        <p>Using Div</p>
    <div style="background-color: green; color: white; padding: 20px">
        <p>Some paragraph text goes here.</p>
        <p>Another paragraph goes here.</p>
    </div>

    <h2>
        Some
        <span style="color: blue">Important</span>
        Message
    </h2>

        <!-- Form -->
        <p>Form</p>
           <form action="www.sololearn.com" method="post">
                Name: <input type="text" name="username"><br><br>
                Password: <input type="password" name="password" /><br>
               <input type="radio" name="gender" value="male" /> Male <br />
               <input type="radio" name="gender" value="female" /> Female <br />
               <input type="submit" name="submit" value="Insert" />
           </form>

        <!--HTML Color-->
        <h1>
            <font color="#FF0000"> White headline </font>
        </h1>

    <p>The frame Tag<br> Frames not supported</p>
        <frameset cols="25%,50%,25%">
            <frame src="a.htm" />
            <frame src="b.htm" />
            <frame src="c.htm" />
            <noframes>Frames not supported!</noframes>
        </frameset>


        <h2>HTML 5 START </h2>
        <p>Intoduncton to HTML 5</p>
            <p>First Using: !DOCTYPE HTML and charset="UTF-8"</p>
        <meta charset="UTF-8">

        <h3>The header Element </h3>
        <header>
            <h1>Some of text</h1>
            <h3>Some of text</h3>
        </header>

        <!-- Nav -->
    <h3>The nav Element</h3>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>

        <!-- Footer -->
    <h3>The footer Element </h3>
        <footer>
            <p>Posted by: Hege Refsnes</p>
            <p>Contact info: <a href="#">someone@example.com</a>.</p>
        </footer>

        <!-- article, section & aside -->
        <h2>article, section & aside</h2>
        <h3>The article Element</h3>
    <article>
        <h1>The article title</h1>
        <p>Contents of the article element </p>
    </article>

        <!-- section -->
    <h3>The section Element</h3>
        <article>
            <h1>The article title</h1>
            <section>
                <h1>Heading</h1>
                <p>Content or image or others</p>
            </section>
            <p>Contents of the article element </p>
        </article>

        <!-- aside -->
    <h3>The aside Element</h3>
        <aside>
            <p> Some of text</p>
        </aside>

        <!--Progress Bar-->
    <h3>Progress Bar</h3>
    Status: <progress min="0" max="100" value="35"></progress>



    <!-- SVG-->
    <h2>SVG, Scalable Vector Graphics</h2>

        <h3>circle, Drawing a Circle</h3>
        <svg width="100%" height="100%">
            <circle cx="80" cy="80" r="50" fill="green"></circle>
        </svg>

        <h3>rect, defines a rectangle</h3>
        <svg width="100%" height="100%">
            <rect width="300" height="100" x="20" y="20" fill="red"></rect>
        </svg>



        <h3>ellipse</h3>
        <svg width="500px" height="200" style="padding-bottom: 50px">
            <ellipse cx="200" cy="100" rx="150" ry="70" style="fill:green"/>
        </svg>

        <h3>polygon</h3>
        <svg width="100%" height="300">
            <polygon points="100 100, 200 200, 300 0"
                     style="fill: green; stroke:black;" />
        </svg>

        <h3>Shape Animations</h3>
        <svg width="1000" height="250">
            <rect width="150" height="150" fill="orange"
                  <animate attributeName="x" from="0" to="300"
                           dur="3s" fill="freeze" repeatCount="2"/>
            </svg>
        </svg>

        <h3>New Attributes</h3>
        <form autocomplete="off">
            <label for="email">Your e-mail address: </label>
            <input type="text" name="email" placeholder="email@example.com" required /><br>
            Search: <input id="mysearch" name="searchitem" type="search" /><br>

            <input id="car" type="text" list="colors" />
            <datalist id="colors">
                <option value="Red">
                <option value="Green">
                <option value="Yellow">
            </datalist>
        </form>



    <h1>CSS Fundamentals</h1>

<p class="test">Embedded or Internal CSS</p>

        <p style="color:white; background-color:gray;">
            This is an example of inline styling.
        </p>


        <p class="external">External CSS</p>


        <div id="intro">
            <p class="first">This is a <em> paragraph.</em></p>
            <p> This is the second paragraph. </p>
        </div>
        <p class="first"> This is not in the intro section.</p>
        <p> The second paragraph is not in the intro section. </p>

        <p style="color: red"> In LIne CSS</p>

        <p class="font-family"> Font-Family</p>

<h2>The font-weight Property</h2>
        <p class="light">This is a font with a "lighter" weight.</p>
        <p class="bold">This is a font with a "bold" weight.</p>
        <p class="bolder">This is a font with a "bolder" weight.</p>

        <h2>The font-variant Property </h2>
        <p class="normal">Paragraph font variant set to normal.</p>
        <p class="small">Paragraph font variant set to small-caps.</p>




        <h2>The text-shadow Property </h2>
        <h1 class="shadow">The text-shadow Property</h1>


        <h1 class="Blur-Effect"> text-shadow with Blur Effect</h1>


        <p class="capitalize">
            The value capitalize transforms the first
            character in each word to uppercase;
            all other characters remain unaffected.
        </p>





    <h1>CSS-3</h1>
        Vendor Prefixes

        <div style="-moz-border-radius: 24px; border-radius: 24px; border: 1px solid green; width: 200px; padding: 25px; margin: 10px;">
            Rounded corners!
        </div>


        <div style="border-radius: 0 0 20px 20px; background-color: green; color: white; padding: 5px;">
            Only Bottom Rounded
        </div>

        Creating a Circle
    <div style="width: 200px; height: 200px; border-radius: 100px; color: blue; background-color: green;">
        <p>Test</p>
    </div>

        The box-shadow Property
        <div style="width: 200px; height: 200px; background-color: green; box-shadow: 10px 10px #888888;">
            <p>Some of text</p>
        </div><br>


        Blur and Spread
        <div style="width: 200px; height: 200px; background-color: green; box-shadow: 10px 10px 5px 5px #888888;">
            <p>Some of text</p>
        </div><br>

        Negative Values
        <div style="width: 200px; height: 200px; background-color: green; margin-left: 10px; box-shadow: -10px -10px 5px -5px #888888;">
            <p>Some of text</p>
        </div><br>


        Creating an Inner Shadow
        <div style="width: 200px; height: 200px; background-color: green; margin-left: 10px; box-shadow: inset -20px -20px 5px -5px #888888;">
            <p>Some of text</p>
        </div><br>


        <div style="width: 200px; height: 200px; background-color: green; margin-left: 10px; box-shadow: inset 10px 10px 5px 5px #888888;">
            <p>Some of text</p>
        </div><br>

        Layering Multiple Shadows
        <div style="width: 200px; height: 200px; background-color: green; margin-left: 10px; box-shadow: inset 10px 10px 5px 5px #888888, inset -10px -10px 5px 5px #888888;">
            <p>Some of text</p>
        </div><br>

        Layering Multiple Shadows
        <div style="width: 200px; height: 200px; background-color: green; margin-left: 10px ; width: 300px; height: 100px;
            box-shadow: 0 0 10px 4px #FF6347, 0 0 10px 30px #FFDAB9, 0px 0 20px 30px #B0E0E6;">
            <p>Some of text</p>
        </div><br>



        Transparency Effect
        <style>
            div.bgimg {
                background:url("http://www.sololearn.com/images/bg2.jpg");
            }
            nav {
                padding: 50px 0;
                min-width: 500px;
            }
            nav ul {
                background: linear-gradient(100deg,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.2) 25%,
                rgba(255, 255, 255, 0.2) 75%,
                rgba(255, 255, 255, 0) 100%);
                box-shadow: 0 0 25px rgba(0, 0, 0, 0.1),
                inset 0 0 1px rgba(255, 255, 255, 0.6);
            }
            nav ul li {
                display: inline-block;
            }
            nav ul li a {
                padding: 10px;
                color: #FFFFFF;
                font-size: 18px;
                font-family: Arial;
                text-decoration: none;
                display: block;
            }
        </style>
        <div class="bgimg">
            <nav>
                <ul>
                    <li><a href="#">COURSES</a></li>
                    <li><a href="#">DISCUSS</a></li>
                    <li><a href="#">TOP LEARNERS</a></li>
                    <li><a href="#">BLOG</a></li>
                </ul>
            </nav>
        </div>

        ---------The text-shadow Property-------------
        <h1 style="text-shadow: 0px 5px 3px blue; ">Add a 25-pixel left and 15-pixel down blue text-shadow.</h1>

        <h3>Working with Pseudo Elements</h3>
        <style>
            #first p:first-child
            {
                color: green;
            }
        </style>
        <div id="first">
            <p>Some Of Text</p>
            <p>Some Of Text</p>
            <p>Some Of Text</p>
            <p>Some Of Text</p>
        </div>
----------------------------------------
        <style>
            #parent p:last-child
            {
                color: green;
            }
        </style>
        <div id="parent">
            <p>Some Of Text</p>
            <p>Some Of Text</p>
            <p>Some Of Text</p>
            <p>Some Of Text</p>
        </div>

       <h3>---------Working with Pseudo Elements----------</h3>
        <style>
            .line p::first-line
            {
                color: green;
            }
        </style>
        <div class="line">
            <p>First LIne: In the example below,  pseudo element is used to style the first line of our text:<br> Last Line: Add a 25-pixel left and 15-pixel down blue text-shadow. </p>
        </div>

        <h3>Before</h3>
        <style>
            .befor p::before
            {
                content: url("http://www.sololearn.com/images/bullet.jpg");
                content: "Test-";
            }
        </style>
        <div class="befor">
            <p>You can insert text, images, and other resources using pseudo element.</p>
            <p>You can insert text, images, and other resources using <strong>:before </strong>pseudo element.</p>
            <p>You can insert text, images, and other resources using <strong>:before </strong>pseudo element.</p>
        </div>

        <h3>---------------- The word-wrap Property-------------------</h3>
            <style>
                .word-wrap-normal p
                {
                    width: 200px;
                    height: 100px;
                    border: 1px solid;
                    word-wrap: normal;
                }
                .word-wrap-normal-break-word p
                {
                    width: 210px;
                    height: 100px;
                    border: 1px solid #000000;
                    word-wrap: break-word;
                }

            </style>
        <div class="word-wrap-normal">
            <p>The word-wrap property allows long words to be broken and wrapped into the next line. It takes two values: normal and break-word. </p>
        </div>

        <style>
            .word-wrap-normal-break-word p
            {
                width: 210px;
                height: 100px;
                border: 1px solid green;
                word-wrap: break-word;
            }
        </style>
        <div class="word-wrap-break-word">
            <p>The word-wrap property allows long words to be broken and wrapped into the next line. It takes two values: normal and break-word. </p>
        </div>

        ----------Using the @font-face Rule---------------
        <style>
            @font-face {
                font-family: Delicious;
                src: url("http://www.sololearn.com/uploads/fonts/Delicious-Roman.otf");
            }
            @font-face {
                font-family: Delicious;
                font-weight: bold;
                src: url("http://www.sololearn.com/uploads/fonts/Delicious-Bold.otf");
            }
            h1.font-face{
                font-family:  sans-serif;
            }
        </style>
        <h1 class="font-face">This is Our Headline</h1>

        <h1>Linear Gradients</h1>
    -----------Creating Linear Gradients-----------------
        <style>
            div p.gradient{
                float: left;
                width: 100%;
                height: auto;
                color: white;
                background: -moz-linear-gradient(deepskyblue,black);
            }
        </style>
    <div>
        <p class="gradient">CSS3 gradients enable you to display smooth transitions between two or more specified colors. CSS3 defines two types of gradients: Linear and Radial.
                <br>
            To create a linear gradient, you must define at least two color stops. Color stops are the colors among which you want to render smooth transitions. You can also set a starting point and a direction - or an angle - along with the gradient effect.
            In the example below, the colors blue and black are used to create a linear gradient from top to bottom.</p>
    </div><br>

            <!--------Color Stops----------><br>

        <style>
            .multipule-color {
                float: left;
                width: 300px;
                height: 100px;
                margin: 4px;
                color: #FFF;
                background: linear-gradient(blue, yellow, green, pink, white);
            }
        </style>
        <div class="multipule-color">Multiple Colors</div>


    <!------Color stop positions can be specified for each color.--------->
        <style>
            .color-stop {
                float: left;
                width: 300px;
                height: 100px;
                margin: 4px;
                color: #FFF;
                background: linear-gradient(blue 20%, yellow 30%, green 85%);
            }
        </style>

        <div class="color-stop">Color Stops</div>

        <!-----------Direction of the Gradient-------------->
        <style>
            .first {
                float: left;
                width: 300px;
                height: 100px;
                margin: 4px;
                color: #FFF;
                background: -webkit-linear-gradient(right,blue,green,white);
                background: -webkit-linear-gradient(right,blue,green,white);
                background: -webkit-linear-gradient(right,blue,green,white);
            }
            .second {
                float: left;
                width: 300px;
                height: 100px;
                margin: 4px;
                color: #FFF;
                background: -webkit-linear-gradient(top,blue,green,white);
                background: -webkit-linear-gradient(top,blue,green,white);
                background: -webkit-linear-gradient(top,blue,green,white);

            }
        </style>
        <div class="first">Right to left</div>
        <div class="second">Top to Bottom </div><br><br><br><br><br><br><br><br>

    <!-----------Angle of the Gradient------------>
    <style>
        div.g-first {
            float: left;
            width: 300px;
            height: 100px;
            margin: 4px;
            color: #FFF;
            background:-moz-linear-gradient(bottom left, blue, green, white);
        }
        div.g-second {
            float: left;
            width: 300px;
            height: 100px;
            margin: 4px;
            background:-moz-linear-gradient(100deg, blue, green, white);
        }
    </style>

        <div class="g-first">Bottom Left</div>
        <div class="g-second">100 deg</div>


<!--------------Repeating a Linear-Gradient------------->
        <style>
            .repet-g {
                float: left;
                width: 300px;
                height: 100px;
                margin: 4px;
                margin-bottom: 50px;
                padding-bottom: 50px;
                color: #FFF;
                background: repeating-linear-gradient(blue, green 20px);
            }
        </style>
        <div class="repet-g">Repeating Gradient</div><br><br><br><br><br><br><br>

        <!--------------Radial Gradient Position------------->
        <style>
            div.r-first {
                height: 150px;
                width: 200px;
                color: #FFF;
                background: -moz-radial-gradient(top left, green, yellow, blue);
            }
            div.r-second {
                height: 150px;
                width: 200px;
                color: #FFF;
                background: -moz-radial-gradient(green 5%, yellow 15%, blue 60%);
            }
        </style>
        <div class="r-first">Ellipse (Default)</div>
        <br />
        <div class="r-second">Circle</div><br>



        <!--The background-size Property-->
        <style>
            .bg-size {
                height: 200px;
                width: 200px;
                border: 1px solid #000;
                background: url("http://www.sololearn.com/uploads/css_logo.png") no-repeat 50% 50%;
                background-size: 200px 200px;
            }
        </style>
        <div class="bg-size"></div>

<h1>Gradients & Backgrounds to start</h1>

        ---------The background-clip Property-----------
    <style>
        #bg-clip-first {
            border: 2px dotted black;
            padding: 20px;
            background: LightBlue;
            background-clip: padding-box;
            width: 200px;
            height: 150px;
        }
        #bg-clip-second {
            border: 2px dotted black;
            padding: 20px;
            background: LightBlue;
            background-clip: content-box;
            background-image: url("img/tree.jpg");
            width: 200px;
            height: 150px;
        }
    </style>
    <div id="bg-clip-first">
        <p>Some of text first</p>
    </div> <br/>
    <div id="bg-clip-second">
        <p>Some of text second</p>
    </div>



        ---------Transparent Borders with background-clip-----------
        <style>
            #bg-clip-Borders {
                border: 20px solid rgba(0, 0, 0, 0.3);
                width:300px;
                position:absolute;
                left:50px;
                background-color:white;
            }
        </style>

        <div id="bg-clip-Borders">
            In the screenshot, the borders use RGBa to be transparent, but they appear solid gray, because they areonly
                revealing the solid white background itself
        </div>
        Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some
        text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some
        text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some
        text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some
        text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some
        text Some text Some text Some text Some text Some text Some text Some text Some text Some text


        ---------------Multiple Background Images-----------------------
        <style>
            .multiple-bg-img
            {
                width: 400px;
                height: 300px;
                background-image: url("http://www.sololearn.com/uploads/css_logo.png"),
                                url("http://www.sololearn.com/uploads/better-code.jpg");
                background-position: right bottom, left top;
                background-repeat: no-repeat;
                border: 2px solid green;
                border-radius: 20px 0px 20px 0px;
            }
        </style>
    <div class="multiple-bg-img">
        <p>Some Of Text</p>
    </div>
-----------The opacity Property------------
        <style>
            #img1
            {
                opacity: 1;
            }
            #img2
            {
                opacity: 0.5;
            }
            #img3
            {
                opacity: 0.25;
            }
        </style>
    <div>
        <img id="img1" src="http://www.sololearn.com/uploads/css_logo.png" />
        <br />
        <img id="img2" src="http://www.sololearn.com/uploads/css_logo.png" />
        <br />
        <img id="img3" src="http://www.sololearn.com/uploads/css_logo.png" />
    </div>


---------The Transition Property------------
        <style>
            .transition
            {
                width: 80px;
                height: 80px;
                background: green;

                -webkit-transition: width 3s;
                -moz-transition: width 3s;
                -ms-transition: width 3s;
                -o-transition: width 3s;
                transition: width 3s;
            }
            .transition:hover
            {
                width: 250px;
            }
        </style>
<div class="transition">
    Some of text
</div>

        ---------CSS3 Transforms------------
        <style>
            .positive-value
            {
                width: 200px;
                height: 100px;
                margin-bottom: 30px;
                margin-top: 30px;
                background: green;
                -webkit-transform: rotate(10deg);
                -moz-transform: rotate(10deg);
                -ms-transform: rotate(10deg);
                -o-transform: rotate(10deg);
                transform: rotate(10deg);
            }
            .negative-value
            {
                width: 200px;
                height: 100px;
                margin-bottom: 30px;
                margin-top: 30px;
                background: green;
                -webkit-transform: rotate(-10deg);
                -moz-transform: rotate(-10deg);
                -ms-transform: rotate(-10deg);
                -o-transform: rotate(-10deg);
                transform: rotate(-10deg);
            }

        </style>
        <div class="positive-value">
            Some of text
        </div>
                <br/>
        <div class="negative-value">
            Some of text
        </div>

-----------Keyframes & Animation-------------
        <style>
            .animation
            {
                width: 200px;
                height: 100px;
                background-color: green;

                -webkit-animation-name: colorchange;
                -moz-animation-name: colorchange;
                -o-animation-name: colorchange;
                animation-name: colorchange;

                -webkit-animation-name: font-color-change;
                -moz-animation-name: font-color-change;
                -o-animation-name: font-color-change;
                animation-name: font-color-change;
                
                -webkit-animation-duration: 1s;
                -moz-animation-duration: 1s;
                -o-animation-duration: 1s;
                animation-duration: 1s;

                -webkit-animation-iteration-count: infinite;
                -moz-animation-iteration-count: infinite;
                -o-animation-iteration-count: infinite;
                animation-iteration-count: infinite;
            }
            @keyframes font-color-change {
                0% {color: #2b542c}
                50% {color: #8a6d3b}
                100% {color: #31708f}
            }
            @-webkit-keyframes colorchange {
                0% {background-color: red; }
                50% {background-color: green; }
                100% {background-color: blue; }
            }

        </style>
        <div class="animation">
            <p>Some of text</p>
        </div>




    <h1>JavaScript</h1>
    <script>
        //This is a single line comment
        document.write("Hello World");

        var x = 10;
        document.write(x);

         var price = 55.55;
        document.write(price);


        var sayHello = 'Hello world \'I am a JavaScript programmer\'';
        document.write(sayHello);
    </script>

    <br>
    <script>
        var x = 10 + 5;
        document.write(x);
    </script>
    <br>
        <script>
            var x = 10;
            var y = x+10+5+5+10;
            document.write(y);
        </script>
<br>
<script>
    var myVariable = 38 % 5;
    document.write(myVariable);
</script>

<br>
<script>
    var a =0;b = 10;
    var a = b++;
    document.write(b);
</script>
    <br>
    <script>
        var x = (100 + 50) * 3;
        document.write(x);
    </script>
<br>
        Logical Operators <br>
    <script>
        var age = 42;
        var isAdult = (age < 18) ? "Too young": "Old enough";
        document.write(isAdult);
    </script>

        String Operators<br>
    <p>The most useful operator for strings is concatenation, represented by the + sign.
        Concatenation can be used to build strings by joining together multiple strings, or by joining strings with other types:
    </p>
        <br>
    <script>
        var myString1 = "I am learning ";
        var myString2 = "JavaScript.";
        document.write(myString1+myString2);
    </script>

    <br>
    <script>
        var myNum1 = 10;
        var myNum2 = 5;
        if (myNum1 > myNum2){
            //alert("JavaScript is easey to learn.");
        }
    </script>

        <br>
        <script>
            var course = 1;
            if (course == 1) {
                document.write("<h1>HTML Tutorial</h1>");
            } else if (course == 2) {
                document.write("<h1>CSS Tutorial</h1>");
            } else {
                document.write("<h1>JavaScript Tutorial</h1>");
            }
        </script>
        The For Loop
        <br>
        <script>
            for (i=1; i<=5; i++) {
                document.write(i+"<br>");
            }

            "<br>"
            var i = 0;
            for (; i < 10; ) {
                document.write(i);
                i++;
            }
            "<br>"
            var x = 0;
            for (; x <= 20; x +=2)
            {
                document.write(x);
            }
        </script>
        <br>
        <script>
            var x = 0;
            for (; x <= 20; x +=2)
            {
                document.write(x);
            }
        </script>


        <br>
        <script>
            var sum=0;
            for(i=4; i<8; i++) {
                if (i == 6) {
                    continue;
                }
                sum += i;
            }
            document.write(sum);
        </script>
        <br>
        <script>

            var x = 0;
            while(x<6) {
                x++;
            }
            document.write(x);
        </script>
        <br>
        <script>
            var name = "Tipu";
            var age = 50;
            function sayHello(name, age) {
                document.write( name + " is " + age + " years old.");
            }
            sayHello(name, age)
        </script>

        <br>
        <script>
            function myFunction(a,b) {
                return a * b;
            }
            var x = myFunction(5, 6);
            document.write(x);
        </script>

        <br>
        Function Return
        <br>
        <script>
            function addNumbers(a,b) {
                var c = a+b;
                return c;
            }
            document.write(addNumbers(40,2));
        </script>
        <br>
        Prompt Box
        <br>
        <script>
            //var user = prompt("Please enter your name");
            //alert(user);
        </script>

        <br>
        Function Return
        <br>
        <script>
            //var result = confirm("Do you really want to leave this page?");
            if (result == true) {
                //alert("Thanks for visiting");
            }
            else {
                //alert("Thanks for staying with us");
            }

            function test(number)
            {
                while(number < 5) {
                    number++;
                }
                return number;
            }
            alert(test(2));
        </script>

        <br>
        Function Return
        <br>
        <script>
            function test(number)
            {
                while(number < 5) {
                    number++;
                }
                return number;
            }
            //alert(test(2));
        </script>
        <script>
        function person(name, age, color) {
        this.name = name;
        this.age = age;
        this.favColor = color;
        }

        var p1 = new person("John", 42, "green");
        var p2 = new person("Amy", 21, "red");

        document.write(p1.age);
        document.write(p2.name);

        </script>

    <br>Using Object Initializers
        <script>
            var John = {name: "John", age: 25};
            var James = {name: "James", age: 21};

            document.write(John.age);

        </script>

        <br>Call the method as usual:
        <script>
            function person(name, age) {
                this.name= name;
                this.age = age;
                this.yearOfBirth = bornYear;
            }
            function bornYear() {
                return 2017 - this.age;
            }

            var p = new person("A", 27);

            document.write(p.yearOfBirth());

        </script>
<br/>What is the result of the following expression?
        var myString = "abcdef";
        document.write(myString.length);
        <script>
        var myString = "abcdef";
        document.write(myString.length);
        </script>

        <br/> Date and Time
        <script>
            /*function printTime() {
                var d = new Date();
                var year = d.getFullYear();
                var hours = d.getHours();
                var mins = d.getMinutes();
                var secs = d.getSeconds();
                document.body.innerHTML = year+":"+hours+":"+mins+":"+secs;
            }
            setInterval(printTime, 1000);*/
        </script>


        <div id ="demo">
            <p>some text</p>
            <p>some other text</p>
        </div>

        <script>
            var a = document.getElementById("demo");
            var arr = a.childNodes;
            for(var x=0;x<arr.length;x++) {
                arr[x].innerHTML = "new text rr";
            }
        </script>


        <button onclick="show();">Delete confermation</button>
        <script>
            function show() {
                alert("Delete Conferm");
            }
        </script>
        <input type="text" id="name" onchange="change()">
    <script>
        function change() {
            var x = document.getElementById('name');
            x.value = x.value.toUpperCase();
        }
    </script>



        <form onsubmit="return validate()" method="post">
            Number: <input type="text" name="num1" id="num1" />
            <br />
            Repeat: <input type="text" name="num2" id="num2" />
            <br />
            <input type="submit" value="Submit" />
        </form>

<script>
    function validate()
    {
        var n1 = document.getElementById('num1');
        var n2 = document.getElementById('num2');
        if(n1.value != '' && n2.value != '') {
            if(n1.value == n2.value) {
                return true;
            }
        }
        alert("The values should be equal and not blank");
        return false;
    }
</script>

<h1>jQuery</h1>
        <button id="date">Click me show date</button>
        <script>
            window.onload = function () {
                var x = document.getElementById("date");
                x.onclick = function () {
                    document.body.innerHTML = Date();
                }
            };
        </script>
-----------------------------------------------------
        Common Events
        <p>The following are the most commonly used events:
            Mouse Events
            click occurs when an element is clicked.
            dblclick occurs when an element is double-clicked.
            mouseenter occurs when the mouse pointer is over (enters) the selected element.
            mouseleave occurs when the mouse pointer leaves the selected element.
            mouseover occurs when the mouse pointer is over the selected element.

            Keyboard Events
            keydown occurs when a keyboard key is pressed down.
            keyup occurs when a keyboard key is released.

            Form Events:
            submit occurs when a form is submitted.
            change occurs when the value of an element has been changed.
            focus occurs when an element gets focus.
            blur occurs when an element loses focus.

            Document Events:
            ready occurs when the DOM has been loaded.
            resize occurs when the browser window changes size.
            scroll occurs when the user scrolls in the specified element.
        </p>



        <input type="password" id="autochange">
        <div id="msg"></div>


    <style>
        #msg {
            color: blue;
            font-size: 16pt;
            font-weight: bold;
        }
    </style>

    <script>
        $(function() {
            $("#autochange").change  (function() {
                $("#msg").html($("#autochange").val());
            });
        });
    </script>

------------------------------------------------

        <h1>My To-Do List</h1>
        <input type="text" placeholder="New item" />
        <button id="add">Add</button>
        <ol id="mylist"></ol>

    <style>
        h1 {
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
                var val = $("input").val();
                if(val !== '') {
                    var elem = $("<li></li>").text(val);
                    $(elem).append("<button class='rem'>X</button>");
                    $("#mylist").append(elem);
                    $("input").val("");
                    $(".rem").on("click", function() {
                        $(this).parent().remove();
                    });
                }
            });
        });
    </script>


        -------------------------
        <h1 id="h1">Click to toggle show/hide</h1>
        <h3 id="h3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat.
        </h3>

        <style>
            #h1 {
                background-color:grey;
                text-align:center;
                color:white;
                padding:5px;
                cursor:pointer;
            }
            #h3 {
                background-color:white;
                color:green;
            }
        </style>

        <script>
            $(function() {
                $("#h1").click(function() {
                    $("#h3").toggle();
                });
            });
        </script>
        ------------Show/Hide-----------
        <p id="p">Click to toggle show/hide</p>
        <div id="div">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
            ut aliquip ex ea commodo consequat.
        </div>

        <style>
            #p {
                background-color:grey;
                text-align:center;
                color:white;
                padding:5px;
                cursor:pointer;
                margin-bottom: 50px;
            }
            #div {
                background-color:grey;
                color:white;
                margin-bottom: 50px;
            }
        </style>

        <script>
            $(function() {
                $("#p").click(function() {
                    $("#div").toggle(1000);  //or .fadeToggle(1000);
                });
            });
        </script>

    ------------Show/Hide 2-----------
        <p id="p1">Click to toggle show/hide</p>
        <div id="div1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
            ut aliquip ex ea commodo consequat.
        </div>

        <style>
            #p1 {
                background-color:grey;
                text-align:center;
                color:white;
                padding:5px;
                cursor:pointer;
                margin-bottom: 50px;
            }
            #div1 {
                background-color:grey;
                color:white;
                margin-bottom: 50px;
            }
        </style>

    <script>
        $(function() {
            $("#p1").click(function() {
                $("#div1").toggle(1000);  //or .fadeToggle(1000);
            });
        });
    </script>



        <p>Click to toggle show/hide</p>
        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat.
        </div>


--------------Slide Up/Down------------

        <script>
            $(document).ready(function(){
                $("#flip").click(function(){
                    $("#panel").slideToggle(500);
                });
            });
        </script>

        <style>
            #flip {
                padding: 5px;
                text-align: center;
                background-color: #ff8f11;
                border: solid 1px #c3c3c3;
                cursor:pointer;
            }

            #panel {
                padding: 50px;
                display: none;
                background-color: #e5eecc;
                border-radius: 0px 0px 10px 10px ;
                border-left: 1px solid #c3c3c3;
                border-right:  1px solid #c3c3c3;
                border-bottom:  1px solid #c3c3c3;
                margin-bottom: 25px;

            }
            </style>
        <div id="flip">Click to slide the panel down or up</div>

        <div id="panel">
            Name: <input type="text" placeholder="Text Field"><br>
            Last Name: <input type="text" placeholder="Text Field">
            <input type="submit" name="submit" value="Insert">
        </div><br>

            <?php

            $i = 1;
            if ($i>1)
            {
                echo "Ok";
            }
               else{
                   echo "not ok";
               }


            ?>

        -------------- Slide Up/Down-2 ------------

        show/hide:<input type="checkbox" name="show_hide" id="p2">
        <div id="div2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.
            &nbsp; <span style="background: green; color: white;"> User: <input type="text" name="user" id="div2"></span>
        </div>

        <style>
            #p2 {
                background-color:green;
                text-align:center;
                color:white;
                padding:5px;
                cursor:pointer;
                margin-bottom: 50px;
            }
            #div2 {
                background-color:green;
                color:white;
                margin-bottom: 50px;
            }
        </style>

        <script>
            $(document).ready(function() {
                $("#p2").click(function() {
                    $("#div2").slideToggle(500);  //or .fadeToggle(1000);
                });
            });
        </script>

--------------------------------------------
<h1>animate</h1>
        <div id="div_animation">Click me</div>
    <style>
        #div_animation {
            display:inline-block;
            padding:25px;
            background-color:grey;
            color:white;
            text-align:center;
            cursor:pointer;
        }
    </style>

    <script>
        $(function() {
            $("#div_animation").click(function() {
                $("#div_animation").animate({width: '250px'}, 1000);
            });
        });
    </script>

    -------------------Drop-Down Menu-------------
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