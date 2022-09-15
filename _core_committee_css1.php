<?php
    header("Content-type: text/css; charset: UTF-8");
?>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    /* text-transform: capitalize;
    transition: all .2s linear;
    font-family: 'Poppins', sans-serif; */
}

body {
    background-color: #141114;
    background-image: linear-gradient(335deg, black 23px, transparent 23px),
      linear-gradient(155deg, black 23px, transparent 23px),
      linear-gradient(335deg, black 23px, transparent 23px),
      linear-gradient(155deg, black 23px, transparent 23px);
    background-size: 58px 58px;
    background-position: 0px 2px, 4px 35px, 29px 31px, 34px 6px;
  }
/* body{
    background: #333;
    background: #161623;
} */
h1{
    font-size: 40px;
    margin-top: 20px;
    color: #e74c3c;
    text-align: center;
    animation: change 7s linear infinite;
}
@keyframes change{
    0%   {color: #e74c3c;}
    25%  {color: rgb(236, 236, 6);}
    50%  {color: #ec9e20;}
    100% {color: #e74c3c;}
  }
.container{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}
.card{
    height: 500px;
    width: 290px;
    margin: 20px;
    box-shadow: 0 3px 5px #000;
    border-radius: 10px;
    overflow: hidden;
    text-align: center;
    background-color: #222;
}
.card .bg-image img{
    width: 100%;
    height: 230px;
    object-fit: cover;
    clip-path: polygon(0 0, 100% 0%, 100% 70%, 45% 100%, 0 70%);
}
.card .pic img{
    height: 120px;
    width: 120px;
    border-radius: 50%;
    border: 10px solid #222;
    margin-top: -90px;
    position: relative;
}
.card .info h3{
    color: #f0f0f0;
    font-size: 20px;
    padding: 10px 0;
}
.card .info span{
    font-size: 15px;
    color: #e74c3c;
}
.card .info p{
    font-size: 13px;
    padding: 10px 20px;
    color: #999;
}
/* .card .info .icons a{
    font-size: 20px;
    text-decoration: none;
    color: #e74c3c;
    margin-top: 20px;
    padding: 0 5px;
} */
/* .card .info .icons a:hover{
    color: #f0f0f0;
}
.card:hover{
    transform: translateY(-10px);
} */
.card .info .icons a{
    list-style: none;
    margin: 0 10px;
    font-size: 20px;
    text-decoration: none;
    color: #e74c3c;
    transform: translateY(40px);
    transition: 0.5s;
    opacity: 0;
    /* transition-delay: calc(0.1s * var(--i)); */
}
.card:hover .icons a{
    transform: translateY(20px);
    opacity: 1;
}



@media(max-width:500px){
    h1{
        font-size: 32px;
    }
}
