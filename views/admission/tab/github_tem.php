<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Bootstrap Menu Example</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sample Bootstrap Menu application">
  <meta name="author" content="John M. Wargo">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
<style>

html, body {
  height: 100%;
  margin:0;
  padding:0;
}

body {
  display: -webkit-flex;
  display: -moz-box;
  display: flex;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  flex-direction: column;
  height: 100%;
}

/*Style for the first level menu bar*/

ul.nav {
  display: -webkit-flex;
  display: -moz-box;
  display: flex;
  position: relative;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  flex-direction: row;
  -webkit-align-items: center;
  -moz-box-align: center;
  align-items: center;
  max-width: 70%;
  margin: 0 auto;
  padding: 0;
  list-style: none;
  background: #18bdde;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
}

ul.nav > li {
  position: relative;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  flex-grow: 1;
  -webkit-flex-shrink: 0;
  flex-shrink: 0;
  height: 60px;
  font-size: 14px;
  text-align: center;
  text-transform: uppercase;
  line-height: 60px;
  letter-spacing: 1px;
  color: #e7e6f1;
  cursor: pointer;
}


label {
  position:relative;
  display:block;
  font-family: "Helvetica Neue", Arial, sans-serif;
}

/*hide the inputs*/
input {
  display:none;
}

/*show the second levels menu of the selected voice*/
input:checked ~ label, ul.nav > li:hover {
  background: rgba(0, 0, 0, 0.1);
}

input:checked ~ ul.submenu {
  max-height:300px;
  transition:max-height 0.5s ease-in;
}

ul.submenu {
  max-height: 0;
  padding: 0;
  overflow: hidden;
  list-style: none;
  color: #333;
  background: #e5e4ea;
  box-shadow: 1px 2px 5px -1px rgba(0, 0, 0, 0.2), 0px 4px 14px -1px rgba(0, 0, 0, 0.1);
  transition: max-height 0.5s ease-out;
  position: absolute;
  min-width: 100%;
}

ul.submenu > li {
  font-size: 14px;
  font-family: "Helvetica Neue", Arial, sans-serif;
  cursor: pointer;
}

ul.submenu > li:hover {
  background: rgba(0, 0, 0, 0.09);
}

@-webkit-keyframes slideInLeft {
  from {
    -webkit-transform: translate(-25%, 0);
    transform: translate(-25%, 0);
    opacity: 0;
  }
  to {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    opacity: 1;
  }
}

@-moz-keyframes slideInLeft {
  from {
    -moz-transform: translate(-25%, 0);
    transform: translate(-25%, 0);
    opacity: 0;
  }
  to {
    -moz-transform: translate(0, 0);
    transform: translate(0, 0);
    opacity: 1;
  }
}

@-o-keyframes slideInLeft {
  from {
    -o-transform: translate(-25%, 0);
    transform: translate(-25%, 0);
    opacity: 0;
  }
  to {
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    opacity: 1;
  }
}

@keyframes slideInLeft {
  from {
    -webkit-transform: translate(-25%, 0);
    -moz-transform: translate(-25%, 0);
    -o-transform: translate(-25%, 0);
    transform: translate(-25%, 0);
    opacity: 0;
  }
  to {
    -webkit-transform: translate(0, 0);
    -moz-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    opacity: 1;
  }
}


.article {
  margin: 0 auto;
  padding-top: 64px;
  max-width: 60%;
  width: 100%;
  line-height: 1.5em;
  color: #5c5c5c;
  font-family: "Helvetica Neue", Arial, sans-serif;
}

.article h1 {
  margin-top: 0;
}


/**
 * Footer Styles
 */

.footer {
  flex-shrink: 0;
  padding: 2em;
  background-color: #101832;
  color: azure;
  text-align: center;
}
</style>

<body>
 
<nav class="navbar">
        <ul class="nav">
            <li>
                <input id="check01" type="checkbox" name="menu" />
                <label for="check01">Home</label>
                <ul class="submenu">
                    <li>Menu 1</li>
                    <li>Menu 2</li>
                    <li>Menu 3</li>
                </ul>
            </li>
            <li>
                <input id="check02" type="checkbox" name="menu" />
                <label for="check02">About</label>
                <ul class="submenu">
                    <li>Menu 1</li>
                    <li>Menu 2</li>
                    <li>Menu 3</li>
                </ul>
            </li>

            <li>
                <input id="check03" type="checkbox" name="menu" />
                <label for="check03">Pricing</label>
                <ul class="submenu">
                    <li>Menu 1</li>
                    <li>Menu 2</li>
                    <li>Menu 3</li>
                </ul>
            </li>

            <li>
                <input id="check04" type="checkbox" name="menu" />
                <label for="check04">Contact</label>
                <ul class="submenu">
                    <li>Menu 1</li>
                    <li>Menu 2</li>
                    <li>Menu 3</li>
                </ul>
            </li>
        </ul>
    </nav>

    <article class="article">
        <h1>Lorem Ipsum</h1>

        <button id="add">Add more Content</button>
        
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
            text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
            book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
            unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
        <p>
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature
            from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
            Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
            the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections
            1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero
        </p>

    </article>

    <div class="footer">
        This's Sticky Footer, will always be positioned at the bottom of the page.
    </div>

    <script src="index.js"></script>
>
</body>

</html>