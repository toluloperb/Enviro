<style>
    body {
    background-color: black;
}

.content {
    position :relative;
    z-index: 1;
    border: 1px solid white;
    background-color: grey;
    width: 300px;
    height: 300px;
    margin: auto;
    overflow: hidden;
}

.carte_button {
		right: 0px;
    position :absolute;
    z-index: 3;
    border: 1px solid white;
    background-color: yellow;
    width: 50px;
    height: 50px;
}

.carte {
    position :relative;
    top: -3px;
    z-index: 2;
    border-bottom: 2px solid white;
    border-top: 2px solid white;
    background-color: green;
    width: auto;
    height: 0%;
    margin: auto;
    transition: height 500ms;
}

.carte_button:hover + .carte {
    border-top: none;
    top: 50px;
    height: 300px;
}

.carte:hover {
    top: 50px;
    height: 250px;
}


</style>


<div class="content">
  <div class="carte_button"></div>
  <div class="carte"></div>    
</div>