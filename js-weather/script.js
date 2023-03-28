let result=document.getElementById("result");
let searchBtn=document.getElementById("search-btn");
let cityRef=document.getElementById("city");
let prefRef=document.getElementById("pref");
let addBtn=document.getElementById("add-btn");
let prefres=document.getElementById("prefres");
let weatherpref1=document.getElementById('weatherpref1');
let prefcity1=document.getElementById('prefcity1');
let weatherpref2=document.getElementById('weatherpref2');
let prefcity2=document.getElementById('prefcity2');
let weatherpref3=document.getElementById('weatherpref3');
let prefcity3=document.getElementById('prefcity3');
let forecast=document.getElementById("forecast");
// let deletebtn=document.getElementsByClassName('delete');
const date = new Date();
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
const weekday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
// Function to fetch weather details from api and display them
let getWeather=()=>{
    let cityValue=cityRef.value;
    //if input field is empty
    if(cityValue.length==0){
        result.InnerHTML=`<h3>Please enter a city</h3>`;
    }
    else{
        let url=`https://api.openweathermap.org/data/2.5/weather?q=${cityValue}&appid=${key}&units=metric`;
        // clear input field
        cityRef.value="";
        fetch(url).then(
            (resp)=>resp.json()
        ).then(data=>{
            console.log(data);
            console.log(data.weather[0].icon);
            console.log(data.weather[0].main);
            console.log(data.weather[0].description);
            console.log(data.name);
            console.log(data.main.temp_min);
            console.log(data.main.temp_max);
            result.innerHTML=`
            <h2>${data.name}</h2>
            <h4 class="weather">${data.weather[0].main}</h4>
            <div class="date">
            <h4>${date.getDate()}-${months[date.getMonth()]}-${date.getFullYear()}</h4>
            <h5>${weekday[date.getDay()]}</h5>
            <h4>Time: ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}</h4>
            </div>
            <h4 class="desc">${data.weather[0].description}</h4>
            <img src="https://openweathermap.org/img/w/${data.weather[0].icon}.png"/>
            <h1>${data.main.temp}&degC</h1>
            <div class="temp-container">
            <div>
            <h4 class="title">Min</h4>
            <h4 class="temp">${data.main.temp_min}</h4>
            </div>
            <div>
            <h4 class="title">Max</h4>
            <h4 class="temp">${data.main.temp_max}</h4>
            </div>
            </div>
            `;


        }).catch(()=>{
            result.innerHTML=`<h3 class="msg">City not found</h3>`;

        });


    }
};
let getpref=()=>{
    let prefvalue=prefRef.value;
    //if input field is empty
    if(prefvalue.length==0){
        result.InnerHTML=`<h3>Please enter a city</h3>`;
    }
    else{
        let url=`https://api.openweathermap.org/data/2.5/weather?q=${prefvalue}&appid=${key}&units=metric`;
        prefRef.value="";
        fetch(url).then(
            (resp)=>resp.json()
        ).then(data=>{
            console.log(data);
            if(data.cod=='404'){
                prefres.innerHTML=`<h3 class="msg">City not found</h3>`;
            }
            else{
                // prefres.innerHTML=`<h3 class="msg">City added</h3>`;
                // let params = {
                //     "method": "POST",
                //     "headers": {
                //        "Content-Type": "application/json; charset=utf-8"
                //     },
                //     "body": JSON.stringify(data.name)
                //  }
                //   console.log(data.name);
                //  fetch("script.php", params)

                // let city= data.name;
                let city={
                    "city":data.name
                }
                jsonString = JSON.stringify(city);
                let http = new XMLHttpRequest();
                 
                http.open('post', "script.php", true);
                http.setRequestHeader("Content-Type", "application/json");
                http.onreadystatechange = function () {
                    if (http.readyState == XMLHttpRequest.DONE) {
                        alert(http.responseText);
                    }
                };
                http.send(jsonString);


            }

            

        }).catch(()=>{
            prefres.innerHTML=`<h3 class="msg">City not found</h3>`;

        });


    }
}
let getsomething=(weatherpref,prefcity)=>{
   
   let p= prefcity.value;
   let url=`https://api.openweathermap.org/data/2.5/weather?q=${p}&appid=${key}&units=metric`;
        // clear input field
        fetch(url).then(
            (resp)=>resp.json()
        ).then(data=>{
          
            weatherpref.innerHTML=`
            <h2>${data.name}</h2>
        
            <h4 class="desc">${data.weather[0].description}</h4>
            <img src="https://openweathermap.org/img/w/${data.weather[0].icon}.png"/>
            <h1>${data.main.temp}&degC</h1>
            <div class="temp-container">
            <div>
            <h4 class="temp"> Min ${data.main.temp_min}</h4>
            </div>
            <div>
        
            <h4 class="temp"> Max ${data.main.temp_max}</h4>
            </div>
            </div>
            `;


        }).catch(()=>{
            weatherpref.innerHTML=`<h3 class="msg">City not found</h3>`;

        });
}

let fetchWeek=(todaydate)=>{
    let cityValue=cityRef.value;
    //if input field is empty
    // const options = {
    //     method: 'GET',
    //     headers: {
    //         'X-RapidAPI-Key': '5d14217f1emsh4c94f12b89db447p1cfedcjsn5fbcef7516ae',
    //         'X-RapidAPI-Host': 'open-weather13.p.rapidapi.com'
    //     }
    // };
    
    // fetch('http://api.weatherapi.com/v1/history.json?key=&q=London&dt=2010-01-01', options)
    //     .then(response => response.json())
    //     .then(response => console.log(response))
    //     .catch(err => console.error(err));
    let url=`https://api.openweathermap.org/data/2.5/weather?q=${cityValue}&appid=${key}&units=metric`;
        fetch(url).then(
            (resp)=>resp.json()
        ).then(data=>{
            console.log('jhbjdvh');
            console.log(data);
            console.log(data.weather[0].icon);
            console.log(data.weather[0].main);
            console.log(data.weather[0].description);
            console.log(data.name);
            console.log(data.main.temp_min);
            console.log(data.main.temp_max);
            forecast.innerHTML=`
            <h2>${data.name}</h2>
        
            <h4 class="desc">${data.weather[0].description}</h4>
            <img src="https://openweathermap.org/img/w/${data.weather[0].icon}.png"/>
            <h1>${data.main.temp}&degC</h1>
            <div class="temp-container">
            <div>
            <h4 class="temp"> Min ${data.main.temp_min}</h4>
            </div>
            <div>
        
            <h4 class="temp"> Max ${data.main.temp_max}</h4>
            </div>
            </div>
            `;


        }).catch(()=>{
            forecast.innerHTML=`<h3 class="msg">City not found</h3>`;

        });
    


}
cityRef.addEventListener("keypress", function(event){
    if(event.key=="Enter"){
        event.preventDefault();
        searchBtn.click();
    }

})
let todaydate=date.getDate();
window.addEventListener("load",fetchWeek(todaydate));
searchBtn.addEventListener("click",getWeather);
addBtn.addEventListener("click",getpref);
window.addEventListener("load",getWeather);
window.addEventListener("load",getsomething(weatherpref1,prefcity1));
window.addEventListener("load",getsomething(weatherpref2,prefcity2));
window.addEventListener("load",getsomething(weatherpref3,prefcity3));
// deletebtn.addEventListener("click",console.log('mmanjsjv'));
