<?php
    header("Content-type: text/css; charset: UTF-8");
    
    /*----------------------------------------------*/
    /* Margins & Padding
    /*----------------------------------------------*/
      $gutter = "3.43rem";
      $gutter_half = "1.715rem";
      $gutter_quarter = ".1715rem";
    /*----------------------------------------------*/
    /* End
    /*----------------------------------------------*/
    
    /*----------------------------------------------*/
    /* Fonts, typogrpahy
    /*----------------------------------------------*/
      $default_font_color = "#fff";
      $dark = "#373737";
    /*----------------------------------------------*/
    /* End
    /*----------------------------------------------*/
?>
/*----------------------------------------------*/
/* General CSS
/*----------------------------------------------*/
  body {
      margin: 0;
      padding: 0;
  	font-family: sans-serif;
  	color: #fff;
  	background: #3a3a3a;
      -webkit-font-smoothing: antialiased;
  }
  
  h1 {
    font-size: 26px;
    background: #00bcd4;
    color: white;
    padding: 40px 0 100px 20%;
    margin-bottom: 50px;
  }
  
  h1,h2 {
    text-align: center;
  }
  
  label, p, a, h1, div {
      font-family: Roboto, sans-serif;
  }
  
  blockquote {
      color: #008000;
  }
  
  /*----------------------------------------------*/
  /* Buttons
  /*----------------------------------------------*/
  a.button {
    text-decoration: none;  
  }
  
  .button,
  input.form-submit {
      padding: 1.2rem 2rem;
      border: none;
      background: #fff;
      color: <?=$dark?>;
      text-transform: uppercase;
      font-weight: bold;
      font-size: 1rem;
      position: relative;
      margin: 0 auto;
      cursor: pointer;
      display: inline-block;
      zoom: 1;
      margin: 0 auto;
  }
  /*----------------------------------------------*/
  /* End
  /*----------------------------------------------*/
  /*----------------------------------------------*/
  /* Tables
  /*----------------------------------------------*/
      table {
      	border-collapse: collapse;
      	border-spacing: 0;
      	color: #373737;
      	width: 100%;
      	margin: <?=$gutter?> auto;
      }
      
      table thead tr {
          background-color: transparent;
          color: #fff;
          text-align: left;
      }
      table tbody tr {
          background-color: #fff;
      }
      table tbody tr:nth-child(odd) {
          background-color: #f7f7f7;
      }
      
      table td,
      table th {
      	padding: <?=$gutter_half?>;
      	border-bottom: 1px solid #aaa;
      }
  /*----------------------------------------------*/
  /* End tables
  /*----------------------------------------------*/
  /*----------------------------------------------*/
  /* Form elements
  /*----------------------------------------------*/
      form {
        max-width: 30rem;
        padding: <?=$gutter?>;
        margin: 0 auto;
        background: #fff;
        color: #373737;
      }
      
      form .input {
        margin: <?=$gutter?> 0;
        display: block;
        width: auto;
      }
      
      form .input:first-child {
        margin-top: 0;
      }
      
      form .input:last-child {
        margin-bottom: 0;
      }
      
      form .input label {
        padding-bottom: <?=$gutter_quarter?>;
        display: block;
        font-weight: bold;
      }

      
      form .input input {
        padding: .5rem;
        margin: 0;
        border: 1px solid <?=$dark?>;
        max-width: 100%;
        width: 100%;
        font-size: 1rem;
        outline: none;
        box-sizing: border-box;
      }
      
  /*----------------------------------------------*/
  /* End
  /*----------------------------------------------*/
/*----------------------------------------------*/
/* End general css
/*----------------------------------------------*/
/*----------------------------------------------*/
/* Helper css
/*----------------------------------------------*/
  .container {
  	background: #3a3a3a;
  	padding: <?=$gutter?>;
  	
  }
/*----------------------------------------------*/
/* End
/*----------------------------------------------*/
/*----------------------------------------------*/
/* Header
/*----------------------------------------------*/
  .header_left {
    display: table-cell;
    vertical-align: middle;
    padding: .8575rem;
  }
  .header_left #logo img {
    display: inline-block;
    width: 60px;
  }
  
  .header_right {
    display: table-cell;
    vertical-align: middle;
    position: relative;
    width: 100%;
    text-align: right;
  } 
  
  .header_right #main-menu-links {
    margin: 0px;
    padding: 0px;
    width: auto;
    list-style: none;
    position: relative;
    display: inline-block;
  }
  
  .header_right #main-menu-links li {
    list-style-type: none;
    display: inline-block;
  }

  .header_right #main-menu-links li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    padding: .5rem;
  }
  
  .header_right #main-menu-links li a:active {
    border-bottom: 3px solid #af963c;
  }
  
  .header_right #main-menu-links li a:hover {
    border-bottom: 3px solid #af963c;
  }
/*----------------------------------------------*/
/* End header
/*----------------------------------------------*/


    
    @media screen and (max-width: 800px) {
        h1 {
            padding: 40px 0 90px 10%;
        }
        
        
        /*----------------------------------------------*/
        /* Form styling
        /*----------------------------------------------*/

        form input {
        	min-height: 30px;
        	border: 1px solid #828282;
        }
        form input, form label {
            width: 95%;
            margin: 5px auto;
            display: block;
        }
        
        form input[type='submit'] {
            border: none;
            background: #7c59a9;
            padding: 15px 0;
            font-size: 1.3em;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff;
            margin-top: 25px;
        }
        /*----------------------------------------------*/
        /* End
        /*----------------------------------------------*/
    }
/*----------------------------------------------*/
/* End tabs
/*----------------------------------------------*/