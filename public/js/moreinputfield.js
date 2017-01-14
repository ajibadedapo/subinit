var counter = 2;
var limit = 9;
function addInput(divName){
    if (counter == limit)  {
        alert("You have reached the limit of adding 8 images");
    }
    else {
        var newdiv = document.createElement('div');
        newdiv.innerHTML =  "<div class='input-group'><span class='input-group-addon ' id='basic-addon1'>Benefit" +counter+"</span> <input type='text' name='image"+counter+"' class='form-control'  aria-describedby='basic-addon1'></div>";
        document.getElementById(divName).appendChild(newdiv);
        counter++;
    }
}