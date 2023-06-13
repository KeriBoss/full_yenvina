const btnFilter = document.querySelector('.btn-filter');
const ctnFilter = document.querySelector('.filter-content');
let temp;
if(ctnFilter){
    temp = ctnFilter.innerHTML;
    ctnFilter.innerHTML = '';
}

if(btnFilter){
    btnFilter.addEventListener('click', function(e){
        ctnFilter.classList.toggle('active');
        ctnFilter.classList.toggle('box');
        if(ctnFilter.classList.contains('active')){
            ctnFilter.innerHTML = temp;
        }
        else{
            ctnFilter.innerHTML = '';
        }
    })
}

//QUantity
const range = document.querySelectorAll('.range');

range.forEach(item => {
    let btnLowest = item.querySelector('.lowest_quan');
    let btnHighest = item.querySelector('.highest_quan');
    let btnMain_quan = item.querySelector('.main_quan');
    
    btnLowest.addEventListener('click', function(event){
        if(btnMain_quan.value > 0){
            btnMain_quan.value = btnMain_quan.value*1 - 1;
        }
    })
    btnHighest.addEventListener('click', function(){
        btnMain_quan.value = btnMain_quan.value*1 + 1;
    })
})


//Times delay
const time = document.querySelector('.time-delay');
const hour = document.querySelector('.time-delay .hour');//Get hour 
const minute = document.querySelector('.time-delay .minute');//Get minute
const second = document.querySelector('.time-delay .second');//Get second

let timedelay;
if(time){
    timedelay = time.dataset.time;
}
let temphour = Math.floor(timedelay / 3600);
let tempMinute = Math.floor((timedelay % 3600) / 60);
let tempSecond = Math.floor(((timedelay % 3600) % 60));

let dateSale = setInterval(()=>{
    tempSecond = tempSecond - 1;
    if(tempSecond < 0){
        tempMinute = tempMinute - 1;
        tempSecond = 59;
    }
    if(tempMinute < 0){
        temphour = temphour - 1;
        tempMinute = 59;
    }
    if(hour && minute && second){
        hour.textContent = temphour;
        minute.textContent = tempMinute;
        second.textContent = tempSecond;
    }
},1000)




//Show hide filter on Product page

