
var $ = function(id) {
    return document.getElementById(id);
};

function initial() {
    repeatFlag = false;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json = this.responseText;
            var obj = JSON.parse(json);
            var studentNumArr = obj.studentnum;
            umidArr = obj.umid;
            $("result").innerHTML = studentNumArr + umidArr;

            // initial select menu
            var select = $("slotSelectMenu");
            var output = "";
            for(var i = 0; i<6; i++){
                switch(i){
                    case 0:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/9/15, 6:00 PM – 7:00 PM, ";
                        output += 6-studentNumArr[i];
                        output += "</option>";
                        break;
                    case 1:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/9/15, 7:00 PM – 8:00 PM, ";
                        output += 6-studentNumArr[i];
                        output += "</option>";
                        break;
                    case 2:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/9/15, 8:00 PM – 9:00 PM, ";
                        output += 6-studentNumArr[i];
                        output += "</option>";
                        break;
                    case 3:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/10/15, 6:00 PM – 7:00 PM, ";
                        output += 6-studentNumArr[i];
                        output += "</option>";
                        break;
                    case 4:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/10/15, 7:00 PM – 8:00 PM, ";
                        output += 6-studentNumArr[i];
                        output += "</option>";
                        break;
                    case 5:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/10/15, 8:00 PM – 9:00 PM, ";
                        output += 6-studentNumArr[i];
                        output += "</option>";
                        break;

                }
            }
            select.innerHTML = output;
        }
    };
    xmlhttp.open("GET", "scripts/initial.php", true);
    xmlhttp.send();
}

function checkRepeat(){
    for(var i=0; i<umidArr.length; i++){
        // console.log($("umid").value);
        // console.log(umidArr[i]);
        if(umidArr[i].includes($("umid").value)){
            return true;
        }
    }
    return false;
}

function checkform(){
    console.log(checkRepeat());
    if(checkRepeat()){ 
        condition = confirm('You have registered. Do you want to update?'); 
        return condition;
    }
    return true;
}

window.addEventListener("load", initial);