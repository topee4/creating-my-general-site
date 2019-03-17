window.onload = function(){
    let linksA = document.getElementsByClassName('linksA');

    for(let i=0; i<linksA.length; i++){
        linksA[i].addEventListener('click', fadeIn);
    }
    function fadeIn(){
            this.parentElement.children[1].style.display = 'block';
            this.removeEventListener('click', fadeIn);
            this.addEventListener('click', fadeOut);
    }
    function fadeOut (){
        this.parentElement.children[1].style.display = 'none';
        this.removeEventListener('click', fadeOut);
        this.addEventListener('click', fadeIn);
    }

    let closeModalWindow = document.getElementById('closeModalWindow');
    closeModalWindow.addEventListener('click', closeModal);

    let closeModalWindow2 = document.getElementById('closeModalWindow2');
    closeModalWindow2.addEventListener('click', closeModal2);


    let modalGM = document.getElementById('modalGameWindow');
    let checkpoint = 0;
    openAll = function(){
        modalGM.style.display = 'block';
        checkpoint++;
    }
    let modalGM2 = document.getElementById('modalGameWindow2');
    let checkpoint2 = 0;
    openAll2 = function(){
        modalGM2.style.display = 'block';
        checkpoint2++;
    }














 
        let wrap = document.getElementById('wrap');
        let arr = [];
        let randomNum = Math.floor((Math.random() * 25) + 1);



        for(let i=0; i<25; i++){

            arr[i] = arr.push(randomNum);
            
        }

        arr = arr.sort(rand);



        let number = 1;

        let start = document.querySelector('.again.start')
        start.addEventListener('click', startFunc);




        function func(){
            wrap.style.opacity = 1;
            for (let i=0; i<25; i++){
                let div = document.createElement('div');
                let divClassBLock = div.classList.add('block');
                wrap.appendChild(div);
                wrap.childNodes[i].innerHTML = arr[i];
                let fontSize = Math.floor ((Math.random() * 50) +17);
                wrap.childNodes[i].style.fontSize = fontSize + 'px';
                wrap.childNodes[i].style.color = colorRandom();

                wrap.childNodes[i].addEventListener('click', checkNumber);
            }
            
        }




        function colorRandom (){
            let r = Math.floor (Math.random() * (256));
            let g = Math.floor (Math.random() * (246));
            let b = Math.floor (Math.random() * (246));
            let c = '#' + r.toString(16) + g.toString(16) + b.toString(16);
            return c;
        }







        let again = document.querySelector('.again.btn');
        again.addEventListener('click', reset);

        function checkNumber(){
            if(this.textContent == number){
                this.style.background = 'LightCoral';
                number++;
            }
        }


        let timer = document.querySelector('.again.timer');

      
        function startFunc(){
            timer.style="position: relative; top:10";
            timer.innerHTML = '30';
            again.style.display = 'none';
            wrap.style.opacity = 1;
            arr = arr.sort(rand);
            start.style="position: relative; top:-300px";
            
            func();
            var timerVariable = setInterval (function (){
                
                again.style.display = 'none';

                if(timer.innerHTML == '0'){
                    timer.innerHTML = '31';
                    start.style="position: relative; top:-300px";
                    again.style.display = 'block';
                    clearInterval(timerVariable);
                    wrap.style.opacity = 0;
                    again.style.display = 'block';
                    setTimeout(funcHZ, 1);
                }

                if(number == 26){
                    timer.innerHTML = 'YOU WIN';
                    start.style="position: relative; top:-300px";
                    again.style.display = 'block';
                    clearInterval(timerVariable);
                    this.style.background = 'yellow';
                                //HIDDEN?????
                    start.style="position: relative; top:0";  //HIDDEN?????
                }
                
                
                
                    
                    timer.innerHTML -= 1;
                }, 1000);
                

            }
        function reset(){
            timer.style="position: relative; top:-300px";
            arr = arr.sort(rand);
            start.style="position: relative; top:0";
            number = 1;
            for(let i=0; i<25; i++){
                wrap.children[0].remove();
            }
            func();
        }

        function rand(a,b){
            return Math.random()-0.5;
        }

        function closeModal(){
            modalGM.style.display = 'none';
            checkpoint--;
        }
        function closeModal2(){
            modalGM2.style.display = 'none';
            checkpoint2--;
        }
        funcHZ = function(){
                timer.innerHTML = 'YOU LOSE';
            }























            let wonPoint = 0;
            let losePoint = 0;
            let drawPoint = 0;
            let statPoints = document.getElementsByClassName('statPoint');
            for(let i=0; i<statPoints.length; i++){
                statPoints[i].innerHTML += 0;
            }
            let td = document.getElementsByTagName('td');
            let outer = document.querySelector('.stat.place');
            let winner = null;
            let draw = null;
            for(let i=0; i<td.length; i++){
                td[i].addEventListener('click', inspection);
            }
            let turn = 'X';
            setMessage(turn + "   get's to start");
        
            function inspection(){
                if(winner != null){
                    setMessage(turn + '   already won');
                }
                else if(draw != null){
                    setMessage('You have a draw');
                }
                else if(this.innerHTML == ''){
                    this.innerHTML = turn;
                    switchTurn();
                }
                else{
                    setMessage('Pick another square');
                }
            }
            function switchTurn(){
                checkForDraw(turn);
                if(checkForWinner(turn)){
                    setMessage("Congrats " + turn + " you won");
                    winner = turn;
                    
                    if(winner == 'X'){
                        wonPoint++;
                        statPoints[0].innerHTML = 'Won X: ' + wonPoint; 
                    }
                    else{
                        losePoint++;
                        statPoints[1].innerHTML = 'Won O: ' + losePoint; 
                    }
                }
                else if(draw != null){
                    setMessage('You have a draw');
                    drawPoint++;
                    statPoints[2].innerHTML = 'Draw: ' + drawPoint; 
                }
                else if(turn == 'X'){
                    turn = 'O';
                    setMessage('next turn is ' + turn);
                }
                else{
                    turn = 'X';
                    setMessage("It's " + turn + "'s turn now");
                }
            }
            function setMessage(msg){
                outer.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.innerHTML = msg;
            }
        function checkForWinner(move){
            var result = false;
             if(checkRow(1,2,3, move) ||
                checkRow(4,5,6, move) ||
                checkRow(7,8,9, move) ||
                checkRow(1,4,7, move) ||
                checkRow(2,5,8, move) ||
                checkRow(3,6,9, move) ||
                checkRow(1,5,9, move) ||
                checkRow(3,5,7, move)){
                    result = true;
            }
            return result;
        }
        function checkForDraw(variable){
            if(td[0].innerHTML != '' &&
                td[1].innerHTML != '' &&
                td[2].innerHTML != '' &&
                td[3].innerHTML != '' &&
                td[4].innerHTML != '' &&
                td[5].innerHTML != '' &&
                td[6].innerHTML != '' &&
                td[7].innerHTML != '' &&
                td[8].innerHTML != ''){
                    draw = variable;
                }
            }
            cleanUp = function(){
for(let i=0; i<td.length; i++){
    td[i].innerHTML = '';
    td[i].style.color = 'white';
}
                winner = null;
                draw = null;
                var turn = 'X';
                   
                setMessage(turn + "   get's to start");           
            }
        
        function checkRow(a, b, c, move){
            var result = false;
                if(getBox(a) == move && getBox(b) == move && getBox(c) == move){
                    getStyle(a);
                    getStyle(b);
                    getStyle(c);
                    result = true;
                }
            return result;
        }
        
            function getStyle(number){
                return document.getElementById("s"+number).style.color = 'red';
            }
            function getBox(number){
                return document.getElementById("s"+number).innerHTML;
            }
    }

    