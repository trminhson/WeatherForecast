const inputField = document.getElementById("cityInput"),
infoTxt = document.querySelector(".info-txt"),
wIcon = document.querySelector(".day-icon"),
getcityBtn = document.querySelector(".location-button"),
locationBtn = document.getElementById("device-button");

//variables to get today's date, day, month, year
var x = new Date(),
date = x.getDate(),
d = x.getDay(),
month = x.getMonth(),
year= x.getFullYear();



//2 sets of weekday array because we want the abbriviation for the smaller display
const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
weekdayabbriviation=["Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat"],
months =["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


function DefaultScreen(){
    document.getElementById("cityInput").defaultValue = "Ho Chi Minh";
}

inputField.addEventListener("keyup", e =>{
    if(e.key == "Enter" && inputField.value != ""){
        requestApi(inputField.value);
    }
});


getcityBtn.addEventListener("click", ()=>{
    if("click" && inputField.value != ""){
        requestApi(inputField.value);
    }
});

locationBtn.addEventListener("click", () =>{
    if(navigator.geolocation){ 
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
    }else{
        alert("Your browser not support geolocation api");
    }
});

function requestApi(city){
    api =`https://api.openweathermap.org/data/2.5/forecast?q=${city}&units=metric&appid=1e3d5bb22ff75145b8d464e43dd17d37`;
    fetch(api).then(response => response.json()).then(data => console.log(data));
    GetInfo();
}

function onSuccess(position){
    // getting lat and lon from geolocation
    const {latitude, longitude} = position.coords; 
    api = `https://api.openweathermap.org/data/2.5/forecast?lat=${latitude}&lon=${longitude}&units=metric&appid=1e3d5bb22ff75145b8d464e43dd17d37`;
    fetch(api).then(response => response.json()).then(data => console.log(data));
    GetInfo();
}  

function onError(error){
    infoTxt.innerText = error.message;
    infoTxt.classList.add("error");
}

function GetInfo() {
    infoTxt.innerText = "Getting weather details...";
    infoTxt.classList.add("pending");
    fetch(api).then(response => response.json()).then(data => displaytWeather(data)).catch(() =>{
        infoTxt.innerText = "Something went wrong";
        infoTxt.classList.replace("pending", "error");
    });
}

function displaytWeather(data){
    if(data.cod == "404"){ // if user entered city name isn't valid
        infoTxt.classList.replace("pending", "error");
        infoTxt.innerText = `${inputField.value} isn't a valid city name`;
    }else{
       
        /* get data for today */
        const { name } = data.city;
        const {temp, temp_min, temp_max, humidity} = data.list[0].main;
        const {dt_txt} = data.list[0];
        const { icon, description } = data.list[0].weather[0];
        const { speed } = data.list[0].wind;
       
        console.log(d,date,month,year);
        document.querySelector(".date-dayname").innerHTML=weekday[d];
        document.querySelector(".date-day").innerHTML=date+" "+months[month]+" "+year;
        document.querySelector(".city").innerHTML= name;
        document.querySelector(".weather-temp").innerHTML=Math.floor(temp)+ "°C" ;
        document.querySelector(".weather-icon").src ="https://openweathermap.org/img/wn/" +icon+ "@2x.png";
        console.log("https://openweathermap.org/img/wn/" +icon+ "@2x.png");
        document.querySelector(".weather-desc").innerHTML = description;
        document.querySelector(".temp-max .value").innerHTML=(temp_max)+ "°C" 
        document.querySelector(".temp-min .value").innerHTML=(temp_min)+ "°C";
        document.querySelector(".humidity .value").innerHTML =humidity + "%"; 
        document.querySelector(".wind-speed .value").innerHTML =speed + " km/h";



        /* get data for days in the week */
        //i is the variable for list array
        //i going from 1 because 0 is today weather, 1 is tomorrow
        for(i=1;i<5;i++){
            const {temp}=data.list[i].main,
            {icon} = data.list[i].weather[0];
            console.log(temp,icon)
            document.getElementById("day"+(i)+"temp").innerHTML = temp;
            document.getElementById("day"+(i)+"icon").src = "http://openweathermap.org/img/wn/"+icon+".png";
            CheckDay();
            document.getElementById("day" +(i)+"name").innerHTML = weekdayabbriviation[d];

        }
    }
};

function DefaultScreen(){
    document.querySelector("cityInput").defaultValue = "Ho Chi Minh";
}

 
function CheckDay(){
    //if the d+1 (tomorrow) > weekdayabbiviation[6],then d = d -(d - 1)
    if(d+1>6){
        d=d-(d+1);
    }
    //if the d+1 (tomorrow) <= 6, then d = d + 1
    else{
        d=d+1;
    }
    //if d < 0 then d = d + 1
    if(d<0){
        d=d+1
    }
}
