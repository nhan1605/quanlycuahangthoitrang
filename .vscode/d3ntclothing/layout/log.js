var email = document.querySelector(".email")
var ten = document.querySelector(".name")
var passWord = document.querySelector(".password")
var rePassWord = document.querySelector(".repassword")
var phone = document.querySelector(".phone")
var birthday = document.querySelector(".birthday")
var city = document.querySelector(".city")
var district = document.querySelector(".district")
var ward = document.querySelector(".ward")
var city_id = document.querySelector(".city_id")
var specific_location = document.querySelector(".specific_location")
var submit = document.querySelector(".submit")
var form =document.querySelector(".form")
var emailed = document.querySelectorAll('.emailed')

// lỗi
function error(input,message){
    var parent = input.parentElement;
    var small = parent.querySelector('.form-massage');
    small.innerHTML = message;
}
function success(input){
    var parent = input.parentElement;
    var small = parent.querySelector('.form-massage');
    small.innerHTML = '';
}
// click button
form.onsubmit = function(e){
    console.log(city.value);
   let a =  checkEmpty([email,ten,passWord,rePassWord,phone,specific_location,birthday,city,district,ward]);
   
    if(a==false){
         e.preventDefault();  
    }else{
        let b = checkPass(passWord);   
            let c = checkRePass(passWord,rePassWord);
            let d = checkEmail(email);
            if(b== false|| c== false ||d == false ){
                e.preventDefault();      
            }else{
                emailed.forEach(ele=>{
                    if(ele.value.trim() == email.value.trim()){
                        e.preventDefault();
                        error(email,'Email này đã tồn tại!');
                    }
                })
            }
    }                   
        }

function checkEmpty(listInput){
    var isEmpty = true;
    listInput.forEach(input => {
        if(input.value.trim() == ""){
            error(input,'Không được để trống');
            isEmpty=  false;
        }else{
            success(input);
            isEmpty =   true;
        }
    });
    return  isEmpty;
}
//
function checkPass(input){
    var isEmpty = true;
    if(input.value.length < 6){
        error(input,'Mật khẩu phải lớn hơn 6 kí tự');
        isEmpty=  false;

    }else{
        success(input);
        isEmpty =   true;
    }
    return  isEmpty;
}
function checkEmail(email){
    var isEmpty = true;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(!filter.test(email.value)){
    error(email,'Vui lòng nhập đúng email!');
    isEmpty=  false;
   }else{
    success(email)
    isEmpty =   true;
   }
   return  isEmpty;
}
function checkRePass(passWord,repassword){
    var isEmpty = true;
    if(repassword.value == passWord.value){
        success(rePassWord);
        isEmpty =   true;
    }
    else{
        error(rePassWord,"Mật khẩu nhập lại không đúng!");
        isEmpty=  false;

    }
    return  isEmpty;
}