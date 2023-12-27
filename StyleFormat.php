<html><head><title>Styles</title></head>
    <body>
    <?php
    
    //You can edit the styles here and call the class name in the file you are using.
	    echo "<style>
            .header {
                padding: 15px;
                text-align:center;
                font-size: 60px;
                border-style: dashed;
                border-color: #1A5276;
                background-clip: content-box;
                background-image: linear-gradient( to top left, rgb(238, 196, 36), rgb(150, 84, 84), rgb(197, 20, 88));
                margin-top: 0px;
                font-family: 'Zen Tokyo Zoo', cursive;
                }

            .question {
                border: 2px solid black;
                font-size: 20px;
                text-transform: uppercase;
                background-image: linear-gradient(to bottom right, rgb(38, 196, 236), rgb(240, 96, 96), rgb(83, 72, 236));
                width: 25%;
                height: 3%;
                position: relative;
                top: 9%;
                left: 7%;
                margin-top: -100px;
                margin-left: -100px;
                padding: 15px;
                }

            .submitButtons
                {
                    text-transform: uppercase;
                    padding: 8px;
                    border: 2px solid #0099CC;
                    border-radius: 6px;
                    background-color: yellow;
                }
            .ascendingorder
                {
                    border: 2px solid #0099CC;
                    border-radius: 6px;
                    height: 45px;
                    width: 200px;
                    border-color: yellow;
                    font: size 23px;
                    position: absolute;
                    left: 28%;
                    top: 25%;
                }
                .descendingorder{
                    
                    border-radius: 6px;
                    color: pink;
                    background-color: yellow;
                    font-size:20px;
                    height: 45px;
                    width: 200px;
                    position: absolute;
                    left: 28%;
                    top: 15%;
                }
                .dateOrder{
                    
                    border-radius: 6px;
                    color: pink;
                    background-color: green;
                    font-size:20px;
                    height: 45px;
                    width: 200px;
                    position: absolute;
                    left: 82%;
                    top: 45%;
                }
                .label
                {
                    font-size: 15px;
                    text-transform: lowercase;
                    padding: 8px;
                    border: 2px solid #0099CC;
                    border-radius: 6px;
                    background-color: yellow;
                    height: 17px;
                    width: 150px;
                }
                    .prodTable{
                        width: 1000px;
                        margin-right: auto;
                        margin-left:auto;
                    }
                    .prodTable, .prdtd{
                        border-style: ridge;
                        border-color: #424242;
                    }
                    th{
                        font-size: 25px;
                        text-align: left;
                        color: white;
                        border-style: ridge;
                        border-color: #424242;
                        background-color: #2471A3;
                    }
                    .prdtd{
                    font-size: 15px;
                    text-align: center;
                    }

                    .table_to_middleRight {
                        border: 2px solid black;
                        float: right;
                        width: 550px;
                        height: 40px;
                        position: absolute;
                        right: 0px;
                        top: -200px;
                        text: size 15px;
                        background-color: #FD5A5A;
                        margin-top: 300px;
                    }

                    .link1_to_bottomLeft {
                        border: 2px solid black;
                        width: 500px;
                        height: 90px;
                        position: absolute;
                        left: 500px;
                        bottom: 70px;
                        background-color: #FD5A5A;
                    
                    }
                    
                    .link2_to_bottomLeft {
                        border: 2px solid black;
                        width: 400px;
                        height: 90px;
                        position: absolute;
                        left: 20px;
                        text-align: center;
                        bottom: 70px;
                        background-color: #FD5A5A;
                        border-radius: 20px;
                    
                    }

                    .table_to_left {
                        border: 2px solid black;
                        float: left;
                        background-image: linear-gradient(to bottom right, rgb(38, 196, 236), rgb(240, 96, 96), rgb(83, 72, 236));
                        width: 50%;
                        height: 3%;
                        position: absolute;
                        left: 20px;
                        top: 27px;
                        text-align:center;
                        position: auto;
                        padding: 7px;
                        }
                        .QuoteTable {
                            border: 4px solid black;
                            cellspacing: 25px;
                            background-image: linear-gradient(to bottom right, rgb(38, 196, 236), rgb(240, 96, 96), rgb(83, 72, 236));
                            width: 70%;
                            height: 40%;
                            position: absolute;
                            left: 15%;
                            top: 40%;
                            text-align:center;
                            padding: 7px;
                            }
                       
                        .prodTable{
                            width: 1000px;
                            margin-right: auto;
                            margin-left:auto;
                            }
                            .prodTable, .prdtd{
                            border-style: ridge;
                            border-color: #424242;
                            }
                            th{
                            font-size: 25px;
                            text-align: left;
                            color: white;
                            border-style: ridge;
                            border-color: #424242;
                            background-color: #2471A3;
                            }
                            .prdtd{
                                font-size: 15px;
                                text-align: center;
                                border-style: dashed;
                                border-color: #1A5276;
                            }
                            .FormSize{
                            width: 30%;
                            font-size: 30px;
                            }
                            th, td{
                            font-family: lucida;
                            }
                             th{
                            text-shadow: -1px 1px 2px #000,
                                      1px 1px 2px #000,
                                          1px -1px 0 #000,
                                         -1px -1px 0 #000;
                            }
                            .delButton{
                                font-size: 20px;
                                background-color: orange;
                                color: #B14030;
                                border: 4px solid #B14030;
                                border-radius: 30px;
                                border-color: yellow;
                            }
                            .delButton:hover{
                                background-color: #B14030;
                                color: white;
                            }
                            .EditButton
                            {
                                background-color: #7FB3D5;
                                color: black;
                                Border: 1px solid #424242;
                                border-radius: 30px;
                                font-size: 20px;
                            }
                            .EditButton:hover{
                                background-color: #2471A3;
                                color: red;
                            }
                            .Datestyle{
                                position: absolute;
                                top: -170%;
                                left: 65%;
                            }
                            .contButton
                            {
                                font-size: 20px;
                                background-color: #A9CCE3;
                                color: black;
                                position: absolute;
                                top: 140%;
                                left: 4%;
                                border-style: ridge;
                                border-color: #424242;
                            }
                            .contButton:hover{
                            color: white;
                            background-color: #2471A3;
                            border-style: ridge;
                            border-color: #424242;
                            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                            }
                            .Listby{
                            font-size: 30px;
                            background-color: #5499C7;
                            width: 10%;
                            height: 10%;
                            border-radius: 5px;
                            position: absolute;
                            top: 16%;
                            left: 15%;
                            padding: 15px; 
                            border-style: ridge;
                            border-color: #424242;
                            }
                            .GoBack{
                                float: middle;
                                font-size: 15px;
                                width: 10%;
                                height: 8%;
                                position: absolute;
                                border-radius: 5px;
                                top: 154%;
                                left: 95%;
                                margin-top: -100px;
                                margin-left: -100px;
                                padding: 15px; 
                                background-color: #4CAF50; /* Green */
                                border: 4px solid black;
                            }
                            .GoHome{
                                float: middle;
                                font-size: 15px;
                                width: 10%;
                                height: 8%;
                                position: absolute;
                                border-radius: 5px;
                                top: 295%;
                                left: 95%;
                                margin-top: -100px;
                                margin-left: -100px;
                                padding: 15px; 
                                background-color: #4CAF50; /* Green */
                                border: 4px solid black;
                            }
                            .BackToAssociate{
                                float: middle;
                                font-size: 15px;
                                width: 10%;
                                height: 8%;
                                position: absolute;
                                border-radius: 5px;
                                top: 87%;
                                left: 95%;
                                margin-top: -100px;
                                margin-left: -100px;
                                padding: 15px; 
                                background-color: #4CAF50; /* Green */
                                border: 4px solid black;
                            }
                            .Associates{
                                    float: middle;
                                    font-size: 15px;
                                    width: 10%;
                                    height: 8%;
                                    position: relative;
                                    border-radius: 5px;
                                    top: 12%;
                                    left: 61%;
                                    margin-top: -100px;
                                    margin-left: -100px;
                                    padding: 15px; 
                                    background-color: #4CAF50; /* Green */
                                    border: 4px solid black;
                                }
                                .Quotes{
                                    float: middle;
                                    border-radius: 5px;
                                    font-size: 15px;
                                    width: 10%;
                                    height: 8%;
                                    position: relative;
                                    background-color: blue;
                                    top: 12%;
                                    left: 35%;
                                    margin-top: -100px;
                                    margin-left: -100px;
                                    padding: 15px; 
                                    background-color: #4CAF50; /* Green */
                                    border: 4px solid black;
                                    }
                                .Associates:hover, .Quotes:hover, .GoBack:hover{
                                    background-color: yellow; 
                                     color: black; 
                                     border: 2px solid #4CAF50;
                                   }

                                   body {
                                    font-family: 'Montserrat', sans-serif;
                                    background: #e7e7e7;
                                    height: 100vh;
                                }
                                .choose {
                                    border-radius: 5px;
                                    position: absolute;
                                    background-color: red;
                                    top: 26%;
                                    left: 50%;
                                    margin-top: -100px;
                                    margin-left: -100px;
                                    
                                }
                                
                                .moto{
                                    text-align: center;
                                    color: #82807f;
                                    margin: 80px auto;
                                    font-size: 27px;
                                    width: 50%;
                                    line-height: 1.7;
                                    position: absolute;
                                    background-color: mixed;
                                    border-radius: 5px;
                                    top: 50%;
                                    left: 30%;
                                    margin-top: -100px;
                                    margin-left: -100px;
                                }
                                .box {
                                    text-align: center;
                                }
                                .button {
                                    font-size: 1em;
                                    padding: 15px 35px;
                                    color: #fff;
                                    position: fixed;
                                    background-color: blue;
                                    top: 100%;
                                    left: 86%;
                                    margin-top: -100px;
                                    margin-left: -100px;
                                    text-decoration: none;
                                    cursor: pointer;
                                    transition: all 0.3s ease-out;
                                    background: #403e3d;
                                    border-radius: 50px;
                                }
                                .overlay {
                                    position: fixed;
                                    top: 0;
                                    bottom: 0;
                                    left: 0;
                                    right: 0;
                                    background: rgba(0, 0, 0, 0.8);
                                    transition: opacity 500ms;
                                    visibility: hidden;
                                    opacity: 0;
                                }
                                .overlay:target {
                                    visibility: visible;
                                    opacity: 1;
                                }
                                .wrapper {
                                    margin: 70px auto;
                                    padding: 20px;
                                    background: #e7e7e7;
                                    border-radius: 5px;
                                    width: 30%;
                                    position: relative;
                                    transition: all 5s ease-in-out;
                                }
                                .wrapper .h2 {
                                    margin-top: 0;
                                    color: #333;
                                }
                                .wrapper .close {
                                    position: absolute;
                                    top: 20px;
                                    right: 30px;
                                    transition: all 200ms;
                                    font-size: 30px;
                                    font-weight: bold;
                                    text-decoration: none;
                                    color: #333;
                                }
                                .wrapper .close:hover {
                                    color: #06D85F;
                                }
                                .wrapper .content {
                                    max-height: 30%;
                                    overflow: auto;
                                }
                                /*form*/
                                
                                .container {
                                    border-radius: 5px;
                                    background-color: #e7e7e7;
                                    padding: 20px 0;
                                }
                                form label {
                                    text-transform: uppercase;
                                    font-weight: 500;
                                    letter-spacing: 3px;
                                }
                                input[type=text], select, textarea {
                                    width: 100%;
                                    padding: 12px;
                                    border: 1px solid #ccc;
                                    border-radius: 4px;
                                    box-sizing: border-box;
                                    margin-top: 6px;
                                    margin-bottom: 16px;
                                    resize: vertical;
                                }
                                input[type=submit],select {
                                    background-color: #413b3b;
                                    color: #fff;
                                    padding: 15px 50px;
                                    border: none;
                                    border-radius: 50px;
                                    cursor: pointer;
                                    font-size: 15px;
                                    text-transform: uppercase;
                                    letter-spacing: 3px;
                                }
                                .add
                                {
                                font-size: 15px;
                                width: 15%;
                                height: 45px;
                                color: black;
                                background-color: white;
                                border: 1px solid #4CAF50;
                                border-radius: 5px;
                                }
                                .search1
                                {
                                font-size: 15px;
                                width: 15%;
                                height: 45px;
                                color: black;
                                position: absolute;
                                top: -130%;
                                left: 40%;
                                background-color: white;
                                border: 1px solid #4CAF50;
                                border-radius: 5px;
                                }
                                .search2
                                {
                                font-size: 15px;
                                width: 8%;
                                height: 45px;
                                color: black;
                                position: absolute;
                                top: -270%;
                                left: 40%;
                                background-color: white;
                                border: 1px solid #4CAF50;
                                border-radius: 5px;
                                }
                                .add:hover, .search1:hover{
                                color:white;
                                background-color:#4CAF50
                                }
                                
                            }
    
                        }
                    
	        </style>";//note: the translate(3.1in, -5in) rotate(90deg); first argument = width, second = height(-100 all the way to top)
    ?>
    </body>
</html>