
var $ = function(id) {
    return document.getElementById(id);
};

function initial() {
    repeatFlag = false;

    $('umid').oninput = function() {reset('umid')};
    $('fname').oninput = function() {reset('fname')};
    $('lname').oninput = function() {reset('lname')};
    $('pname').oninput = function() {reset('pname')};
    $('email').oninput = function() {reset('email')};
    $('phone').oninput = function() {reset('phone')};

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json = this.responseText;
            var obj = JSON.parse(json);
            var studentNumArr = obj.studentnum;
            umidArr = obj.umid;
            //$("result").innerHTML = studentNumArr + umidArr;

            // initial select menu
            var select = $("slotSelectMenu");
            var output = "";
            for(var i = 0; i<6; i++){
                switch(i){
                    case 0:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/9/15, 6:00 PM – 7:00 PM, ";
                        output += 6-studentNumArr[i]+" seats remaining";
                        output += "</option>";
                        break;
                    case 1:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/9/15, 7:00 PM – 8:00 PM, ";
                        output += 6-studentNumArr[i]+" seats remaining";
                        output += "</option>";
                        break;
                    case 2:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/9/15, 8:00 PM – 9:00 PM, ";
                        output += 6-studentNumArr[i]+" seats remaining";
                        output += "</option>";
                        break;
                    case 3:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/10/15, 6:00 PM – 7:00 PM, ";
                        output += 6-studentNumArr[i]+" seats remaining";
                        output += "</option>";
                        break;
                    case 4:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/10/15, 7:00 PM – 8:00 PM, ";
                        output += 6-studentNumArr[i]+" seats remaining";
                        output += "</option>";
                        break;
                    case 5:
                        output += "<option ";
                        output += "value="+i+">";
                        output += "12/10/15, 8:00 PM – 9:00 PM, ";
                        output += 6-studentNumArr[i]+" seats remaining";
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

function checkFormat(){
  var flag = true;
  var umid = $('umid').value;
  var email = $('email').value;
  var phone = $('phone').value;
  var fname = $('fname').value;
  var lname = $('lname').value;
  var pname = $('pname').value;
  var umidRegex = /^\d{8}$/;
  var emailRegex = /^\S{1,55}[@]\S{1,20}[\.]\S{1,3}$/;
  var phoneRegex = /^\d{3}[\-]\d{3}[\-]\d{4}$/;
  if(!umidRegex.test(umid)){
    $('umid').setAttribute("class", "error_highlight");
    $('umid_error_message').innerHTML = "UMID needs to be 8 digits long";
    flag = false;
  }
  if(fname==""){
    $('fname').setAttribute("class", "error_highlight");
    $('fname_error_message').innerHTML = "First name cannot be empty";
    flag = false;
  }
  if(lname==""){
    $('lname').setAttribute("class", "error_highlight");
    $('lname_error_message').innerHTML = "Last name cannot be empty";
    flag = false;
  }
  if(pname==""){
    $('pname').setAttribute("class", "error_highlight");
    $('pname_error_message').innerHTML = "Project name cannot be empty";
    flag = false;
  }
  if(!emailRegex.test(email)){
    $('email').setAttribute("class", "error_highlight");
    $('email_error_message').innerHTML = "Email format: example@domain.com";
    flag = false;
  }
  if(!phoneRegex.test(phone)){
    $('phone').setAttribute("class", "error_highlight");
    $('phone_error_message').innerHTML = "Phone format: 999-999-9999";
    flag = false;
  }

  return flag;
}

function reset(name){
  $(name).setAttribute("class", "normal");
  $(name+'_error_message').innerHTML = "";
}

function checkRepeat(){
    for(var i=0; i<umidArr.length; i++){
        // console.log($("umid").value);
        // console.log(umidArr[i]);
        if(umidArr[i].includes($("umid").value)){
            return false;
        }
    }
    return true;
}

function checkform(){
  if(!checkFormat()){
    return false;
  }
  if(checkRepeat()){
      condition = confirm('You have registered. Do you want to update?');
      return condition;
  }
  return true;
}

window.addEventListener("load", initial);
